<?php
// Visualisation des erreurs
if (DEBUG)
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    /**
     * Fonction de debug pour les tableaux
     * @param array tableau à débugguer
     *
     * @return none
     */
    function debug($Tab)
    {
        echo '<pre>Tab';
        print_r($Tab);
        echo '</pre>';

    } // debug($Tab)
}