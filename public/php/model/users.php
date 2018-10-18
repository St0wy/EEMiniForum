<?php
/**
 * Fonctions de gestions de la table users.
 * php\model\users.php
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
 * Get all the users.
 *
 * @return void
 */
function getUsers()
{
    $db = connectDb();
    $sql = "SELECT idUser, login, name, surname FROM users";
    $request = $db->prepare($sql);
    $request->execute();

    return $request->fetchAll();
}

/**
 * Get the user with the good login.
 *
 * @param mixed $login Login of the user.
 *
 * @return void
 */
function getUserFromLogin($login)
{
    $db = connectDb();
    $sql = "SELECT idUser, login, name, surname FROM users WHERE login = :login";
    $request = $db->prepare($sql);
    $request->execute(array('login' => $login));

    return $request->fetch();
}

/**
 * Get the user with the good id.
 *
 * @param mixed $idUser Id of the user you want to get.
 *
 * @return void
 */
function getUserFromId($idUser)
{
    $db = connectDb();
    $sql = "SELECT idUser, login, name, surname FROM users WHERE idUser = :idUser";
    $request = $db->prepare($sql);
    $request->execute(array('idUser' => $idUser));

    return $request->fetch();
}

/**
 * Add the user to the table.
 *
 * @param mixed $surname  Surname of the new user.
 * @param mixed $name     Name of the new user.
 * @param mixed $login    Login of the new user.
 * @param mixed $password Password of the new user.
 *
 * @return void
 */
function addUser($surname, $name, $login, $password)
{
    if (!userExist($login)) {
        try {
            $db = connectDb();
            $sql = "INSERT INTO users (surname, name, login, password) " . 
            "VALUES (:surname, :name, :login, :password)";
            $request = $db->prepare($sql);
            if ($request->execute(
                array(
                    'surname' => $surname,
                    'name' => $name,
                    'login' => $login,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                )
            )
            ) {
                return $db->lastInsertId();
            } else {
                return null;
            }
        } catch (Exeption $e) {
            echo $e->getMessage();
            return null;
        }
    }

    return $request->fetch();
}

/**
 * Check if the user exist.
 *
 * @param mixed $login Login of the user you want to check existence.
 *
 * @return void
 */
function userExist($login)
{
    try {
        $db = connectDb();
        $sql = "SELECT login FROM users WHERE login = :login";
        $request = $db->prepare($sql);
        if ($request->execute(array('login' => $login))) {
            $result = $request->fetch(PDO::FETCH_ASSOC);
            if (isset($result['login'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
        return false;
    }
}

/**
 * Check if the user typed the good login and password
 *
 * @param mixed $login    Login of the user.
 * @param mixed $password Password of the user.
 *
 * @return void
 */
function checkUserIdentification($login, $password)
{
    $logged = false;
    $db = connectDb();
    $sqlPassword = "SELECT password FROM users WHERE login = :login";
    $request = $db->prepare($sqlPassword);
    $arrayToExecute = array('login' => $login);
    if ($request->execute($arrayToExecute)) {
        $hashedPassword = $request->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $hashedPassword)) {
            $logged = true;
        } else {
            $logged = false;
        }
    } else {
        $logged = false;
    }

    return $logged;
}
