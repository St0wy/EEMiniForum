<?php
/**
 * confirmation.php
 * @author Fabian Huber
 * 30.08.2018
 * Confirm the connection
 */
session_start();

$name = $_SESSION["name"]; //TODO changer ça
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>BRAVO</h1>
    <p><?php echo $name; ?>, tu es connecté!</p>
</body>
</html>