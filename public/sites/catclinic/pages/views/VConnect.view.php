<?php

class VConnect{
        public function formConnect()
        {
            // Instanciation de $erreur suivant la valeur de l'erreur ('Mot de passe')
            $erreur = (isset($_SESSION['ERROR']) && 'Mot de passe' == $_SESSION['ERROR']) ? '<p class="error center">Votre Mot de passe est erroné !</p>' : '';
            // Instanciation de nouveau suivant la valeur de l'erreur ('Nouveau')
            $nouveau = (isset($_SESSION['ERROR']) && 'Nouveau' == $_SESSION['ERROR']) ? '<p class="error nouveau center">Votre Email et votre Mot de passe sont erronés !<br />Etes vous un nouvel utilisateur ? <br />Si oui, cliquez sur <a href="../Php/index.php?EX=nouveau&amp;EMAIL=' . $_REQUEST['EMAIL'] .'&amp;PASSWORD=' . $_REQUEST['PASSWORD'] .'">Nouvel utilisateur</a>.</p>' : '';

            // Test si le paramètre de contrôle EX vaut 'nouveau' ou 'insert_auteur'
            if ('nouveau' == $_REQUEST['EX'] || ('insert_auteur' == $_REQUEST['EX']))
            {
                // Instanciation des variables du formulaire
                $legend = 'Nouvel utilisateur';

                $erreur_confirmation = ('insert_auteur' == $_REQUEST['EX']) ? '<p class="error center">Votre mot de passe et la confirmation ne sont pas identiques !</p>' : '';

                $confirmation = '<p><label for="confirm">Confirmation</label><input id="confirm" type="password" name="CONFIRMATION" value="" size="10" maxlength="10" /></p>' . $erreur_confirmation;

                $ex = 'insert_auteur';
            }
            else
            {
                // Instanciation des variables du formulaire avec les valeurs par défaut
                $legend = 'Connexion';
                $confirmation = '';
                $ex = 'conn';
            }

            // Instanciation des variables $email $passord suivant les valeurs récupérées du formulaire
            $email = isset($_REQUEST['EMAIL']) ? $_REQUEST['EMAIL'] : '';
            $password = isset($_REQUEST['PASSWORD']) ? $_REQUEST['PASSWORD'] : '';

            // Mise à false de la session d'erreur
            $_SESSION['ERROR'] = false;

            // Affichage du formulaire de connexion
            echo <<<HERE
  	<form id="connect" action="../Php/index.php" method="post">
  	 <fieldset>
  	  <legend>$legend</legend>
  	  <input type="hidden" name="EX" value="$ex" />
  	  $erreur
  	  <p>
  	   <label for="login">Email</label>
  	   <input id="login" name="EMAIL" value="$email" size="10" maxlength="200" />
  	  </p>
  	  <p>
  	   <label for="pwd">Mot de passe</label>
  	   <input id="pwd" type="password" name="PASSWORD" value="$password" size="10" maxlength="10" />
  	  </p>
  	  $confirmation
  	  <p class="center">
  	   <input type="submit" value="Ok" />
  	  </p>
  	 </fieldset>
  	</form>
  	$nouveau
HERE;

            return;

        } // formConnect()
}