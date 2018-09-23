<?php

class VGlobal
{
    public function __construct(){}

    public function __destruct(){}

    public function showAccessForbidden(){
        echo <<<HERE
    <br/>
<a href="../controllers/index.php" class="alert button">Accès interdit, cliquez pour retourner à l'accueil</a>
HERE;
    }
}