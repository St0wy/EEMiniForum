<?php
/**
 * php\views\newsForm.php
 * @author Fabian Huber
 * 03.09.2018
 * Form for the news
 */

$user = $_SESSION["user"];

$pageTitle = "News";
include "views/header.php";
require_once 'model/flashMessage.php';
require_once 'model/users.php';

?>
<h1>Bonjour <?php echo $user["name"] . " " . $user["surname"]; ?>, voici votre fil d'actualités!</h1>
<?php
if (isset($errors["news"])) {
    foreach ($errors["news"] as $value) {
        ?><p class="error"><?php echo $value; ?></p><?php
}
}
?>
<p><?php echo GetMessageFlash(); ?></p>
<form class="" action=".\main.php" method="post">
	<fieldset>
	<legend>Nouveau post</legend>
		<label for="title">Titre:</label><br>
		<input type="text" name="title" id="title"><br>
		<label for="password">Description:</label><br>
		<textarea name="description" id="description"></textarea><br>
		<input type="submit" name="submit" >
	</fieldset>
	<button type="submit" value="disconnect" name="submit">Deconnection</button>
</form>

<?php
$posts = GetPosts();

foreach ($posts as $post) {
    $user = GetUserFromId($post["idUser"]);
    ?>
	<p>Auteur: <?php echo $user["name"] . " " . $user["surname"]; ?></p>
	<p>
		Posté le <?php echo date("d.m.o", strtotime($post["creationDate"])); ?> a <?php echo date("G:i", strtotime($post["creationDate"])); ?>.
		Derniere modification le <?php echo date("d.m.o", strtotime($post["lastEditDate"])); ?> a <?php echo date("H:i", strtotime($post["lastEditDate"])); ?>
	</p>
	<h1><?php echo $post["title"]; ?></h1>
	<p><?php echo $post["description"]; ?></p>
	<?php
if ($user["idUser"] == $post["idUser"]) {
        ?>
	<a href="editNews.php?idNews=<?php echo $post["idNews"]; ?>&action=edit">Modifier</a>
	<a href="editNews.php?idNews=<?php echo $post["idNews"]; ?>&action=delete">Supprimer</a>
	<?php
}
}

include "views/footer.php";
?>