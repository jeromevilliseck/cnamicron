<?php

require('../../config/configDatabase.php'); 							// Constantes de connection à la base de donnée
require('../../config/configVectors.php'); 								// Vecteurs
require('../../core/autoloader/autoloader.php');                        // Autoloader

session_name('SECURITY');                                        // Session
session_start();

$EX = isset($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home';				// Variable de contrôle

switch ($EX) {															// Contrôleur
    case 'home':
        home();
        break;
    case 'algo':
        algo();
        break;
    case 'java':
        java();
        break;
    case 'javaoo':
        javaoo();
        break;
    case 'javadesign':
        javadesign();
        break;
    case 'javafx':
        javafx();
        break;
    case 'javadp':
        javadp();
        break;
    case 'javajeebase':
        javajeebase();
        break;
    case 'javaspring':
        javaspring();
        break;
    case 'javajsp':
        javajsp();
        break;
    case 'javajsf':
        javajsf();
        break;
    case 'javahiborm':
        javahiborm();
        break;
    case 'javajdbc':
        javajdbc();
        break;
    case 'javaejb':
        javaejb();
        break;
    case 'javajboss':
        javajboss();
        break;
    case 'cpp':
        cpp();
        break;
    case 'cppoo':
        cppoo();
        break;
    case 'sql':
        sql();
        break;
    case 'network':
        network();
        break;
    case 'git':
        git();
        break;
    case 'contact':
        contact();
        break;
    case 'vim':
        vim();
        break;
    case 'select':
        displayOne();
        break;
    case 'search':
        searchResults();
        break;
    case 'noresults':
        homeNoResults();
        break;
    case 'admin':
        formConnect();
        break;
    case 'connect':
        connect();
        break;
    case 'deconnect':
        deconnect();
        break;
    case 'test':
        tests();
        break;
    case 'update':
        modify('update');
        break;
    case 'insert':
        modify('insert');
        break;
    case 'delete':
        modify('delete');
        break;
}

require('../../pages/templates/layout.view.php');						//Vue : template				

function home() {														//Fonctions de contrôle
    global $content;

    $content['title']       = 'Cnamicron';
    $content['description'] = 'Cours de programmation avancés<br>spécialité java';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/home.html';
    $content['logo']        = ConfigVectors::showHatLogo(50, 50);
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/15196349911760648492.png';

    return;
}

function homeNoResults() {
    global $content;

    $content['title']       = 'Cnamicron';
    $content['description'] = 'Cours de programmation avancés';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/homeNoResults.html';
    $content['logo']        = ConfigVectors::showHatLogo(50, 50);
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/15196349911760648492.png';

    return;
}

function selectAllList($_database){
    global $ID_USER;

    $mTuples = new MTuples($ID_USER); //User
    $data       = $mTuples->SelectAll($_database);

    global $content;

    $content['title']       = $_database;
    $content['description'] = 'Mode Edition';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showHatLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function algo() {
    global $ID_USER;

    $mTuples = new MTuples($ID_USER); //User
    $data       = $mTuples->SelectAll("PURE_MVC_ALGO");

    global $content;

    $content['title']       = 'Algorithmes';
    $content['description'] = 'Analyser, définir, écrire';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showAlgorithmLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function java() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVA");

    global $content;

    $content['title']       = 'JAVA';
    $content['description'] = 'Cours Polytechnique';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/java.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function javaoo() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVAOO");

    global $content;

    $content['title']       = 'JAVA Orienté Objet';
    $content['description'] = 'Cours Polytechnique';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/javaoo.html';
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/15196369581375671382.png';

    return;
}

function javadesign() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVADP");

    global $content;

    $content['title']       = 'JAVA Design Patterns';
    $content['description'] = 'Patrons de conception';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/javadp.html';
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/15268380971525571066.jpg';

    return;
}

function javafx() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVAFX");

    global $content;

    $content['title']       = 'JAVA FX';
    $content['description'] = 'Couche graphique de java';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/javafx.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function javajeebase() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVA_JEE_BASE");

    global $content;

    $content['title']       = 'JAVA EE';
    $content['description'] = 'Bases de l\'architecture JEE : Http, Servlet, JSP, JSTL, MVC, JDBC, ORM';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/javajee.html';

    $content['thumbnail']   = 'http://zupimages.net/viewer.php?id=19/25/x8j0.png';

    return;
}

function javaspring() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVA_SPRING");

    global $content;

    $content['title']       = 'JAVA SPRING';
    $content['description'] = 'Déploiement rapide d\'applications web JAVA';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/javaspring.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function javajsp() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVA_JSP");

    global $content;

    $content['title']       = 'JAVA JSP, Servlets';
    $content['description'] = 'Créer dynamiquement du code HTML, XML, etc';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/englishMessage.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function javajsf() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVA_JSF");

    global $content;

    $content['title']       = 'JAVA JSF';
    $content['description'] = 'Framework Java pour developper des applications web, type MVC';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/englishMessage.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function javahiborm() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVA_HIBERNATEORM");

    global $content;

    $content['title']       = 'JAVA HIBERNATE (ORM)';
    $content['description'] = 'Représenter une base de données en objets JAVA, et vice versa<br/>ORM = mapping objet relationnel';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/englishMessage.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function javajdbc() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVA_JDBC");

    global $content;

    $content['title']       = 'JAVA JDBC';
    $content['description'] = 'Accéder via une interface à une base de donnée';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/englishMessage.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function javaejb() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVA_EJB");

    global $content;

    $content['title']       = 'JAVA EJB';
    $content['description'] = 'Accéder via une interface à une base de donnée';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/englishMessage.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function javajboss() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JAVA_JBOSS");

    global $content;

    $content['title']       = 'JAVA JBOSS';
    $content['description'] = 'Composants logiciels côté serveur pour Java';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJavaLogo(50, 50);
    $content['text']        = '../html/englishMessage.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function cpp() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_CPP");

    global $content;

    $content['title']       = 'C++';
    $content['description'] = 'Cours Polytechnique';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showCppLogo(50, 50);
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/15246553261566921874.jpg'; 
	
    return;
}

function cppoo() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_CPPOO");

    global $content;

    $content['title']       = 'C++ Orienté Objet';
    $content['description'] = 'Cours Polytechnique';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showCppLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function sql() {
    global $content;

    $content['title']       = 'SQL';
    $content['description'] = 'Cours Arts et Metiers';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/sql.html';
    $content['logo']        = ConfigVectors::showSqlLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function network() {
    global $content;

    $content['title']       = 'Reseau et Linux';
    $content['description'] = 'Réseau, Environnement Linux';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/network.html';
    $content['logo']        = ConfigVectors::showConsoleLogo(50, 50);
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/15196358792017995989.png';

    return;
}

function git() {
    global $content;

    $content['title']       = 'Git';
    $content['description'] = 'Majorité des commandes utilisées en cadre professionnel';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/git.html';
    $content['logo']        = ConfigVectors::showGitLogo(50, 50);
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/15196358792017995989.png';

    return;
}

function contact() {
    global $content;

    $content['title']       = 'Contact';
    $content['description'] = 'Me contacter';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/contact.html';
    $content['logo']        = ConfigVectors::showPhoneLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function tests() {
    global $content;

    $content['title']       = 'Tests';
    $content['description'] = 'Developpement de nouvelles fonctionnalités du site<br/>Développeur uniquement';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/tests.html';
    $content['logo']        = ConfigVectors::showSourcecodeLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function vim() {
    global $content;

    $content['title']       = 'Vim';
    $content['description'] = 'Guide d\'utilisation';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/vim.html';
    $content['logo']        = ConfigVectors::showVimLogo(50, 50);
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/1525079350283123031.png';

    return;
}

function displayOne() {
    if(isset($_SESSION['ID_USER'])){
        $mTuples = new MTuples($_GET['ID'], $_SESSION['ID_USER']);
        $data = $mTuples->Select($_GET['TABLE']);
    } else {
        $mTuples = new MTuples($_GET['ID']);
        $data = $mTuples->Select($_GET['TABLE']);
    }

	global $content;
	
	$content['title']       = $data[2];
    $content['description'] = $data[3];
    $content['class']       = 'VTuples';

    if(isset($_SESSION['ID_USER'])) {
        $content['method'] = 'editTuple';
    } else {
        $content['method'] = 'showTuple';
    }
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showReadingLogo(50, 50);
    
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';
}

function searchResults(){
    $mTuples = new MTuples();
    $countResults = 0;
    $data = $mTuples->SearchAll($_POST['SEARCH'], $countResults);

    global $content;

    $content['title']       = 'Recherche';
    $content['description'] = "<span class='blackFont'>Résultats : $countResults</span>";
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showHatLogo(50, 50);
    $content['text']        = '../html/searchWithResults.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

//Partie administrateur

function formConnect(){
    global $content;

    $content['title']       = 'Connection';
    $content['description'] = "Administration du site";
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/formConnect.html';
    $content['logo']        = ConfigVectors::showHatLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';
}

function connect()
{
    $musers = new MUsers();
    $value = $musers->VerifUser($_POST);

    $_SESSION['ID_USER'] = $value['ID_USER'];
    $_SESSION['NOM'] = $value['NOM'];
    $_SESSION['PRENOM'] = $value['PRENOM'];

    home();

    return;

} // connect()

function deconnect()
{
    // Détruit la session
    session_destroy();
    // Détruit les variables de session
    $_SESSION = array();
    // Redirection vers la page d'accueil
    header('Location: ../controllers/main.php');

    return;

} // deconnect()

/**
 * @param $type
 */
function modify($type)
{
    header('X-XSS-Protection:0');
    echo 'good';
    global $ID_USER;

    $id_doc = isset($_REQUEST['ID_DOC']) ? $_REQUEST['ID_DOC'] : '';

    $mTuples = new MTuples($id_doc, $ID_USER);
    if ($_POST) {
        $mTuples->SetValue($_POST);
    }

    $mTuples->Modify($type, $_REQUEST['DATABASE']);

    selectAllList($_REQUEST['DATABASE']);

    return;

} // modify($type)

