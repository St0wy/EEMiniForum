<?php
/**
 * model\user.php
 * @author Fabian Huber
 * 31.08.2018
 * fonctions de gestions de la table users
 */

require_once 'dbconnection.php';

/**
 * récupère tous les enregistrements de la table usersA
 * Les données à récupérer sont l'id, le nom, le prénom, le pseudo, la date d'enregistrement et le statut admin
 * @return array tableau contenant les enregistrements
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
 * retourne les données de l'enregistrement idUser
 * Les données à récupérer sont l'id, le nom, le prénom, le pseudo, la date d'enregistrement et le statut admin
 * @param int $idUser ID de l'utilsateur dont on veut le détail
 * @return array|NULL
 */
function getUser($idUser)
{
    $db = connectDb();
    $sql = "SELECT idUser, login, name, surname FROM users WHERE idUser = :idUser";
    $request = $db->prepare($sql);
    $request->execute(array('idUser' => $idUser));

    return $request->fetch();
}

/**
 * Vérifie si les données passée en paramètres correspondent à un utilisateur ou non
 * @param string $pseudo Le pseudo à vérifier
 * @param string $pwd Le mot de passe à vérifier
 * @return mixed Soit un tableau avec le profil de l'utilisateur,
 *               Soit false si l'identification n'a pas pu être vérifiée
 */
function checkUserIdentification($login, $password)
{
    $db = connectDb();
    $sql = "SELECT login, password FROM users WHERE login = :login AND password = :password";

    $request = $db->prepare($sql);
    if ($request->execute(array(
        'login' => $login,
        'password' => sha1($password)))) {
        $result = $request->fetch(PDO::FETCH_ASSOC);
        return $result;
    } else {
        return null;
    }
}