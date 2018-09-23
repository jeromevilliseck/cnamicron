<?php

class MDoctors extends MGlobal{

//PARTIE OPERANT SUR L'ENSEMBLE DES TUPLES

    public function SelectAll(){
        $query = '
        select D.ID_DOCTOR, D.LASTNAME, D.FIRSTNAME, D.TYPEDOCTOR, D.PHONENUMBER, D.MAIL, D.PORTRAIT
        from DOCTORS D
        ';
        $result = $this->conn->prepare($query);
        $result->execute() or die ($this->ErrorSQL($result));

        return $result->fetchAll();

    }

    public function SelectSpecialities($_idDoctor){
        $query = '
        SELECT S.SPECIALITY FROM SPECIALITIES S, DOCTORS_SPECIALITIES DS, DOCTORS D
        WHERE S.ID_SPECIALITY = DS.ID_SPECIALITY
        AND DS.ID_DOCTOR = D.ID_DOCTOR
        AND D.ID_DOCTOR = "'.$_idDoctor.'"
        ';

        $result = $this->conn->prepare($query);
        $result->execute() or die ($this->ErrorSQL($result));

        return $result->fetchAll();
    }

    public function SelectCount(){
        $query = '
        SELECT * FROM DOCTORS
        ';

        $result = $this->conn->prepare($query);
        $result->execute() or die ($this->ErrorSQL($result));

        return $result->rowCount(); //Attention il faut utiliser la méthode rowCount de la classe PDOStatement et non par faire un SELECT count avec un return result car on va sinon renvoyer un objet
    }

//PARTIE OPERANT SUR UN SEUL TUPLE

    public function Select()
    {
        $query = "select ID_DOCTOR,
                     LASTNAME,
                     FIRSTNAME,
                     PHONENUMBER,
                     MAIL,
                     TYPEDOCTOR,
                     PORTRAIT,
                     PASSWORD
              from DOCTORS
              where ID_DOCTOR = $this->primary_key"; //Récupérée au moment de l'instanciation -> Voir la classe mère MGlobal

        $result = $this->conn->prepare($query);

        $result->execute() or die ($this->ErrorSQL($result));

        return $result->fetch();

    } // Select()

    public function Insert(){
        $query = 'insert into 
                  DOCTORS 
                  (LASTNAME, 
                  FIRSTNAME, 
                  PHONENUMBER, 
                  MAIL, 
                  TYPEDOCTOR, 
                  PORTRAIT, 
                  PASSWORD)
                  values
                  (:LASTNAME, 
                  :FIRSTNAME, 
                  :PHONENUMBER, 
                  :MAIL, 
                  :TYPEDOCTOR, 
                  :PORTRAIT, 
                  :PASSWORD)
        ';

        $result = $this->conn->prepare($query);

        $result->bindValue(':LASTNAME', $this->value['LASTNAME'], PDO::PARAM_STR);
        $result->bindValue(':FIRSTNAME', $this->value['FIRSTNAME'], PDO::PARAM_STR);
        $result->bindValue(':PHONENUMBER', $this->value['PHONENUMBER'], PDO::PARAM_STR);
        $result->bindValue(':MAIL', $this->value['MAIL'], PDO::PARAM_STR);
        $result->bindValue(':TYPEDOCTOR', $this->value['TYPEDOCTOR'], PDO::PARAM_STR);
        $result->bindValue(':PORTRAIT', $this->value['PORTRAIT'], PDO::PARAM_STR);
        $result->bindValue(':PASSWORD', $this->value['PASSWORD'], PDO::PARAM_STR);

        $result->execute() or die ($result);

        $this->primary_key = $this->conn->lastInsertId();

        $this->value['ID_DOCTOR'] = $this->primary_key;

        return $this->value;
    }

    public function Update(){
        $query = 'update DOCTORS
  	          set LASTNAME = :LASTNAME,
  	              FIRSTNAME = :FIRSTNAME,
  	              PHONENUMBER = :PHONENUMBER,
  	              MAIL = :MAIL,
  	              TYPEDOCTOR = :TYPEDOCTOR,
  	              PORTRAIT = :PORTRAIT,
  	              PASSWORD = :PASSWORD
  	          where ID_DOCTOR = :ID_DOCTOR
  	          ';

        $result = $this->conn->prepare($query);

        $result->bindValue(':ID_DOCTOR', $this->primary_key, PDO::PARAM_INT);
        $result->bindValue(':LASTNAME', $this->value['LASTNAME'], PDO::PARAM_STR);
        $result->bindValue(':FIRSTNAME', $this->value['FIRSTNAME'], PDO::PARAM_STR);
        $result->bindValue(':PHONENUMBER', $this->value['PHONENUMBER'], PDO::PARAM_STR);
        $result->bindValue(':MAIL', $this->value['MAIL'], PDO::PARAM_STR);
        $result->bindValue(':TYPEDOCTOR', $this->value['TYPEDOCTOR'], PDO::PARAM_STR);
        $result->bindValue(':PORTRAIT', $this->value['PORTRAIT'], PDO::PARAM_STR);
        $result->bindValue(':PASSWORD', $this->value['PASSWORD'], PDO::PARAM_STR);

        $result->execute() or die ($result);

        return;
    }

    public function Delete(){
        $query = '
              delete from DOCTORS
  	 	      where ID_DOCTOR = :ID_DOCTOR
  	 	      ';

        $result = $this->conn->prepare($query);

        $result->bindValue(':ID_DOCTOR', $this->primary_key, PDO::PARAM_INT);
        $result->execute() or die ($result);

        return;
    }

    //Connexion en mode administration
    public function Verif()
    {
        $query = 'select ID_DOCTOR,
                     MAIL, PASSWORD
	          from DOCTORS
              where MAIL = :MAIL
              and PASSWORD = :PASSWORD';

        $result = $this->conn->prepare($query);

        $result->bindValue(':MAIL', $this->value['MAIL'], PDO::PARAM_STR);
        $result->bindValue(':PASSWORD', $this->value['PASSWORD'], PDO::PARAM_STR);

        $result->execute();

        return $result->fetch();

    } // Verif()
}