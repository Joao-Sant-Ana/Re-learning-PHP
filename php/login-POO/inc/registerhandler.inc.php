<?php
    session_start();
    require_once "connection.inc.php";
    include "a.inc.php";

    class VerrifyErrors extends DbQuery
    {
        private string $username;
        private string $email;
        private string $password;
        private object $pdo;
        private array $errors;

        public function __construct(object $pdo, string $username, string $email, string $password)
        {
            $this->pdo = $pdo;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        private function IsInputEmpty(string $username, string $email, string $password) : bool 
        {
            if(empty($username) || empty($email) || empty($password)) {
                return true;
            } else {
                return false;
            }
        }

        private function isEmailInvalid(string $email) : bool
        {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                return true;
            } else {
                return false;
            }
        }

        private function IsEmailTaken(object $pdo, string $email) : bool
        {
            $dbemail = $this->GetQuery($pdo);
            for($i = 0; $i < count($dbemail); $i++) {
                if ($dbemail[$i]["email"] == $email) {
                    return true;
                }
            }
            return false;
        }

        //ERROR HANDLERS
        public function VerifyErrors() 
        {
            if ($this->IsInputEmpty($this->username, $this->email, $this->password)) {
                $this->errors["empty"] = "Empty fields";
            } else if ($this->isEmailInvalid($this->email)) {
                $this->errors["invalid"] = "Invalid type";
            } else if ($this->IsEmailTaken($this->pdo, $this->email)) {
                $this->errors["taken"] = "Invalid data";
            } else {
                $_GET["succes"] = "succes";
            }
        }

        public function getErrors() : array 
        {
            return $this->errors;
        }
    }


    