<?php
require_once "../connection.inc.php";// Call the conection archive

class SignupUser
{
    private string $username;//Username propertie
    private string $email;//Email proppertie
    private string $password;//Password proppertie

    public function __construct(string $username, string $email, string $password)//Initializes the object with user-provided data.
    {
        $this->username = $username;//Propertie recive data from user
        $this->email = $email;
        $this->password = $password;
    }

    private function HashPw() : string //Generates a secure password hash
    {
        $options = ['cost' => 12];//Level up the value to difficult the brute force

        return password_hash($this->password, PASSWORD_DEFAULT, $options);//Return the hashed pw for later use
    }

    private function PushToDB(object $pdo, string $username, string $email, string $pw)//Inserts user data into the database.
    {
        $query = "INSERT INTO users (username, email, password) VALUE (:username, :email, :password)";//Save the SQL query into a propertie

        $stmt = $pdo->prepare($query);//Prepare the query
        $stmt->bindParam(":username", $username);//Use the properties to fill the placeholders of the query
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $pw);//Here we use the hashed PW

        $stmt->execute();//Execute the query inside the SQL
    }

    public function SaveToDB(object $pdo)//Public call to the 'PushToDB' method for more secure
    {
        $this->PushToDB($pdo, $this->username, $this->email, $this->HashPw());//Properties use as parameters
    }
}

$test = new SignupUser("João", "joo@gmail.com", "1234");
$test->SaveToDB($pdo);