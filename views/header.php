<?php
/**
 * views\header.php
 * @author Fabian Huber
 * 31.08.2018
 * header de la page
 */

if (empty($pageTitle)) {
    $pageTitle = "Sans Titre";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?=$pageTitle?></title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css\style.css">
    </head>
    <body>
            <header>
                <h1>Forum</h1>
            </header>