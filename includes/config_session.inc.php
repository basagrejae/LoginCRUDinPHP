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

if (!isset($_SESSION["last_generation"])) { // isset function checks if session exists inside webpage
    session_regenerate_id();
    $_SESSION["last_generation"] = time();
} else {
    $interval = 60 * 30; // set time to 30 mins
    if (time() - $_SESSION["last_generation"] >= $interval) { // time minus last_generation greater than equal interval
        session_regenerate_id(); // renew session ID
        $_SESSION["last_generation"] = time();
    }
}