<?php

class MDays extends MGlobal{

    public function SelectDays(){
        $query = '
          SELECT D.LASTNAME, D.PHONENUMBER, D.MAIL, H.HOURS, DA.DAYNAME
          FROM DOCTORS D, DAYS DA, HOURS H, DAYS_HOURS DH, DOCTORS_DAYS DD
          WHERE D.ID_DOCTOR = DD.ID_DOCTOR
          AND DD.ID_DAY = DA.ID_DAY
          AND DA.ID_DAY = DH.ID_DAY
          AND DH.ID_HOUR = H.ID_HOUR
          ';
        $result = $this->conn->prepare($query);
        $result->execute() or die ($this->ErrorSQL($result));

        return $result->fetchAll();
    }
}