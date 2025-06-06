<?php

ini_set('session.use_only_cookies', 1); // set to true
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start(); 

if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regeneration"])) { // isset function checks if session exists inside webpage
        regenerate_session_id_loggedin(); // call function regenerate session
    } else {
        $interval = 60 * 30; // set time to 30 mins
        if (time() - $_SESSION["last_regeneration"] >= $interval) { // time minus last_generation greater than equal interval
            regenerate_session_id_loggedin();
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id(); 
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id(); 
        }
    }
}

function regenerate_session_id_loggedin() 
{ // function to renew session
    session_regenerate_id(true); // renew session ID

    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);
        
    $_SESSION["last_regeneration"] = time();
}

function regenerate_session_id() {
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}