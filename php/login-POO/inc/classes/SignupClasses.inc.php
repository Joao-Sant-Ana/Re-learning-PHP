<?php
require_once "../connection.inc.php";

class SignupUser
{
    private string $username;
    private string $email;
    private string $password;

    public function __construct(string $username, string $email, string $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    private function HashPw() : string
    {
        $options = ['cost' => 12];

        return password_hash($this->password, PASSWORD_DEFAULT, $options);
    }

    private function PushToDB(object $pdo, string $username, string $email, string $pw)
    {
        $query = "INSERT INTO users (username, email, password) VALUE (:username, :email, :password)";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $pw);

        $stmt->execute();
    }

    public function CallIt(object $pdo)
    {
        $this->PushToDB($pdo, $this->username, $this->email, $this->HashPw());
    }
}

$test = new SignupUser("João", "joo@gmail.com", "1234");
$test->CallIt($pdo);