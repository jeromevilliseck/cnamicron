<?php
require('../../core/autoloader/autoloader.php'); //Chargement dynamique des classes selon l'instanciation
require('../../config/configDatabase.php'); //Constantes de connexion à la base de données
require('../../config/configGenericValues.php'); //Constantes génériques propre au site

require('../../public/api/PHPMailer/src/PHPMailer.php'); //API d'envoi de mail
require('../../public/api/PHPMailer/src/SMTP.php'); //SMTP
require('../../public/api/PHPMailer/src/Exception.php'); //Exception

// Crée une session nommée
session_name('USER');
session_start();

//Variable de contrôle
$EX = isset($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home'; //Contrôle via condition ternaire

//TODO a signaler et a discuter lors de l'oral -> j'ai voulu placer lors de la mise en place d'ajax changeContent la vue avant les fonctions de contrôle comme dans le cours de C. Bonhomme mais ça ne fonctionne pas puisque l'on appelle du display avant d'executer les fonctions de contrôle -> j'ai donc replacer le require de la vue tout en fin de fichier
//TODO à discuter lors de l'oral -> est il possible de faire de l'ajax avec la méthode changeContent sur des fonctions de contrôle faisant appel à des classes modèles
//TODO voir comment au niveau de l'algorithme on peut eviter de réinstancier des éléments déja présents (conditions sur éléments global content ?), puisque changeContent() n'a l'air de fonction qu'avec showHtml en MVC.

//Controleur
switch ($EX) {
    //Vue html standard
    case 'homeReturn':
        homeReturn();
        exit; //AJAX
    case 'adre':
        address();
        exit; //AJAX
    case 'rdva':
        appointment();
        exit; //AJAX
    case 'forc':
        form_contact();
        exit; //AJAX

    //Vue avec données multiples provenant d'un modèle
    case 'team':
        team();
        break;

    case 'spec':
        specialities();
        break;
    case 'spec_ins':
        specialities_form();
        break; //PIEGE Attention menace de sécurité -> contrôller par isset que la superglobale existe bien dans chaque fonction de controle sinon quelqu'un pourrait saisir la clé directement dans le navigateur
    case 'spec_ins_ok':
        specialities_insert();
        break;
    case 'spec_upd_ok':
        specialities_update();
        break;
    case 'spec_del':
        specialities_delete();
        break;

    case 'advi':
        advices();
        break;
    case 'hour':
        hours();
        break;

    //Vue avec donnée unique provenant d'un modèle
    case 'doct':
        doctor();
        break;

    //Gestion des utilisateurs en base de données -> Ajout, Modification, Suppression
    case 'usem':
        user_management();
        break;
    case 'user_ins':
        user_form();
        break; //Contrôle de sécurité à effectuer
    case 'user_ins_ok':
        user_insert();
        break;
    case 'user_upd_ok':
        user_update();
        break;
    case 'user_del':
        user_delete();
        break;

    //Formulaire d'envoi de message
    case 'send':
        send_message();

    //Administration
    case 'foco':
        form_connect();
        break;
    case 'conn':
        connect();
        break;
    //case 'admi' : administration(); break; form_connect Remplace la fonction précèdente administration() qui ne faisait pas de contrôle
    case 'deco':
        deconnect();
        break;

    default:
        home();
        break;
}

//Fonctions de contrôle

function home() {

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h1>Bienvenue chez ' . SITETITLE . '</h1><p>Clinique vétérinaire de Jarcieux</p>';
    $content['class']  = 'VHtml';
    $content['method'] = 'showHtml';
    $content['arg']    = '../html/home.html';

    $content['vign'] = ''; //Vignette de partage pour les réseaux sociaux, affectation variable de l'image selon la page -> Attention fb et autres for developpers précisent qu'ils veulent des liens absolus pas relatifs

    return;
}

function homeReturn() {

    $vhtml = new VHtml();
    $vhtml->showHtml('../html/home.html');

    $content['vign'] = '';
    return;
}

function team() {

    $mdoctors = new MDoctors();
    $data     = $mdoctors->SelectAll();
    $rowCount = $mdoctors->SelectCount(); //Pas de paramètre 'TABLE' dans la fonction puisque une classe modèle est rattaché à une table dans la méthode vue en cours
    //On à récupéré le nombre de tuples

    //Vers du code générique avec des liaisons SQL...
    $arrObjLocal = array(); //Obligation de passer par un objet collection pour sortir de la problématique de portée locale
    for ($i = 1; $i <= $rowCount; $i++) { //Attention car l'indice 0 de l'objet $arrObj contient l'objet PDO sur lequel est appliqué la méthode fetchAll() ne pas se faire piéger;
        $dataLocal = $mdoctors->SelectSpecialities($i);
        $arrObjLocal[$i] = $dataLocal;
        //Ne pas mettre de return ici car on est pas dans une fonction mais dans une structure de contrôle de portée locale
    }

    /*Requête avec jointure pour connaitre les spécialités par médecin
    La condition de la requête SQL est remplacée par une paramètre de la méthode*/
    //TODO Mise en place de code générique dans le contrôleur

    /*Ancien code non générique pour montrer l'évolution
    $data_remain = $mdoctors->SelectSpecialities(1);
    $data_burlotte = $mdoctors->SelectSpecialities(2);
    $data_abeauveaux = $mdoctors->SelectSpecialities(3);
    */

    //Création d'une collection d'objets accessibles par indices
    $arrObj    = array();
    $arrObj[0] = $data; //Contient les données des médecins

    for ($i = 1; $i <= $rowCount; $i++) {
        $arrObj[$i] = $arrObjLocal[$i]; //Contient les spécialités exercées par le medecin passé en paramètre de la méthode
        $arrObj[$i] = $arrObjLocal[$i];
        $arrObj[$i] = $arrObjLocal[$i];
    }

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h1>Bienvenue chez ' . SITETITLE . '</h1><p>La clinique > Les praticiens</p>';
    $content['class']  = 'VDoctors';
    $content['method'] = 'showList';
    $content['arg']    = $arrObj;

    $content['vign'] = '';

    return;
}

//TODO appliquer la même conception sur les autres vues et modèles des tables team, advices, hour
//SPECIALITIES CONTROL FUNCTIONS BLOC START
function specialities() {

    $method = isset($_SESSION['ADMIN_SITE']) ? 'showListAdmin' : 'showList'; //Selon si la superglobale est présente ou pas la vue contient des données supplémentaires pour l'administrateur

    $mspecialities = new MSpecialities();
    $data          = $mspecialities->SelectAll();

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h1>Bienvenue chez ' . SITETITLE . '</h1><p>La clinique > Nos spécialités</p>';
    $content['class']  = 'VSpecialities';
    $content['method'] = $method;
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function specialities_form() {

    //Sécurité pour empecher la modification de la table par un accès via la saisie de la clé dans l'url
    $method = isset($_SESSION['ADMIN_SITE']) ? 'showFormAdmin' : 'showAccessForbidden';

    //Si la clé n'est pas nul l'objet $data contient un array issue de la manipulation d'un objet avec la clé primaire id speciality
    if (isset($_GET['ID_SPECIALITY'])) {
        $mspecialities = new MSpecialities($_GET['ID_SPECIALITY']);
        $data          = $mspecialities->Select();
    } else {
        $data = '';
    }

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Mode administration';
    $content['aside']  = '<h1>Edition : mode administrateur</h1>';
    $content['class']  = 'VSpecialities';
    $content['method'] = $method;
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function specialities_insert() {

    $method = isset($_SESSION['ADMIN_SITE']) ? 'showListAdmin' : 'showAccessForbidden';

    $mspecialities = new MSpecialities();
    //Modifier le membre value de la classe mère avec les données du formulaire
    $mspecialities->SetValue($_POST);
    //Insère les données dans la table SPECIALITIES
    $mspecialities->Insert();
    //Réaffiche tous les tuples de la table en les récupérant
    $data = $mspecialities->SelectAll();

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Mode administration';
    $content['aside']  = '<h1>Edition : mode administrateur</h1>';
    $content['class']  = 'VSpecialities';
    $content['method'] = $method;
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function specialities_update() {

    $method = isset($_SESSION['ADMIN_SITE']) ? 'showListAdmin' : 'showAccessForbidden';

    $mspecialities = new MSpecialities($_POST['ID_SPECIALITY']);
    $mspecialities->SetValue($_POST);
    $mspecialities->Update();
    $data = $mspecialities->SelectAll();

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Mode administration';
    $content['aside']  = '<h1>Edition : mode administrateur</h1>';
    $content['class']  = 'VSpecialities';
    $content['method'] = $method;
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function specialities_delete() {

    $method = isset($_SESSION['ADMIN_SITE']) ? 'showListAdmin' : 'showAccessForbidden';

    $mspecialities = new MSpecialities($_GET['ID_SPECIALITY']); //Attention c'est un lien cliquable pour DELETE donc objet get pas objet post
    $mspecialities->Delete();


    $data = $mspecialities->SelectAll();

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Mode administration';
    $content['aside']  = '<h1>Edition : mode administrateur</h1>';
    $content['class']  = 'VSpecialities';
    $content['method'] = $method;
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}
//SPECIALITIES CONTROL FUNCTIONS BLOC END

function advices() {

    $madvices = new MAdvices();
    $data     = $madvices->SelectAll();

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h1>Bienvenue chez ' . SITETITLE . '</h1><p>Vous êtes à : Conseils</p>';
    $content['class']  = 'VAdvices';
    $content['method'] = 'showList';
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function appointment() {

    global $content;

    $content['title'] = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside'] = '<h1>Bienvenue chez ' . SITETITLE . '</h1><p>Vous souhaitez prendre Rendez-vous<br><a href="http://supersaas.fr/schedule/catclinic2018/prise_de_rdv_avec_un_praticien">Cliquez ici pour prendre rdv avec votre mobile</a></p>';

    $vhtml = new VHtml();
    $vhtml->showHtml('../html/appointment.html');

    $content['vign'] = '';
    return;
}

function hours() {

    $mdays = new MDays();
    $data  = $mdays->SelectDays();

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h1>Bienvenue chez ' . SITETITLE . '</h1><p>Accès > Nos horaires d\'ouverture</p>';
    $content['class']  = 'VDays';
    $content['method'] = 'showTable';
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function address() {

    global $content;

    $content['title'] = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside'] = '<h1>Bienvenue chez ' . SITETITLE . '</h1><p>Accès > Notre addresse</p>';
    $vhtml            = new VHtml();
    $vhtml->showHtml('../html/address.html');

    $content['vign'] = '';

    return;
}

function doctor() {

    global $content;

    if (isset($_GET['ID_DOCTOR'])) {
        $mdoct = new MDoctors($_GET['ID_DOCTOR']);

        $data = $mdoct->Select();
    } else {
        $data = '';
    }

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h1>Bienvenue chez ' . SITETITLE . '</h1><p>Clinique > Equipe > Fiche du spécialiste</p>';
    $content['class']  = 'VDoctors';
    $content['method'] = 'showDoctor';
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function form_connect() {
    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h1>Connexion en mode administrateur</h1>';
    $content['class']  = 'VDoctors';
    $content['method'] = 'formConnect';
    $content['arg']    = '';

    return;

}

function connect() {
    //Vérification des données de connexion
    $mdoctors = new MDoctors();
    $mdoctors->SetValue($_POST);
    $data = $mdoctors->Verif();

    //Contrôle si $data est bien instancié avec un tuple, sans erreur
    if ($data) {
        //Passage sur un mode administration unique pour tous les utilisateurs
        $_SESSION['ADMIN_SITE'] = true; //Superglobale crée

        home(); //Renvoi sur la page d'accueil avec la superglobale active

        return;
    } else {

        $_SESSION['ERROR'] = 'Mot de passe'; //Instanciation d'une superglobale SESSION 'ERROR'

        global $content;

        $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
        $content['aside']  = '<h1>Connexion en mode administrateur</h1>';
        $content['class']  = 'VDoctors';
        $content['method'] = 'formConnect';
        $content['arg']    = '';
    }
}

function administration() {
    $_SESSION['ADMIN_SITE'] = true; //Superglobale crée

    home();

    return;
}

function deconnect() {
    // Détruit la session
    session_destroy();
    // Détruit les variables de session
    $_SESSION = array();

    // Redirection vers la page d'accueil
    header('Location: ../controllers');

    return;
}

function user_management() {

    $method = isset($_SESSION['ADMIN_SITE']) ? 'manageDoctors' : 'showAccessForbidden'; //Selon si la superglobale est présente ou pas la vue contient des données supplémentaires pour l'administrateur

    $mdoctors = new MDoctors();
    $data     = $mdoctors->SelectAll();

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h2>Gestion des utilisateurs</h2>';
    $content['class']  = 'VDoctors';
    $content['method'] = $method;
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function user_form() {

    //Sécurité pour empecher la modification de la table par un accès via la saisie de la clé dans l'url
    $method = isset($_SESSION['ADMIN_SITE']) ? 'showFormAdminDoctor' : 'showAccessForbidden';

    if (isset($_GET['ID_DOCTOR'])) {
        $mdoctor = new MDoctors($_GET['ID_DOCTOR']);
        $data    = $mdoctor->Select();
    } else {
        $data = '';
    }

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Mode administration';
    $content['aside']  = '<h1>Insertion / Edition d\'utilisateur</h1>';
    $content['class']  = 'VDoctors';
    $content['method'] = $method;
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function user_insert() {
    $method = isset($_SESSION['ADMIN_SITE']) ? 'manageDoctors' : 'showAccessForbidden';

    $mdoctors = new MDoctors();
    $mdoctors->SetValue($_POST);
    $mdoctors->Insert();
    $data = $mdoctors->SelectAll();

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h2>Gestion des utilisateurs</h2>';
    $content['class']  = 'VDoctors';
    $content['method'] = $method;
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function user_update() {
    $method = isset($_SESSION['ADMIN_SITE']) ? 'manageDoctors' : 'showAccessForbidden';

    $mdoctors = new MDoctors($_POST['ID_DOCTOR']);
    $mdoctors->SetValue($_POST);
    $mdoctors->Update();
    $data = $mdoctors->SelectAll();

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h2>Gestion des utilisateurs</h2>';
    $content['class']  = 'VDoctors';
    $content['method'] = $method;
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function user_delete() {
    $method = isset($_SESSION['ADMIN_SITE']) ? 'manageDoctors' : 'showAccessForbidden';

    $mdoctors = new MDoctors($_GET['ID_DOCTOR']);
    $mdoctors->Delete();
    $data = $mdoctors->SelectAll();

    global $content;

    $content['title']  = '' . SITETITLE . ' - ' . SITEDESCRIPTION . ' - Accueil';
    $content['aside']  = '<h2>Gestion des utilisateurs</h2>';
    $content['class']  = 'VDoctors';
    $content['method'] = $method;
    $content['arg']    = $data;

    $content['vign'] = '';

    return;
}

function form_contact() {
    $vhtml = new VHtml();
    $vhtml->showHtml('../html/contact.html');

    $content['vign'] = '';
    return;
}

//Exemple d'utilisation d'un namespace via une API Externe
function send_message() {
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true); //Instanciation d'un Objet PHPMailer -> privélégier la méthode use avec les namespace par la suite pour préserver la clarté du code
    try {
        //Server settings
        $mail->SMTPDebug = 2; // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.laposte.net'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'jerome.villiseck@laposte.net'; // SMTP username
        $mail->Password   = 'Laposte_2017@'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465; // TCP port to connect to

        //Display des erreurs en français
        $mail->setLanguage('fr', '../../public/api/PHPMailer/language/phpmailer.lang-fr.php');

        //Recipients
        $mail->setFrom($_POST['MAIL'], 'Mailer');
        $mail->addAddress('jerome.villiseck@laposte.net', 'Joe User'); // Add a recipient

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Nouvelle demande';
        $mail->Body    = $_POST['OBJECT']; //Body message content
        $mail->AltBody = $_POST['OBJECT']; //Body message content for non HTML clients

        $mail->send();
        echo 'Votre message à été envoyé';
    }
    catch (Exception $e) {
        echo 'Votre message n\'a pas été envoyé. Raison de l\'erreur: ', $mail->ErrorInfo;
    }

    //Réaffichage de la page de contact
    $vhtml = new VHtml();
    $vhtml->showHtml('../html/contact.html');

    $content['vign'] = '';
    return;
}


// Mise en page
require('../../pages/templates/layout.view.php');