<?php
/**
 * Index and login form.
 * php\index.php
 *
 * PHP Version 7.2.10
 *
 * @category File
 * @package  File
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://127.0.0.1/MiniForum/public/php/index.php
 */

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'model/users.php';

$errors = array();

if (filter_has_var(INPUT_POST, "submit")) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (checkUserIdentification($username, $password)) {
        $errors["login"] = 'Identification ou mot de passe invalide';
    } else {
        $_SESSION["user"]["username"] = $username;
        header("location:confirmation.php");
        exit;
    }
}

require 'views/loginForm.php';
