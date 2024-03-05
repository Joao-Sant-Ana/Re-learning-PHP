<?php
    class LoginUser
    {
        private string $username;
        private string $password;
        private string $email;

        function __construct(string $username, string $password, string $email)
        {
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->hashpw();
        }

        private function hashpw() 
        {
            
        }
    }