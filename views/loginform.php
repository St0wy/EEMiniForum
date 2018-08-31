<?php
/**
 * views\loginform.php
 * @author Fabian Huber
 * 31.08.2018
 * Formulaire de connexion du site
 */

$pageTitle = "Identification";
include "views/header.php";
require_once 'model/flashMessage.php';

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
if (isset($errors["login"])) {
    ?>
		<p class="error"> <?php echo $errors["login"]; ?> </p>
		<?php
}
?>
	<p><?php echo GetMessageFlash(); ?></p>
	<a href="./register.php">Pas encore inscrit?</a>
    <?php
include "views/footer.php";
?>