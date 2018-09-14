<?php

class MUsers extends MGlobal
{
    public function VerifUser($_value)
    {
        $login = $_value['LOGIN'];
        $password = $_value['PASSWORD'];

        $query = "select ID_USER,
                     NOM, 
                     PRENOM
              from USERS
              where LOGIN = '$login'
              and PASSWORD = '$password'";

        $result = $this->conn->prepare($query);

        $result->execute();

        return $result->fetch();

    } // VerifUser($_value)
}