<?php
/**
 * Page to register.
 * php\register.php
 *
 * PHP Version 7.2.10
 *
 * @category File
 * @package  File
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://127.0.0.1/MiniForum/public/php/regiser.php
 */

require_once 'model/users.php';
require_once 'model/flashMessage.php';

$errors = array();
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

if (filter_has_var(INPUT_POST, "submit")) {
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $passwordValidation = filter_input(
        INPUT_POST, 
        'passwordValidation', 
        FILTER_SANITIZE_STRING
    );

    if ($password != $passwordValidation) {
        $errors["register"]["password"] = "Le mot de passe et sa validation " . 
        "de sont pas identiques.";
    }
    if (strlen($name) <= 0) {
        $errors["register"]["name"] = "Vous devez donner un prenom.";
        $name = "";
    } else if (strlen($name) > 50) {
        $errors["register"]["name"] = "Le prenom ne doit pas depasser 50 caractere.";
        $name = "";
    }
    if (strlen($username) <= 0) {
        $errors["register"]["username"] = "Vous devez donner un identifiant.";
        $username = "";
    } else if (strlen($username) > 50) {
        $errors["register"]["username"] = "Le pseudo ne doit pas depasser 50 " . 
        "caractere.";
        $username = "";
    }
    if (strlen($surname) <= 0) {
        $errors["register"]["surname"] = "Vous devez donner un nom.";
        $surname = "";
    } else if (strlen($surname) > 50) {
        $errors["register"]["surname"] = "Le nom ne doit pas depasser 50 caractere.";
        $surname = "";
    }
    if (empty($errors["register"])) {
        if (empty(addUser($surname, $name, $username, $password))) {
            $errors["register"]["sql"] = "Probleme avec l'enregistrement de " . 
            "l'utilisateur.";
        } else {
            SetMessageFlash("Vous etes bien inscrits");
            header("location:index.php");
            exit;
        }
    }

}

require 'views/registerForm.php';
