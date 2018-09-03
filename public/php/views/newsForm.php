<?php
/**
 * views\newsForm.php
 * @author Fabian Huber
 * 03.09.2018
 * Form for the news
 */

$pageTitle = "News";
include "views/header.php";
?>
<h1>Bonjour [nom prenom], voici votre fil d'actualités!</h1>
<form class="" action="index.php" method="post">
	<fieldset>
		<legend>Nouveau post</legend>
		<label for="title">Titre:</label><br>
		<input type="text" name="title" id="title"><br>
		<label for="password">Mot de passe:</label><br>
		<textarea name="password" id="password"><br>
		<input type="submit" name="submit" >
	</fieldset>
</form>
<?php
include "views/footer.php";
?>