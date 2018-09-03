<?php
class MTuples extends MGlobal{
	
	public function SelectAll($_database){
		
		$query = "select *
				  from $_database
				order by LESSON_NUMBER";

		$result = $this->conn->prepare($query);
		$result->bindValue(':ID', $this->value['ID'], PDO::PARAM_INT);
		$result->execute();

		return $result->fetchAll();
	}


	public function Select($_database){
		$query = "select *
				from $_database
				where ID = $this->primary";
		$result = $this->conn->prepare($query);
		$result->execute() or die($this->ErrorSQL($result)); 
		
		return $result->fetch();
	}

	public function SearchAll($_val, &$_counter){
	    if(isset($_val) && !empty($_val)){ //We check that the key/value pair that contains the search is not empty
	        $expression = preg_replace("#[^a-z ?0-9]#i", "", $_val); //Regular expression to make the search case insensitive
            $query = "SELECT * FROM PURE_MVC_ALGO
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION 
                      SELECT * FROM PURE_MVC_ARCHITECTURE
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_C
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_CPP
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_CPPOO
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_CPPQT
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_CPPSTL
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_CSHARP
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_ENGLISH
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_FWKS
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_GODOT
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_GP
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_GRAFIC
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_HTMLCSS
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
                      UNION
                      SELECT * FROM PURE_MVC_JS
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JSAJAX
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JSC
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JSLST
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_JSP
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_MATHS
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_MICRO
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_OS
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PHP
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PHPBDD
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PHPDEBUG
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PHPINT
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PHPMVC
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PHPOO
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PHPS
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PHPSEC
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PHPUML
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PROMANAG
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_PYTHON
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_RUBY
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_UNITY
                      WHERE LESSON_NAME LIKE '%$expression%' OR LESSON_DETAILS LIKE '%$expression%' OR LESSON_KEYWORDS LIKE '%$expression%'
                      UNION
                      SELECT * FROM PURE_MVC_VC
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
