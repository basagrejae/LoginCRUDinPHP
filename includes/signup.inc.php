<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_controller.inc.php';

        // Error handlers
        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($pdo , $username)) {
            $errors["username_taken"] = "Yung Username mo nagamit na bobo! Gumamit ka ng iba!";
        }
        if (is_email_registered($pdo , $email)) {
            $errors["email_used"] = "Yung Email mo nagamit nadin bobo! Gumamit ka ng iba";
        }

        require_once 'config_session.inc.php'; // run a session

        if ($errors) {
            $_SESSION["errors_signup"] = $errors; // assign session variable to value stored inside session
            
            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;
            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $pwd, $username, $email);

        header("Location: ../index.php?signup=sucess");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}