<?php

class MSpecialities extends MGlobal
{
    public function SelectAll(){
        $query = '
        select S.ID_SPECIALITY, S.SPECIALITY, S.SPECIALITY_DESCRIPTION
        from SPECIALITIES S
        ';

        $result = $this->conn->prepare($query);
        $result->execute() or die ($this->ErrorSQL($result));
        return $result->fetchAll();
    }

    public function Select(){
        $query = '
          select S.ID_SPECIALITY, S.SPECIALITY, S.SPECIALITY_DESCRIPTION
  	      from SPECIALITIES S
  	      where ID_SPECIALITY = :ID_SPECIALITY
        ';

        $result = $this->conn->prepare($query);

        $result->bindValue(':ID_SPECIALITY', $this->primary_key, PDO::PARAM_INT);

        $result->execute() or die ($result);

        $value = $result->fetch();

        return $value;
    }

    public function Insert()
    {
        $query = '
          insert into SPECIALITIES (SPECIALITY, SPECIALITY_DESCRIPTION)
          values(:SPECIALITY, :SPECIALITY_DESCRIPTION)
          ';

        $result = $this->conn->prepare($query);

        $result->bindValue(':SPECIALITY', $this->value['SPECIALITY'], PDO::PARAM_STR);
        $result->bindValue(':SPECIALITY_DESCRIPTION', $this->value['SPECIALITY_DESCRIPTION'], PDO::PARAM_STR);

        $result->execute() or die ($result);
        $this->primary_key = $this->conn->lastInsertId();
        $this->value['ID_SPECIALITY'] = $this->primary_key;

        return $this->value;
    } // Insert()

    public function Update()
    {
        $query = '
            update SPECIALITIES
            set SPECIALITY = :SPECIALITY,
            SPECIALITY_DESCRIPTION = :SPECIALITY_DESCRIPTION
            where ID_SPECIALITY = :ID_SPECIALITY
        ';

        $result = $this->conn->prepare($query);

        $result->bindValue(':ID_SPECIALITY', $this->value['ID_SPECIALITY'], PDO::PARAM_STR);
        $result->bindValue(':SPECIALITY', $this->value['SPECIALITY'], PDO::PARAM_STR);
        $result->bindValue(':SPECIALITY_DESCRIPTION', $this->value['SPECIALITY_DESCRIPTION'], PDO::PARAM_STR);

        $result->execute() or die ($result);

        return;
    }

    public function Delete(){
        $query = '
          delete from SPECIALITIES
  	 	  where ID_SPECIALITY = :ID_SPECIALITY
  	 	  ';

        $result = $this->conn->prepare($query);

        $result->bindValue(':ID_SPECIALITY', $this->primary_key, PDO::PARAM_INT);
        $result->execute() or die ($result);

        return;
    }
}