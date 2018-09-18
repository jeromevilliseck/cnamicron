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
    case 'htmlcss':
        htmlcss();
        break;
    case 'php':
        php();
        break;
    case 'phpoo':
        phpoo();
        break;
    case 'phpmvc':
        phpmvc();
        break;
    case 'phpbdd':
        phpbdd();
        break;
    case 'phpss':
        phps();
        break;
    case 'phpint':
        phpintegration();
        break;
    case 'phpdeb':
		phpdebug();
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
    case 'cppqt':
        cppqt();
        break;
    case 'cppstl':
        cppstl();
        break;
    case 'cpptf':
        cpptf();
        break;
    case 'cppts':
        cppts();
        break;
    case 'sql':
        sql();
        break;
    case 'swift':
        swift();
        break;
    case 'ruby':
        ruby();
        break;
    case 'python':
        python();
        break;
    case 'csharp':
        csharp();
        break;
    case 'objc':
        objc();
        break;
    case 'godot':
        godot();
        break;
    case 'unity':
        unity();
        break;
    case 'clangage':
        clangage();
        break;
    case 'js': //TODO delete deprecated
        js();
        break;
    case 'jsp': //TODO delete deprecated
        jsp();
        break;
    case 'jsc':
        jsc();
        break;
    case 'jslst':
        jslst();
        break;
    case 'jsajx':
        jsajax();
        break;
    case 'network':
        network();
        break;
    case 'versioncontrol':
        versioncontrol();
        break;
    case 'gitfast':
        gitfast();
        break;
    case 'gp':
        gp();
        break;
    case 'frameworks':
        frameworks();
        break;
    case 'ide':
        ide();
        break;
    case 'contact':
        contact();
        break;
    case 'tests':
        tests();
        break;
    case 'quickstart':
        quickstart();
        break;
    case 'vim':
        vim();
        break;
    case 'sass':
        sass();
        break;
    case 'docker':
        docker();
        break;
    case 'english':
        english();
        break;
    case 'archi':
        architecture();
        break;
    case 'climo':
        climultios();
        break;
    case 'micro':
        microcontrollers();
        break;
    case 'maths':
        maths();
        break;
    case 'project':
        project();
        break;
    case 'grafic':
        grafic();
        break;
    case 'shell':
        shell();
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
    case 'update':
        modify('update');
        break;
    case 'insert':
        modify('insert');
        break;
}

require('../../pages/templates/layout.view.php');						//Vue : template				

function home() {														//Fonctions de contrôle
    global $content;

    $content['title']       = 'Cnamicron';
    $content['description'] = 'Cours de programmation avancés';
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

function htmlcss() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_HTMLCSS");

    global $content;

    $content['title']       = 'HTML et CSS';
    $content['description'] = 'Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showHtmlLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function php() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_PHP");

    global $content;

    $content['title']       = 'PHP';
    $content['description'] = 'Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showPhpLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function phpoo() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_PHPOO");

    global $content;

    $content['title']       = 'PHP Orienté Objet';
    $content['description'] = 'Niveau Avancé, Grafikart';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showPhpLogo(50, 50);
    $content['text']        = '../html/phpoo.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function phpmvc() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_PHPMVC");

    global $content;

    $content['title']       = 'PHP Modèle Vue Controleur';
    $content['description'] = 'Cours Arts et Métiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showPhpLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function phpbdd() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_PHPBDD");

    global $content;

    $content['title']       = 'PHP Bases de données <br />(classe PDO, modèle CRUD)';
    $content['description'] = 'Faire intéragir son code PHP à sa base de donnée SQL<br />Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showPhpLogo(50, 50);
    $content['text']        = '../html/phpbdd.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function phps() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_PHPS");

    global $content;

    $content['title']       = 'PHP Sécurité';
    $content['description'] = 'Attaquer un site et le proteger<br />Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showPhpLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function phpuml() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_PHPUML");

    global $content;

    $content['title']       = 'PHP Exemples & Modélisation UML';
    $content['description'] = 'Utiliser concrètement le modèle Vue Controleur<br />Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showPhpLogo(50, 50);
    $content['text']        = '../html/uml.html';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function phpintegration() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_PHPINT");

    global $content;

    $content['title']       = 'PHP Intégration Continue';
    $content['description'] = 'Tests unitaires, suppression erreurs, redondances...';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showPhpLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function phpdebug() {
    $mTuples = new MTuples();
    $data    = $mTuples->SelectAll("PURE_MVC_PHPDEBUG");

    global $content;

    $content['title']       = 'PHP Debogage';
    $content['description'] = 'Résoudre les erreurs fréquentes de Syntaxe et Logique';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showPhpLogo(50, 50);

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

function cppqt() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_CPPQT");

    global $content;

    $content['title']       = 'C++ QT';
    $content['description'] = 'Bibliothèque multiplateforme pour créer des GUI en C++';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showCppLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function cppstl() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_CPPSTL"); //Vc1RyqWFbiA

    global $content;

    $content['title']       = 'C++ STL Boost';
    $content['description'] = 'Bibliothèque fournissant un ensemble de classes (collections, algorithmes)';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showCppLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function cpptf() {

    global $content;

    $content['title']       = 'C++ TreeFrog Framework';
    $content['description'] = 'High-speed C++ MVC Framework for Web Application';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/unknown.html';
    $content['logo']        = ConfigVectors::showCppLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function cppts() {

    global $content;

    $content['title']       = 'C++ Tesseract Framework';
    $content['description'] = 'OCR reconnaissance optique de caractères en c++';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/unknown.html';
    $content['logo']        = ConfigVectors::showCppLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function js() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JS");

    global $content;

    $content['title']       = 'JS : Javascript';
    $content['description'] = 'Vue d\'ensemble';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJsLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function jsp() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JSP");

    global $content;

    $content['title']       = 'JS : Javascript';
    $content['description'] = 'Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showCppLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function jsc() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JSC");

    global $content;

    $content['title']       = 'Javascript';
    $content['description'] = 'Classique : Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJsLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function jslst() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JSLST");

    global $content;

    $content['title']       = 'Javascript';
    $content['description'] = 'Listeners : Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJsLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function jsajax() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_JSAJAX");

    global $content;

    $content['title']       = 'Javascript';
    $content['description'] = 'AJAX : Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showJsLogo(50, 50);

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

function gp() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_GP");

    global $content;

    $content['title']       = 'Management';
    $content['description'] = 'Stratégies, innovation';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showManagementLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function ruby() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_RUBY");

    global $content;

    $content['title']       = 'Ruby';
    $content['description'] = 'Cours complémentaire';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showRubyLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function python() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_PYTHON");

    global $content;

    $content['title']       = 'Python';
    $content['description'] = 'Cours complémentaire';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showPythonLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function objc() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_OBJC");

    global $content;

    $content['title']       = 'Objective C';
    $content['description'] = 'Applications apple - Cours complémentaire';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showObjectivecLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function csharp() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_CSHARP");

    global $content;

    $content['title']       = 'C#';
    $content['description'] = 'Cours complémentaire';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showCsharpLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function godot() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_GODOT");

    global $content;

    $content['title']       = 'Godot';
    $content['description'] = 'Cours complémentaire';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showGodotLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function unity() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_UNITY");

    global $content;

    $content['title']       = 'Unity';
    $content['description'] = 'Cours complémentaire';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showUnityLogo(50, 50);

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

function versioncontrol() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_VC");

    global $content;

    $content['title']       = 'Version control';
    $content['description'] = 'Gestion de dépôts via GitHub';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showGitLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function gitfast() {

    global $content;

    $content['title']       = 'Version control';
    $content['description'] = 'Guide d\'utilisation rapide de Git et GitHub';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/gitfaster.html';
    $content['logo']        = ConfigVectors::showGitLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function ide() {
    global $content;

    $content['title']       = 'IDE + Plugins';
    $content['description'] = 'IDE : Environnement de développpement, ressources';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/ide.html';
    $content['logo']        = ConfigVectors::showHammerLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function frameworks() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_FWKS");

    global $content;

    $content['title']       = 'Frameworks';
    $content['description'] = 'et outils associés';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showFmkLogo(50, 50);
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/1519636637575104180.png ';

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

function quickstart() {
    global $content;

    $content['title']       = 'Quick Start';
    $content['description'] = 'Démarrage rapide<br/>Questions fréquentes';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/quickstart.html';
    $content['logo']        = ConfigVectors::showQuestionsLogo(50, 50);

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

function sass() {
    global $content;

    $content['title']       = 'Sass et compass';
    $content['description'] = 'Guide d\'utilisation';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/sass.html';
    $content['logo']        = '../img/sass.png';

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function docker() {
    global $content;

    $content['title']       = 'Docker';
    $content['description'] = 'Guide d\'utilisation';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '../html/docker.html';
    $content['logo']        = '../img/docker80.png';
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/15260999632070519710.png';

    return;
}

function english() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_ENGLISH");

    global $content;

    $content['title']       = 'Anglais américain';
    $content['description'] = 'Synthèse des règles d\'expression';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showEnglishLogo(50, 50);
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/1519815989864630552.jpg';

    return;
}

function swift() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_SWIFT");

    global $content;

    $content['title']       = 'Swift';
    $content['description'] = 'Applications Apple';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showSwiftLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function clangage() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_C");

    global $content;

    $content['title']       = 'C';
    $content['description'] = 'Programmation procédurale - Cours complémentaire';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showCLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function architecture() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_ARCHITECTURE");

    global $content;

    $content['title']       = 'Systèmes et structures de données';
    $content['description'] = 'Cours Arts et Métiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showDosLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function climultios() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_OS");

    global $content;

    $content['title']       = 'Interface en ligne de commande';
    $content['description'] = 'Liste des commandes par système d\'exploitation';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showDosLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function microcontrollers() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_MICRO");

    global $content;

    $content['title']       = 'Microcontroleurs';
    $content['description'] = 'Cours Polytechnique';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showDosLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function maths() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_MATHS");

    global $content;

    $content['title']       = 'Mathemathiques';
    $content['description'] = 'Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showMathsLogo(50, 50);
    $content['thumbnail']   = 'http://www.image-heberg.fr/files/15242457002012323178.jpg';

    return;
}

function project() {

    global $content;

    $content['title']       = 'Gestion de projet';
    $content['description'] = 'Cours Arts et Metiers';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '';
    $content['logo']        = ConfigVectors::showProjectLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function shell() {

    global $content;

    $content['title']       = 'Scripts Shell';
    $content['description'] = 'Construire des scripts automatique pour linux';
    $content['class']       = 'VHtml';
    $content['method']      = 'showHtml';
    $content['arg']         = '';
    $content['logo']        = ConfigVectors::showShellLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

    return;
}

function grafic() {
    $mTuples = new MTuples();
    $data       = $mTuples->SelectAll("PURE_MVC_GRAFIC");

    global $content;

    $content['title']       = 'Graphisme';
    $content['description'] = 'Cours Arts et Metiers';
    $content['class']       = 'VTuples';
    $content['method']      = 'showAllTuples';
    $content['arg']         = $data;
    $content['logo']        = ConfigVectors::showGraphicLogo(50, 50);

    $content['thumbnail']   = 'http://www.image-heberg.fr/files/152079676369203515.png';

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

