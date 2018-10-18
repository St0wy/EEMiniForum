<?php
/**
 * Disconnect the user.
 * php\confirmation.php
 *
 * PHP Version 7.2.10
 *
 * @category File
 * @package  File
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://127.0.0.1/MiniForum/public/php/logout.php
 */

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'model/flashMessage.php';

$_SESSION["user"] = null;

SetMessageFlash('Au revoir, vous êtes déconnecté');
header("Location:index.php");
exit;