<?php
/**
 * views\loginform.php
 * @author Fabian Huber
 * 31.08.2018
 * Formulaire de connexion du site
 */

$pageTitle = "Identification";
include "views/header.php";
?>

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
    <?php
include "views/footer.php";
?>