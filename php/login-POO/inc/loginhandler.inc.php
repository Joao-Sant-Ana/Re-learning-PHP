<?php
    session_start();
    require_once "../inc/connection.inc.php";

    function teste(object $pdo) {
        $query = "SELECT username FROM users WHERE id = 6";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['result'] = $result;

        shownames($_SESSION['result']);
    }

    function shownames($result) {
        for($i = 0; $i < count($result); $i++) {
            echo $result[$i]["username"] . "<br>";
        }  
    }

    teste($pdo);




