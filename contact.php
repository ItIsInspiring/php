<?php 

$pgTitle = "page de contact";

require_once('inc/header.php');

?>

<div class="container">
    <h1>PHP - TP GRAFIKART - <?php if(isset($pgTitle)) echo $pgTitle; ?></h1>
    <div class="row">   
        <div class="col-md-8">
            <h2>Nous contacter</h2>
        </div>
        <div class="col-md-4">
            <h2>Horaire d'ouvertures</h2>
            <ul>
                <?php 
                foreach(JOURS as $k => $jour):?>
                <li><strong><?= $jour ?></strong> : <?= creneaux_html(CRENEAUX[$k]); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php require_once('inc/footer.php');?>