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

function getPost($idUser)
{
    try {
        $db = connectDb();
        $sql = "SELECT idNews, title, description FROM news WHERE idUser = :idUser";
        $request = $db->prepare($sql);
        if ($request->execute(array('idUser' => $idUser))) {
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
