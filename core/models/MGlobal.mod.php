<?php
class MGlobal{
    protected $conn; //Objet PDO de connexion à la BDD
    public $primary; //clef primaire de la table
    protected $value; //tableau contenant comme clef les attributs de la table et comme valeurs les données à insérer ou à mettre à jour dans la table

    //User
    protected $id_user;

    /**
     * MGlobal constructor.
     * @param null $_primary Clé primaire de la table par défaut nulle
     * @param null $_id_user identifiant de l'utilisateur
     */
    public function __construct($_primary = null, $_id_user = null){
        //PDO Object = DATABASE Connection
        $this->conn  = new PDO(DATABASE, LOGIN, PASSWORD, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        //$id_doc instanciation
        $this->primary = $_primary;
        $this->id_user = $_id_user;
        return;
    }
    
    public function __destruct(){}
    
    public function SetValue($_value){
        $this->value = $_value;
        return;
    }

    /**
     * @see used only to see errors in your MVC Architecture
     * @param $result
     */
    public function ErrorSQL($result)
    {
        if (DEBUG) {
        } else {
            return;
        }

        $error = $result->errorInfo();

        debug($error);

        return;

    } // ErrorSQL($result)
}
