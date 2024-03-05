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

        private function QueryDB(object $pdo) 
        {
            $query = "SELECT * FROM users";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);            
        }

        public function GetQuery(object $pdo)
        {
            return $this->QueryDB($pdo);
        }

    }