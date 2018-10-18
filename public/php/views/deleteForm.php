<?php
/**
 * php\views\deleteForm.php
 * @author Fabian Huber
 * 18.10.2018
 * form to delete news
 */

require_once 'model/flashMessage.php';
$pageTitle = "Suppression d'une nouvelle";
include "views/header.php";
?>
<p><?php echo GetMessageFlash(); ?></p>
<?php
if (isset($errors)) {
    foreach ($errors as $error) {
        ?>
		<p class="error"><?php echo $error; ?></p>
		<?php
}
}
?>
<form class="" action="./editNews.php" method="post">
	<button type="submit" value="delete" name="delete">Supprimer</button>
	<button type="submit" value="cancel" name="cancel">Annuler</button>
	<input type="hidden" name="idNews" value="<?php echo $idNews; ?>">
</form>
<?php
include "views/footer.php";
?>