<?php
    require_once "../core/connection.inc.php";
    require_once "../model/pushuser.inc.php";
    require_once "../model/query.inc.php";

    class VerifyErrors extends DbQuery
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
            $this->errors = [];
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

        private function IsUsernameTaken(object $pdo, string $username) : bool 
        {
            $dbusername = $this->GetQuery($pdo);
            for($i = 0; $i < count($dbusername); $i++) {
                if ($dbusername[$i]["username"] == $username) {
                    return true;
                }
            }
            return false;
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
        public function SearchForErrors() 
        {
            $hasErrors = false;
            if ($this->IsInputEmpty($this->username, $this->email, $this->password)) {
                $this->errors["empty"] = "Empty fields";
                $hasErrors = true;
            }

            if ($this->isEmailInvalid($this->email)) {
                $this->errors["invalid"] = "Invalid type";
                $hasErrors = true;
            } 

            if ($this->IsUsernameTaken($this->pdo, $this->username)) {
                $this->errors["taken"] = "Invalid data";
                $hasErrors = true;
            }
            
            if ($this->IsEmailTaken($this->pdo, $this->email)) {
                $this->errors["taken"] = "Invalid data";
                $hasErrors = true;
            }
            
            return $hasErrors;
        }

        public function getErrors() : array 
        {
            return $this->errors;
        }

        //Insert User
        public function InsertUser() 
        {
            if($this->getErrors() == []) {
                $pushUser = new UserCreator($this->username, $this->email, $this->password);
                $pushUser->SaveToDB($this->pdo);
            } else {
                var_dump($this->getErrors());
            }
 
        }
    }

    $test = new VerifyErrors($pdo, "Poi", "poi@gmail.com", "1234");
    $test->InsertUser();
