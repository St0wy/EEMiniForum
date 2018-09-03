<?php
/**
 * views\registerForm.php
 * @author Fabian Huber
 * 31.08.2018
 * Form to register
 */

$pageTitle = "Inscription";
include "header.php";
?>
<form class="" action="register.php" method="post">
	<fieldset>
		<legend>Connexion</legend>
		<?php
if (isset($errors["register"])) {
    foreach ($errors["register"] as $value) {
        ?><p class="error"><?php echo $value; ?></p><?php
	}
}
?>
		<label for="name">Prénom:</label><br>
		<input type="text" name="name" id="name" value="<?php echo $name; ?>"><br>
		<label for="surname">Nom:</label><br>
		<input type="text" name="surname" id="surname" value="<?php echo $surname; ?>"><br>
        <label for="username">Pseudo:</label><br>
		<input type="text" name="username" id="username" value="<?php echo $username; ?>"><br>
        <label for="password">Mot de Passe:</label><br>
		<input type="password" name="password" id="password"><br>
        <label for="passwordValidation">Validation du Mot de Passe:</label><br>
		<input type="password" name="passwordValidation" id="passwordValidation"><br>
		<input type="submit" name="submit" >
	</fieldset>
</form>
<?php
include "footer.php";