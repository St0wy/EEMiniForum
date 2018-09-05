<?php
/**
 * php\views\editForm.php
 * @author Fabian Huber
 * 05.09.2018
 * form to edit news
 */

$pageTitle = "Mise a jour d'une nouvelle";
include "views/header.php";
?>
<form class="" action=".\editNews.php" method="post">
	<fieldset>
	<legend>Donnees du post</legend>
		<label for="title">Titre:</label><br>
		<input type="text" name="title" id="title" value="<?php echo $news["title"]; ?>"><br>
		<label for="password">Description:</label><br>
		<textarea name="description" id="description" value="<?php echo $news["description"]; ?>"></textarea><br>
		<button type="submit" value="edit" name="">Modifier</button>
        <input type="hidden" name="idNews" value="<?php echo $idNews; ?>">
	</fieldset>
</form>
<?php 
include "views/footer.php";
?>