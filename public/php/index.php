<?php
/**
 * index.php
 * @author Fabian Huber
 * 30.08.2018
 * Connection page
 */

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'model/users.php';

$errors = array();

if (filter_has_var(INPUT_POST, "submit")) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	
	$result = checkUserIdentification($username, $password);
    if (empty($result)) {
		$errors['login'] = 'Identification ou mot de passe invalide';
    } else {
        $_SESSION['user'] = $result;
        header("location:confirmation.php");
        exit;
    }
}

include 'views/loginForm.php';
