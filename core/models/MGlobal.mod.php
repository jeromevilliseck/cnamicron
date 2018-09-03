<?php
class MGlobal{
    protected $conn;
    protected $primary;
    protected $value;
    
    public function __construct($_primary = null){
        //PDO Object = DATABASE Connection
        $this->conn  = new PDO(DATABASE, LOGIN, PASSWORD, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        //$id_doc instanciation
        $this->primary = $_primary;
        return;
    }
    
    public function __destruct(){}
    
    public function SetValue($_value){
        $this->value = $_value;
        return;
    }
}
