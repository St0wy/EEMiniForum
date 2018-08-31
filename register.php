<?php
/**
 * register.php
 * @author Fabian Huber
 * 30.08.2018
 * Register users      
 */
session_start();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$passwordValidation = filter_input(INPUT_POST, 'passwordValidation', FILTER_SANITIZE_STRING);

if (filter_has_var(INPUT_POST, "submit")) {
    if($password == $passwordValidation){
        $user = array('name' => $name, "surname" => $surname, 'username' => $username, 'password' => $password, 'passwordValidation' => $Validation, );
        array_push($_SESSION["users"], $user);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Page Title</title>
	<meta charset="utf-8">
</head>
<body>

	<form class="" action="register.php" method="post">
		<fieldset>
			<legend>Connexion</legend>

			<label for="name">Prénom:</label><br>
			<input type="text" name="name" id="name"><br>
			<label for="surname">Nom:</label><br>
			<input type="text" name="surname" id="surname"><br>
            <label for="username">Pseudo:</label><br>
			<input type="text" name="username" id="username"><br>
            <label for="password">Mot de Passe:</label><br>
			<input type="text" name="password" id="password"><br>
            <label for="passwordValidation">Validation du Mot de Passe:</label><br>
			<input type="text" name="passwordValidation" id="passwordValidation"><br>

			<input type="submit" name="submit" >
		</fieldset>
	</form>

	<a href="./inscription">Pas encore inscrit?</a>

</body>
</html>