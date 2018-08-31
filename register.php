<?php
/**
 * register.php
 * @author Fabian Huber
 * 30.08.2018
 * Registration page
 */

require_once 'model/users.php';
require_once 'model/flashMessage.php';

$errors = array();

if (filter_has_var(INPUT_POST, "submit")) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $passwordValidation = filter_input(INPUT_POST, 'passwordValidation', FILTER_SANITIZE_STRING);

    if ($password != $passwordValidation) {
        $errors["register"]["password"] = "Le mot de passe et sa validation de sont pas identiques";
    }
    if (strlen($name) > 50) {
        $errors["register"]["name"] = "Le prenom ne doit pas depasser 50 caractere";
    }
    if (strlen($username) > 50) {
        $errors["register"]["username"] = "Le pseudo ne doit pas depasser 50 caractere";
    }
    if (strlen($surname) > 50) {
        $errors["register"]["surname"] = "Le nom ne doit pas depasser 50 caractere";
    }
    if(empty($errors["register"])){
        if(addUser($surname, $name, $username, $password)){
            SetMessageFlash("Vous etes bien inscrits");
            header("location:index.php");
            exit;
        }
        else{
            $errors["register"]["name"] = "Le prenom ne doit pas depasser 50 caractere";
        }
    }
    
}

include 'views/registerForm.php';
