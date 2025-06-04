<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd, string $email) // create a function with parameters
{ 
    if (empty($username) || empty($pwd) || empty($email)) { // check if $username or $pwd or $email is empty
        return true; // return true
    }
    else {
        return false; // or else return false
    }
}

function is_email_invalid(string $email) 
{ 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // function to check if email is valid
        return true; // return true
    } else {
        return false; // or else return false
    }
}

function is_username_taken(object $pdo ,string $username) // function to check if username is already registered
{ 
    if (get_username($pdo,  $username)) { 
        return true; // return true
    } else {
        return false; // or else return false
    }
}

function is_email_registered(object $pdo ,string $username) // function to check if email is registered
{ 
    if (get_email($pdo,  $email)) { 
        return true; // return true
    } else {
        return false; // or else return false
    }
}

function create_user(object $pdo, string $pwd, string $username, string $email)
{ 
    set_user($pdo, $pwd, $username, $email);
}