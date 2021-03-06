<?php
class MTuples extends MGlobal{
	
	public function SelectAll($_database){
		
		$query = "select *
				  from $_database
				order by LESSON_NUMBER";

		$result = $this->conn->prepare($query);

		$result->execute();

		return $result->fetchAll();
	}


	public function Select($_databaseTable){
		$query = "select *
				from $_databaseTable
				where ID = $this->primary";
		$result = $this->conn->prepare($query);
		$result->execute() or die($this->ErrorSQL($result)); 
		
		return $result->fetch();
	}

    /**
     * @see
     * @param $_type argument correspondant au type de modification qui sera effectuée sur la table : insert, update ou delete
     * @return mixed, switch permet d'appeler la méthode privée correspondante à la valeur de l'argument passé dans la méthode Modify()
     */
    public function Modify($_type, $_database = NULL)
    {
        switch ($_type)
        {
            case 'insert' : return $this->Insert($_database);
            case 'update' : return $this->Update($_database);
            case 'delete' : return $this->Delete($_database);
        }

    } // Modify($_type)

    private function Insert($_databaseTable)
    {
        $query = "insert into $_databaseTable
                  set ID = :ID,
                  LESSON_NUMBER = :LESSONNUMBER,
                  LESSON_CHAPTER = :CHAPTER,
                  LESSON_NAME = :LESSON,
                  LESSON_COLOR = :COLOR,
                  LESSON_DETAILS = :DETAILS,
                  LESSON_KEYWORDS = :KEYWORDS,
                  LESSON_FILE_PREVIEW = :PREVIEW,
                  LESSON_FILE_LINK = :LINK,
                  LESSON_FILE_VIDEOLINK = :VIDEOLINK,
                  LESSON_CODE = :CODE
        ";

        $result = $this->conn->prepare($query);

        $result->bindValue(':LESSON', $this->value['LESSON_NAME'], PDO::PARAM_STR);
        $result->bindValue(':DETAILS', $this->value['LESSON_DETAILS'], PDO::PARAM_STR);
        $result->bindValue(':KEYWORDS', $this->value['LESSON_KEYWORDS'], PDO::PARAM_STR);
        $result->bindValue(':PREVIEW', $this->value['LESSON_FILE_PREVIEW'], PDO::PARAM_STR);
        $result->bindValue(':LINK', $this->value['LESSON_FILE_LINK'], PDO::PARAM_STR);
        $result->bindValue(':VIDEOLINK', $this->value['LESSON_FILE_VIDEOLINK'], PDO::PARAM_STR);
        $result->bindValue(':CODE', $this->value['LESSON_CODE'], PDO::PARAM_STR);
        $result->bindValue(':CHAPTER', $this->value['LESSON_CHAPTER'], PDO::PARAM_STR);
        $result->bindValue(':COLOR', $this->value['LESSON_COLOR'], PDO::PARAM_STR);
        $result->bindValue(':LESSONNUMBER', $this->value['LESSON_NUMBER'], PDO::PARAM_INT);
        $result->bindValue(':ID', $this->primary, PDO::PARAM_INT);


        $result->execute();
        $this->primary = $this->conn->lastInsertId();

        echo $this->primary;

        return;

    } // Insert()

    private function Update($_databaseTable)
    {
        $query = "update $_databaseTable
              set LESSON_NAME = :LESSON,
                  LESSON_NUMBER = :LESSONNUMBER,
                  LESSON_CHAPTER = :CHAPTER,
                  LESSON_COLOR = :COLOR,
                  LESSON_DETAILS = :DETAILS,
                  LESSON_KEYWORDS = :KEYWORDS,
                  LESSON_FILE_PREVIEW = :PREVIEW,
                  LESSON_FILE_LINK = :LINK,
                  LESSON_FILE_VIDEOLINK = :VIDEOLINK,
                  LESSON_CODE = :CODE
              where ID = :ID";

        $result = $this->conn->prepare($query);

        $result->bindValue(':LESSON', $this->value['LESSON_NAME'], PDO::PARAM_STR);
        $result->bindValue(':DETAILS', $this->value['LESSON_DETAILS'], PDO::PARAM_STR);
        $result->bindValue(':KEYWORDS', $this->value['LESSON_KEYWORDS'], PDO::PARAM_STR);
        $result->bindValue(':PREVIEW', $this->value['LESSON_FILE_PREVIEW'], PDO::PARAM_STR);
        $result->bindValue(':LINK', $this->value['LESSON_FILE_LINK'], PDO::PARAM_STR);
        $result->bindValue(':VIDEOLINK', $this->value['LESSON_FILE_VIDEOLINK'], PDO::PARAM_STR);
        $result->bindValue(':CODE', $this->value['LESSON_CODE'], PDO::PARAM_STR);
        $result->bindValue(':CHAPTER', $this->value['LESSON_CHAPTER'], PDO::PARAM_STR);
        $result->bindValue(':COLOR', $this->value['LESSON_COLOR'], PDO::PARAM_STR);
        $result->bindValue(':LESSONNUMBER', $this->value['LESSON_NUMBER'], PDO::PARAM_INT);
        $result->bindValue(':ID', $this->primary, PDO::PARAM_STR);

        $result->execute();

        return;

    } // Update()

    private function Delete($_databaseTable)
    {
        $query = "delete from $_databaseTable
              where ID = $this->primary";

        $result = $this->conn->prepare($query);

        $result->execute() or die ($this->ErrorSQL($result));

        return;

    } // Delete()


	public function SearchAll($_val, &$_counter){
	    if(isset($_val) && !empty($_val)){ //We check that the key/value pair that contains the search is not empty
	        $expression = preg_replace("#[^a-z ?0-9]#i", "", $_val); //Regular expression to make the search case insensitive
            $query = "SELECT * FROM PURE_MVC_ALGO
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION 
                      SELECT * FROM PURE_MVC_CPP
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_CPPOO
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVA
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVADP
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVAFX
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVAOO
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVA_EJB
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVA_HIBERNATEORM
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVA_JBOSS
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVA_JDBC
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVA_JSF
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVA_JSP
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JAVA_SPRING
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      ";

            $result = $this->conn->prepare($query);

            //TODO binder la requête

            $result->execute();

            $count = $result->rowCount();
            if($count == 0){
                echo "<meta http-equiv=\"refresh\" content=\"0; URL='main.php?EX=noresults'\" />";
                exit();
            }

            $_counter = $result->rowCount();

            return $result->fetchAll();
        }

    }

}
