<?php
/**
 * views\newsForm.php
 * @author Fabian Huber
 * 03.09.2018
 * Form for the news
 */

$user = $_SESSION["user"];

$pageTitle = "News";
include "views/header.php";
?>
<h1>Bonjour <?php echo $user["name"] . " " . $user["surname"]; ?>, voici votre fil d'actualités!</h1>
<form class="" action=".\main.php" method="post">
	<fieldset>
	<legend>Nouveau post</legend>
		<label for="title">Titre:</label><br>
		<input type="text" name="title" id="title"><br>
		<label for="password">Description:</label><br>
		<textarea name="description" id="description"></textarea><br>
		<input type="submit" name="submit" >
	</fieldset>
	<button type="submit" value="disconnect">Deconnection</button>
</form>
<?php
include "views/footer.php";
?>