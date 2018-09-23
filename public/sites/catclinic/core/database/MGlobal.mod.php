<?php

class MGlobal
{
    //Pour bénéficier de l'héritage sur les attributs membres de la classe passage de leur visibilité en protected
    protected $conn;
    protected $primary_key;
    protected $value;

    //TODO Singleton design pattern à controler

    public function __construct($_primary_key = null) {
        // Connexion à la Base de Données
        if($this->conn == NULL) { //Instanciation PDO Uniquement si l'objet de connexion est null
            $this->conn = new PDO(DATABASE, LOGIN, PASSWORD, array( //Constantes accessibles n'importe ou dans le projet situées dans configDatabase
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); //Forcer l'encodage correct de la base de données
        }

        // Instanciation du membre identifiant
        $this->primary_key = $_primary_key;
        return;
    }

    public function __destruct() {}

    public function SetValue($_value) {
        $this->value = $_value;
        return;
    }

    //Récupération des erreurs SQL dans les classes dérivées
    public function ErrorSQL($result)
    {
        // Récupère le tableau des erreurs
        $error = $result->errorInfo();

        echo 'TYPE_ERROR = ' . $error[0] . '<br />';
        echo 'CODE_ERROR = ' . $error[1] . '<br />';
        echo 'MSG_ERROR = ' . $error[2] . '<br />';

        return;

    } // ErrorSQL($result)
}