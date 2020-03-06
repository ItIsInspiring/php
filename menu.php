<?php 
$pgTitle = "Menu";
require_once('inc/header.php');

$lignes = file(__DIR__. DIRECTORY_SEPARATOR .'data'. DIRECTORY_SEPARATOR .'menu.csv');            
foreach ($lignes as $k => $ligne) {
    $lignes[$k] = str_getcsv(trim($ligne, "\\t\\n\\r\\0\\x0B"));
}   

?>

<div class="container">
    <h1>PHP - TP GRAFIKART - <?php if(isset($pgTitle)) echo $pgTitle; ?></h1>

    <section>
        <h2>MENU</h2>
        <?php foreach($lignes as $ligne) : ?>

            <?php if (count($ligne) === 1 ) : ?>
                <h3><?= $ligne[0]; ?></h3>
            <?php else : ?>  
                <div class="row">
                    <div class="col-sm-8">
                        <p><strong><?= $ligne[0]; ?></strong><br/><?= $ligne[1]; ?></p>
                    </div>
                    <div class="col-sm-4">
                        <p><strong><?= $ligne[2]; ?>€</strong></p>
                    </div>
                </div>  
            <?php endif; ?>  

        <?php endforeach; ?>    
    </section>

</div>


<?php 
require_once('inc/footer.php');
?>