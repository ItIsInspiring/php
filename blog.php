<?php 

$pgTitle = "page de blog";

require_once('inc/header.php');

?>

<div class="container">
    <h1>PHP - TP GRAFIKART - <?php if(isset($pgTitle)) echo $pgTitle; ?></h1>
</div>

<?php require_once('inc/footer.php');?>