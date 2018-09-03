<?php
/**
 * model\dbconnection.php
 * @author Fabian Huber
 * 31.08.2018
 * contient la fonctions et les donnees de connexion à la base de donnees
 */

/**
 * effectue la connexion à la base de données
 * @return PDO objet de connexion à la base de données
 */
function connectDb()
{
    $server = '127.0.0.1';
    $pseudo = 'adminForum';
    $pwd = '123';
    $dbname = 'miniforum';

    static $db = null;

    if ($db === null) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $db = new PDO("mysql:host=$server;dbname=$dbname", $pseudo, $pwd, $pdo_options);
        $db->exec('SET CHARACTER SET utf8');
    }
    return $db;

}
