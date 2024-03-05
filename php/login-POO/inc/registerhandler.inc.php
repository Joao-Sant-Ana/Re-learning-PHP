<?php
    session_start();
    require_once "connection.inc.php";
    include "a.inc.php";

    class VerrifyErrors extends DbQuery
    {
        private string $username;
        private string $email;
        private string $password;
        private array $errors;

        public function __construct(string $username, string $email, string $password)
        {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        private function IsInputEmpty(string $username, string $email, string $password) : bool 
        {
            if(empty($username) || empty($email) || empty($password)) 
            {
                return true;
            } else 
            {
                return false;
            }
        }

        private function IsEmailTaken($pdo) {
            return $this->GetQuery($pdo);
        }
    }


    