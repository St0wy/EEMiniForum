<?php
/**
 * Page to register.
 * php\main.php
 *
 * PHP Version 7.2.10
 *
 * @category File
 * @package  File
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://127.0.0.1/MiniForum/public/php/main.php
 */

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once 'model/news.php';
require_once 'model/users.php';
require_once 'model/flashMessage.php';

if (filter_has_var(INPUT_POST, "disconnect")) {
    header("Location:logout.php");
    exit;
}

if (filter_has_var(INPUT_POST, "submit")) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $login = $_SESSION["user"]["username"];
    $user = GetUserFromLogin($login);

    if (empty($title)) {
        $errors["news"]["title"] = "Votre titre ne doit pas etre vide.";
    } else if (strlen($title) > 50) {
        $errors["news"]["title"] = "Votre titre ne doit pas depasser 50 caracteres.";
    }
    if (empty($description)) {
        $errors["news"]["description"] = "Votre description ne doit pas etre vide";
    } else if (strlen($description) > 250) {
        $errors["news"]["description"] = "Votre description ne doit pas depasser" . 
        " 250 caracteres.";
    }

    if (empty($errors["news"])) {
        if (empty(savePost($title, $description, $_SESSION["user"]["idUser"]))) {
            $errors["news"]["sql"] = "Probleme avec la publication du post.";
        } else {
            SetMessageFlash("Le post a bien ete ajoute");
        }
    }
}

require 'views/newsForm.php';
