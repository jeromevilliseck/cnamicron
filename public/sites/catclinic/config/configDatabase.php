<?php

//CONSTANTES DE CONNEXION
define('DEBUG', true);
define('DATABASE', 'mysql:host=localhost;dbname=catclinic_db');
define('LOGIN', 'root');
define('PASSWORD', 'root');

// Visualisation des erreurs
if (DEBUG)
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    function debug($Tab)
    {
        echo '<pre>Tab';
        print_r($Tab);
        echo '</pre>';

        return;

    } // debug($Tab)
}

//eviter l'affichage des erreurs en mode production (dangereux)
error_reporting(0);
ini_set('display_errors', 0);