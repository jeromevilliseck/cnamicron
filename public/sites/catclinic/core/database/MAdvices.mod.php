<?php

class MAdvices extends MGlobal{

    public function SelectAll() {
        $query = "
          select ID_ADVICE, TYPES, SHOWED
          from ADVICES
          order by ID_ADVICE
          ";

        $result = $this->conn->prepare($query);
        $result->bindValue(':ID_ADVICE', $this->value['ID_ADVICE'], PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll();
    }
}