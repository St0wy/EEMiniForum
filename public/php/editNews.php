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

    
}

if ($action === "edit") {
    include "views/editForm.php";
} else if ($action === "delete") {
    include "views/deleteForm.php";
} else {
    echo "Error";
}
