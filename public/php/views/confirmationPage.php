<?php
/**
 * views\confirmationPage.php
 * @author Fabian Huber
 * 31.08.2018
 * View of the confirmation
 */

$pageTitle = "Confirmation";
include "views/header.php";

?>
<h1>BRAVO</h1>
<p><?php echo $name; ?>, tu es connecté!</p>
<a href="./main.php">Page de News</a>
<?php
include "views/footer.php";
?>