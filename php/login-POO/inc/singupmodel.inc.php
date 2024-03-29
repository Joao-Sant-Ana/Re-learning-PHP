<?php
    session_start();
    require_once "connection.inc.php";
    

    class DbQuery
    {
        private object $pdo;

        
        public function __construct ($pdo)
        {
            $this->pdo = $pdo;
        }

        private function QueryDB(object $pdo, string $username, string $email, string $password) 
        {
            $query = "SELECT * FROM users";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);            
        }

        public function GetQuery(object $pdo, string $username, string $email, string $password)
        {
            return $this->QueryDB($pdo, $username, $email, $password);
        }

    }

    $test = new DbQuery($pdo);
    $result = $test->GetQuery($pdo, "João", "joo@gmail.com", "1234");

    for($i = 0; $i < count($result); $i++) {
        if ($result[$i]["username"] == "João") {
            echo $result[$i]["username"] . "<br>";
        } else {
            echo false;
        }
    }
