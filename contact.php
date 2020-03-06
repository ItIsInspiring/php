<?php 

$pgTitle = "page de contact";

require_once('inc/header.php');

date_default_timezone_set('Europe/Paris');
$cHour = date("G");
$creneaux =  CRENEAUX[date('N') - 1];
$ouvert =  in_creneaux($cHour, $creneaux);
?>

<div class="container">
    <h1>PHP - TP GRAFIKART - <?php if(isset($pgTitle)) echo $pgTitle; ?></h1>
    <div class="row">   
        <div class="col-md-8">
            <h2>Nous contacter</h2>
        </div>
        <div class="col-md-4">
            <h2>Horaire d'ouvertures</h2>
            <?php if($ouvert): ?>
                <div class="alert alert-success">
                    le magasin est ouvert
                </div>
            <?php else : ?>
                <div class="alert alert-danger">
                    le magasin est fermé
                </div>
            <?php endif; ?>
            <ul>
                <?php 
                foreach(JOURS as $k => $jour):?>
                <li><?= $jour ?> : <?= creneaux_html(CRENEAUX[$k]); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php require_once('inc/footer.php');?>