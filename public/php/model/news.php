<?php
/**
 * Fonctions de gestions de la table news
 * php\model\news.php
 *
 * PHP Version 7.2.10
 *
 * @category File
 * @package  File
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://127.0.0.1/MiniForum/public/php
 */

require_once 'dbconnection.php';

/**
 * Save the post into the db
 *
 * @param mixed $title       Title of the post.
 * @param mixed $description Description of the post.
 * @param mixed $idUser      Id of the user that posted the post.
 *
 * @return void
 */
function savePost($title, $description, $idUser)
{
    try {
        $db = connectDb();
        $sql = "INSERT INTO news (title, description, idUser)" .
            " VALUES (:title, :description, :idUser)";
        $request = $db->prepare($sql);
        $arrayToExecute = array(
            'title' => $title,
            'description' => $description,
            'idUser' => $idUser,
        );

        if ($request->execute($arrayToExecute)) {
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

/**
 * Get all the posts.
 *
 * @return mixed Array of the posts or null.
 */
function getPosts()
{
    try {
        $db = connectDb();
        $sql = "SELECT idNews, title, description, idUser, creationDate," .
            "lastEditDate FROM news";

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

/**
 * Get the post via his id.
 *
 * @param mixed $idNews Id of the news to get.
 *
 * @return void
 */
function getPostFromId($idNews)
{
    try {
        $db = connectDb();
        $sql = "SELECT idNews, title, description, idUser, creationDate, " .
            "lastEditDate FROM news WHERE idNews = :idNews";
        $request = $db->prepare($sql);
        if ($request->execute(array("idNews" => $idNews))) {
            $result = $request->fetch(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return null;
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
        return null;
    }
}

/**
 * Update the post with the given title and description.
 *
 * @param mixed $idNews      Id of the news to update.
 * @param mixed $title       New title of the post.
 * @param mixed $description New description of the post.
 *
 * @return void
 */
function updatePost($idNews, $title, $description)
{
    try {
        $db = connectDb();
        $sql = "UPDATE news SET title = :title, description = :description, " .
            "lastEditDate = :lastEditDate WHERE idNews = :idNews";
        $request = $db->prepare($sql);
        $arrayToExecute = array(
            "title" => $title,
            "description" => $description,
            "lastEditDate" => date('Y-m-d H:i:s', time()),
            "idNews" => $idNews,
        );
        if ($request->execute($arrayToExecute)) {
            //return $request->fetchAll(PDO::FETCH_ASSOC);
            return true;
        } else {
            return null;
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
        return null;
    }
}

/**
 * Delete the a post.
 *
 * @param mixed $idNews Id of the post you want to delete.
 *
 * @return void
 */
function deletePost($idNews)
{
    try {
        $db = connectDb();
        $sql = "DELETE FROM news WHERE idNews = :idNews";
        $request = $db->prepare($sql);
        $arrayToExecute = array("idNews" => $idNews);
        if ($request->execute($arrayToExecute)) {
            //return $request->fetchAll(PDO::FETCH_ASSOC);
            return true;
        } else {
            return null;
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
        return null;
    }
}
