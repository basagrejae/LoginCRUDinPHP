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

// function is_username_taken(string $username) 
// { 
//     if () { 
//         return true; // return true
//     } else {
//         return false; // or else return false
//     }
// }