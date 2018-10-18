<?php
/**
 * Confirmation form for the confirmation page.
 * php\confirmation.php
 *
 * PHP Version 7.2.10
 *
 * @category File
 * @package  File
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://127.0.0.1/MiniForum/public/php/confirmation.php
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