<?php
/**
 * index.php
 * @author Fabian Huber
 * 30.08.2018
 * Connection page
 */
session_start();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$error = false;

if (filter_has_var(INPUT_POST, "submit")) {
	//TODO iteration dans tous les users
    if ($username == $_SESSION["users"]["username"] && $password == $_SESSION["users"]["password"]) {
		$_SESSION["username"] = $username;
		header("Location: confirmation.php");
		exit;
    } else {
        $error = true;
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

	<form class="" action="index.php" method="post">
		<fieldset>
			<legend>Connexion</legend>

			<label for="username">Identifiant:</label><br>
			<input type="text" name="username" id="username"><br>
			<label for="password">Mot de passe:</label><br>
			<input type="text" name="password" id="password"><br>


			<input type="submit" name="submit" >
		</fieldset>
	</form>
	<?php
if ($error) {
    ?>
		<p> Cefo </p>
		<?php
}
if (isset($_SESSION["username"])) {
    ?>
		<p>t'es co</p>
		<?php
}
?>

	<a href="./register.php">Pas encore inscrit?</a>

</body>
</html>
