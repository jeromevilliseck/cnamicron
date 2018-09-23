<?php

class VDoctors extends VGlobal {

    //AFFICHAGE DE TOUS LES TUPLES

    public function showList($_data) {

        /*TODO Maintenabilité et réutilisabilité à augmenter
        Supprimer les dépendances en algorithmie pour aller vers un code générique
        Intégrer les boucles "spécialité des docteurs" dans une portée plus basse en remplaçant l'indice par ID_DOCTOR
        */

        //Spécialité du premier docteur $_data[1]->Remain (couple indice / objet de type PDO::fetchAll()
        $variableRemain = '';
        foreach ($_data[1] as $local) {
            $variableRemain .= '<li>' . $local['SPECIALITY'] . '</li>';
        }

        //Spécialité du deuxième docteur $_data[2]->Burlotte
        $variableBurlotte = '';
        foreach ($_data[2] as $local) {
            $variableBurlotte .= '<li>' . $local['SPECIALITY'] . '</li>';
        }

        //Spécialité du troisième docteur $_data[3]->Abeauveaux
        $variableAbeauveaux = '';
        foreach ($_data[3] as $local) {
            $variableAbeauveaux .= '<li>'. $local['SPECIALITY'] . '</li>';
        }

        //Boucle sur tuples
        $tr = '';

        //Ajout de création ou pas de contenu dynamiquement via des conditions ternaires
        foreach ($_data[0] as $val) {
            ($val['ID_DOCTOR'] != NULL) ? $doctorNumber = '<span><a href="../controllers/index.php?EX=doct&amp;ID_DOCTOR=' . $val['ID_DOCTOR'] . '">' . $val['ID_DOCTOR'] . '</a></span>' : $doctorNumber = NULL;
            ($val['LASTNAME'] != NULL) ? $doctorLastName = '<span><a href="../controllers/index.php?EX=doct&amp;ID_DOCTOR=' . $val['ID_DOCTOR'] . '">' . $val['LASTNAME'] . '</a></span>' : $doctorLastName = NULL;
            ($val['FIRSTNAME'] != NULL) ? $doctorFirstName = '<span><a href="../controllers/index.php?EX=doct&amp;ID_DOCTOR=' . $val['ID_DOCTOR'] . '">' . $val['FIRSTNAME'] . '</a></span>' : $doctorFirstName = NULL;
            ($val['TYPEDOCTOR'] != NULL) ? $doctorTypeDoctor = '<h2>' . $val['TYPEDOCTOR'] . '</h2>' : $doctorTypeDoctor = NULL;
            ($val['PHONENUMBER'] != NULL) ? $doctorPhoneNumber = '<p><a href="tel:+(33)' . $val['PHONENUMBER'] . '">0' . $val['PHONENUMBER'] . '</a></p>' : $doctorPhoneNumber = NULL;
            ($val['MAIL'] != NULL) ? $doctorMail = '<p><a href="mailto:' . $val['MAIL'] . '">' . $val['MAIL'] . '</a></p>' : $doctorMail = NULL;
            ($val['PORTRAIT'] != NULL) ? $doctorPortrait = '<p><img src="' . $val['PORTRAIT'] . '"></p>' : $doctorPortrait = NULL;

            //Affectation d'une variable contenant la boucle sur les resultats issue de l'objet venant de la requete select avec les jointures
            //TODO Intéressant : on ne peut pas faire une boucle classique puisque a chaque passage on réaffecterait la variable locale
            //Essayer de sortir de ce problème car sinon il va falloir une variable locale pour chaque $variable issue d'une boucle sur la requete issue des jointures
            ($val['ID_DOCTOR'] == 1) ? $dS1 = '<p> Spécialité : ' . $variableRemain . '</p>' : $dS1 = NULL;
            ($val['ID_DOCTOR'] == 2) ? $dS2 = '<p> Spécialité : ' . $variableBurlotte . '</p>' : $dS2 = NULL;
            ($val['ID_DOCTOR'] == 3) ? $dS3 = '<p> Spécialité : ' . $variableAbeauveaux . '</p>' : $dS3 = NULL;
            //Fin de la portion spécifique

            (($val['ID_DOCTOR'] || $val['LASTNAME'] || $val['FIRSTNAME'] || $val['TYPEDOCTOR'] || $val['PHONENUMBER'] || $val['MAIL'] || $val['PORTRAIT']) != NULL) ? $articleStart = '<article>' : $articleStart = NULL;
            (($val['ID_DOCTOR'] || $val['LASTNAME'] || $val['FIRSTNAME'] || $val['TYPEDOCTOR'] || $val['PHONENUMBER'] || $val['MAIL'] || $val['PORTRAIT']) != NULL) ? $articleEnd = '</article>' : $articleEnd = NULL;

            (($val['ID_DOCTOR'] && $val['LASTNAME'] && $val['FIRSTNAME']) != NULL) ? $headerStart = '<header><h2>' : $headerStart = NULL;
            (($val['ID_DOCTOR'] && $val['LASTNAME'] && $val['FIRSTNAME']) != NULL) ? $headerEnd = '</h2></header>' : $headerEnd = NULL;

            (($val['TYPEDOCTOR'] || $val['PORTRAIT']) != NULL) ? $sectionStart = '<section>' : $sectionStart = NULL;
            (($val['TYPEDOCTOR'] || $val['PORTRAIT']) != NULL) ? $sectionEnd = '</section>' : $sectionEnd = NULL;

            (($val['PHONENUMBER'] && $val['MAIL']) != NULL) ? $footerStart = '<footer>' : $footerStart = NULL;
            (($val['PHONENUMBER'] && $val['MAIL']) != NULL) ? $footerEnd = '</footer>' : $footerEnd = NULL;

            $tr .= '' . $articleStart . '
            ' . $headerStart . '' . $doctorNumber . ' : ' . $doctorFirstName . ' ' . $doctorLastName . '' . $headerEnd . '
            ' . $sectionStart . '' . $doctorTypeDoctor . '' . $doctorPortrait . '' . $dS1 . '' . $dS2 . '' . $dS3 . '' . $sectionEnd . '
            ' . $footerStart . '' . $doctorPhoneNumber . '' . $doctorMail . '' . $footerEnd . '
            ' . $articleEnd . '
            ';
        }

        echo <<<HERE
        <br/>
            $tr
HERE;
    }

    //AFFICHAGE 1 TUPLE

    public function showDoctor($_data) {
        if ($_data) {
            $lastname    = $_data['LASTNAME'];
            $firstname   = $_data['FIRSTNAME'];
            $typedoctor  = $_data['TYPEDOCTOR'];
            $phonenumber = $_data['PHONENUMBER'];
            $mail        = $_data['MAIL'];
            $portrait    = $_data['PORTRAIT'];
        } else {
            $lastname    = '';
            $firstname   = '';
            $typedoctor  = '';
            $phonenumber = '';
            $mail        = '';
            $portrait    = '';
        }

        echo <<<HERE
    <h2>$lastname $firstname ($typedoctor)</h2>
    <p>
    <a href="tel:(+33)$phonenumber" class="button alert">0$phonenumber</a>
    <a href="mailto:$mail" class="button">$mail</a>
    </p>
    <div><img src="$portrait"/></div>
HERE;
    }

    //AFFICHAGE FORMULAIRE CONNEXION

    public function formConnect(){

        // Instanciation de $erreur suivant la valeur de l'erreur ('Mot de passe')
        $erreur = (isset($_SESSION['ERROR']) && 'Mot de passe' == $_SESSION['ERROR']) ? '<h2>ERREUR : Utilisateur non connu</h2>' : '';

        // Instanciation des variables $email $passord suivant les valeurs récupérées du formulaire
        $email = isset($_REQUEST['EMAIL']) ? $_REQUEST['EMAIL'] : '';
        $password = isset($_REQUEST['PASSWORD']) ? $_REQUEST['PASSWORD'] : '';

        // Mise à false de la session d'erreur
        $_SESSION['ERROR'] = false;

        $legend = '';
        $ex = 'conn';

        // Affichage du formulaire de connexion
        echo <<<HERE
  	<form id="connect" action="../../public/controllers/index.php" method="post">
  	 <fieldset>
  	  <legend>$legend</legend>
  	  <input type="hidden" name="EX" value="$ex" />
  	  $erreur
  	  <p>
  	   <label for="lgn">Email</label>
  	   <input id="lgn" type="email" name="MAIL" value="$email" />
  	  </p>
  	  <p>
  	   <label for="pwd">Mot de passe</label>
  	   <input id="pwd" type="password" name="PASSWORD" value="$password" />
  	  </p>
  	  <p class="center">
  	   <input type="submit" value="Ok" class="button"/>
  	  </p>
  	 </fieldset>
  	</form>
HERE;

        return;
    }

    //AFFICHAGE DE TOUS LES TUPLES EN MODE ADMINISTRATION

    public function manageDoctors($_data){
        $tr = '';

        foreach ($_data as $val) {
            ($val['ID_DOCTOR'] != NULL) ? $doctorNumber = '<span><a href="../controllers/index.php?EX=doct&amp;ID_DOCTOR=' . $val['ID_DOCTOR'] . '">' . $val['ID_DOCTOR'] . '</a></span>' : $doctorNumber = NULL;
            ($val['LASTNAME'] != NULL) ? $doctorLastName = '<span><a href="../controllers/index.php?EX=doct&amp;ID_DOCTOR=' . $val['ID_DOCTOR'] . '">' . $val['LASTNAME'] . '</a></span>' : $doctorLastName = NULL;
            ($val['FIRSTNAME'] != NULL) ? $doctorFirstName = '<span><a href="../controllers/index.php?EX=doct&amp;ID_DOCTOR=' . $val['ID_DOCTOR'] . '">' . $val['FIRSTNAME'] . '</a></span>' : $doctorFirstName = NULL;
            ($val['TYPEDOCTOR'] != NULL) ? $doctorTypeDoctor = '<h2>' . $val['TYPEDOCTOR'] . '</h2>' : $doctorTypeDoctor = NULL;
            ($val['PHONENUMBER'] != NULL) ? $doctorPhoneNumber = '<p><a href="tel:+(33)' . $val['PHONENUMBER'] . '">0' . $val['PHONENUMBER'] . '</a></p>' : $doctorPhoneNumber = NULL;
            ($val['MAIL'] != NULL) ? $doctorMail = '<p><a href="mailto:' . $val['MAIL'] . '">' . $val['MAIL'] . '</a></p>' : $doctorMail = NULL;
            ($val['PORTRAIT'] != NULL) ? $doctorPortrait = '<p><img src="' . $val['PORTRAIT'] . '"></p>' : $doctorPortrait = NULL;

            (($val['ID_DOCTOR'] || $val['LASTNAME'] || $val['FIRSTNAME'] || $val['TYPEDOCTOR'] || $val['PHONENUMBER'] || $val['MAIL'] || $val['PORTRAIT']) != NULL) ? $articleStart = '<article>' : $articleStart = NULL;
            (($val['ID_DOCTOR'] || $val['LASTNAME'] || $val['FIRSTNAME'] || $val['TYPEDOCTOR'] || $val['PHONENUMBER'] || $val['MAIL'] || $val['PORTRAIT']) != NULL) ? $articleEnd = '</article>' : $articleEnd = NULL;

            (($val['ID_DOCTOR'] && $val['LASTNAME'] && $val['FIRSTNAME']) != NULL) ? $headerStart = '<header><h2>' : $headerStart = NULL;
            (($val['ID_DOCTOR'] && $val['LASTNAME'] && $val['FIRSTNAME']) != NULL) ? $headerEnd = '</h2></header>' : $headerEnd = NULL;

            (($val['TYPEDOCTOR'] || $val['PORTRAIT']) != NULL) ? $sectionStart = '<section>' : $sectionStart = NULL;
            (($val['TYPEDOCTOR'] || $val['PORTRAIT']) != NULL) ? $sectionEnd = '</section>' : $sectionEnd = NULL;

            (($val['PHONENUMBER'] && $val['MAIL']) != NULL) ? $footerStart = '<footer>' : $footerStart = NULL;
            (($val['PHONENUMBER'] && $val['MAIL']) != NULL) ? $footerEnd = '</footer>' : $footerEnd = NULL;

            $tr .= '' . $articleStart . '
            ' . $headerStart . '
            <a href="../controllers/index.php?EX=user_ins&amp;ID_DOCTOR='.$val['ID_DOCTOR'].'" class="button">Modifier cet utilisateur</a>
            ' . $doctorFirstName . ' ' . $doctorLastName . '' . $headerEnd . '
            ' . $sectionStart . '' . $doctorTypeDoctor . '' . $doctorPortrait . '' . $sectionEnd . '
            ' . $footerStart . '' . $doctorPhoneNumber . '' . $doctorMail . '' . $footerEnd . '
            ' . $articleEnd . '
            ';
        }

        echo <<<HERE
        <br/>
            <a href="../controllers/index.php?EX=user_ins" class="success button">Ajouter un utilisateur</a>
            $tr
HERE;
    }

    //FORMULAIRE INSERTION / MODIFICATION DE TUPLE

    public function showFormAdminDoctor($_data){
        if ($_data){
            $ex = 'upd_ok';
            $_id_doctor = $_data['ID_DOCTOR'];
            $_lastname = $_data['LASTNAME'];
            $_firstname = $_data['FIRSTNAME'];
            $_phonenumber = $_data['PHONENUMBER'];
            $_mail = $_data['MAIL'];
            $_typedoctor = $_data['TYPEDOCTOR'];
            $_portrait = $_data['PORTRAIT'];
            $_password = $_data['PASSWORD'];
        }
        else
        {
            $ex = 'ins_ok';
            $_id_doctor = '';
            $_lastname = '';
            $_firstname = '';
            $_phonenumber = '';
            $_mail = '';
            $_typedoctor = '';
            $_portrait = '';
            $_password = '';
        }

        echo <<<HERE
    <br/>
<form action="../../public/controllers/index.php?EX=user_$ex" method="post">
<input type="hidden" name="ID_DOCTOR" value="$_id_doctor" />
 <p>
  <label for="nom">Nom</label>
  <input type="text" id="nom" name="LASTNAME" value="$_lastname" autofocus required />
 </p>
 <p>
  <label for="prenom">Prenom</label>
  <input type="text" id="prenom" name="FIRSTNAME" value="$_firstname" required />
 </p>
 <p>
  <label for="type">Type de spécialité</label>
  <input type="text" id="type" name="TYPEDOCTOR" value="$_typedoctor" required />
 </p>
 <p>
  <label for="numero">Numero de telephone <br>(ne pas mettre le 0 devant, 9 chiffres uniquement)</label>
  <input type="tel" id="numero" name="PHONENUMBER" value="$_phonenumber" required />
 </p>
 <p>
  <label for="mail">Adresse mail</label>
  <input type="email" id="mail" name="MAIL" value="$_mail" required />
 </p>
 <p>
  <label for="mail">Portrait</label>
  <input type="text" id="mail" name="PORTRAIT" value="$_portrait" />
 </p>
 <p>
  <label for="mail">Mot de passe du compte</label>
  <input type="text" id="mail" name="PASSWORD" value="$_password" required />
 </p>
 <p><input type="submit" value="Enregistrer" class="success button"/></p>
</form>
<p><a href="../../public/controllers/index.php?EX=user_del&amp;ID_DOCTOR=$_id_doctor" class="alert button">Supprimer cet utilisateur</a></p>
HERE;

        return;

    }
}