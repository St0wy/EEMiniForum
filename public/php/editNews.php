<?php
/**
 * php\editNews.php
 * @author Fabian Huber
 * 05.09.2018
 * Edit and delete page for the news
 */

 if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'model/news.php';
require_once 'model/flashMessage.php';

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idNews = filter_input(INPUT_GET, 'idNews', FILTER_VALIDATE_INT);
$news = GetPostFromId($idNews);
$user = $_SESSION["user"];

if($user["idUser"] !== $news["idUser"]){
    header("Location:main.php");
    exit;
}

if(filter_has_var(INPUT_POST, "edit")){
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    if(empty($title)){
        $errors["title"] = "Votre titre ne doit pas etre vide.";
    }
    else if(strlen($title)>50){
        $errors["title"] = "Votre titre ne doit pas depasser 50 caracteres";
    }
    if(empty($description)){
        $errors["description"] = "Votre description ne doit pas etre vide.";
    }
    else if(strlen($description)>250){
        $errors["description"] = "Votre description ne doit pas depasser 250 caracteres";
    }
    if(empty($errors)){
        if(UpdatePost($idNews, $news["title"], $news["description"])){
            SetMessageFlash("Votre message a bien ete edite.");
            header("Location:main.php");
            exit;
        }else{
            $errors["sql"] = "Erreure pendant la sauvegarde";
        }
        
    }
}

if ($action === "edit") {
    include "views/editForm.php";
} else if ($action === "delete") {
    include "views/deleteForm.php";
} else {
    echo "Error";
}
