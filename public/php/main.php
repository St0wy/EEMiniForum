<?php
/**
 * index.php
 * @author Fabian Huber
 * 03.09.2018
 * Main page of the site
 */

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once 'model/news.php';
require_once 'model/flashMessage.php';

if (filter_has_var(INPUT_POST, "disconnect")) {
    header("Location:logout.php");
    exit;
}

if (filter_has_var(INPUT_POST, "submit")) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $user = $_SESSION["user"];

    if (empty($title)) {
        $errors["news"]["title"] = "Votre titre ne doit pas etre vide.";
    } else if (strlen($title) > 50) {
        $errors["news"]["title"] = "Votre titre ne doit pas depasser 50 caracteres.";
    }
    if (empty($description)) {
        $errors["news"]["description"] = "Votre description ne doit pas etre vide";
    } else if (strlen($description) > 250) {
        $errors["news"]["description"] = "Votre description ne doit pas depasser 250 caracteres.";
    }

    if (empty($errors["news"])) {
        if (empty(savePost($title, $description, $_SESSION["user"]["idUser"]))) {
            $errors["news"]["sql"] = "Probleme avec la publication du post.";
        } else {
            SetMessageFlash("Le post a bien ete ajoute");
        }

    }
}

include 'views/newsForm.php';
