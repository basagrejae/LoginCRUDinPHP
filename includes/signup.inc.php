<?php

if ($_SERVER["REQUEST_METHOD" === "POST"]) {
    
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_controller.inc.php';

        // Error handlers
        if (is_input_empty($username, $pwd, $email)) {
            
        }
        if (is_email_invalid($email)) {
            
        }
        // if () {

        // }

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}