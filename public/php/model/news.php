<?php
/**
 * php\model\news.php
 * @author Fabian Huber
 * 03.09.2018
 * fonctions de gestions de la table news
 */

require_once 'dbconnection.php';

function savePost($title, $description, $idUser)
{
    try {
        $db = connectDb();
        $sql = "INSERT INTO news (title, description, idUser) VALUES (:title, :description, :idUser)";
        $request = $db->prepare($sql);
        if ($request->execute(array(
            'title' => $title,
            'description' => $description,
            'idUser' => $idUser))) {
            return $db->lastInsertId();
        } else {
            return null;
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
        return null;
    }

    return $request->fetch();
}

function GetPosts()
{
    try {
        $db = connectDb();
        $sql = "SELECT idNews, title, description, idUser, creationDate, lastEditDate FROM news";
        $request = $db->prepare($sql);
        if ($request->execute()) {
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return null;
        }
    } catch (Exeption $e) {

        echo $e->getMessage();
        return null;
    }
}

function GetPostFromId($idNews)
{
    try {
        $db = connectDb();
        $sql = "SELECT idNews, title, description, idUser, creationDate, lastEditDate FROM news WHERE idNews = :idNews";
        $request = $db->prepare($sql);
        if ($request->execute(array("idNews" => $idNews))) {
            $result = $request->fetchAll(PDO::FETCH_ASSOC)[0];
            return $result;
        } else {
            return null;
        }
    } 
    catch (Exeption $e) {
        echo $e->getMessage();
        return null;
    }
}

function UpdatePost($idNews, $title, $description)
{
    try {
        $db = connectDb();
        $sql = "UPDATE news SET title = :title, description = :description, lastEditDate = :lastEditDate WHERE idNews = :idNews";
        $request = $db->prepare($sql);
        if ($request->execute(array(
            "title" => $title,
            "description" => $description,
            "lastEditDate" => strtotime("now"),
            "idNews" => $idNews))) {
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return null;
        }
    } catch (Exeption $e) {

        echo $e->getMessage();
        return null;
    }
}
