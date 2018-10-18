<?php
/**
 * Confirmation page that you see if you're successfully connected.
 * php\confirmation.php
 *
 * PHP Version 7.2.10
 *
 * @category File
 * @package  File
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://127.0.0.1/MiniForum/public/php/confirmation.php
 */

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'model/users.php';

$name = $_SESSION["user"]["name"]; 

require "views\confirmationPage.php";