<?php
/**
 * public\php\logout
 * @author Fabian Huber
 * 03.09.2018
 * Disconnect user
 */

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'model/flashMessage.php';

$_SESSION["user"] = null;

SetMessageFlash('Au revoir, vous êtes déconnecté');
header("Location:index.php");
exit;