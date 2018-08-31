<?php
/**
 * confirmation.php
 * @author Fabian Huber
 * 30.08.2018
 * Confirm the connection
 */
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'model/users.php';

$name = $_SESSION["user"]["name"]; 

include "views\confirmationPage.php";