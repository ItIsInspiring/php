<?php 

$pgTitle = "Choix";

require_once('inc/header.php');



$parfums = [
    'Vanille' => 4,
    'Chocolat' => 5,
    'Fraise' => 6
];
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
$supplements = [
    'Pepite de chocolat' => 1,
    'Chantilly' => 0.5
];

$ingredients = [];
$total = 0;

foreach(['parfum', 'supplement','cornet'] as $name){
    if(isset($_GET[$name])){
        $liste = $name . 's';
        $choix = $_GET[$name]; 

        // si c'est un tableau (plusieurs choix)
        if(is_array($choix)){

            foreach($choix as $value){
                if(isset($$liste[$value])){
                    $ingredients[] = $value;
                    $total += $$liste[$value];
                }
            }
        } else {
            if(isset($$liste[$value])){
                $ingredients[] = $value;
                $total += $$liste[$value];
            }
        }

    }
}


?>

<section class="container">
    <div class="row">
        <h1>PHP - TP GRAFIKART - <?php if(isset($pgTitle)) echo $pgTitle; ?></h1>
    </div>
    <div class="row">
     
        <div class="col-md-6">
            
            <form method="get" >
                
                <h2>Choisissez un parfum</h2>
                <?php foreach($parfums as $parfum => $prix): ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('parfum', $parfum, $_GET); ?>
                            <?= $parfum ?> - <?= $prix ?> €
                        </label>    
                    </div>
                <?php endforeach; ?>
                    
                <h2>Choisissez un support</h2>
                <?php foreach($cornets as $cornet => $prix): ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('cornet', $cornet, $_GET); ?>
                            <?= $cornet ?> - <?= $prix ?> €
                        </label>    
                    </div>
                <?php endforeach; ?>
                    
                <h2>Choisissez un supplément</h2>
                <?php foreach($supplements as $supplement => $prix): ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('supplement', $supplement, $_GET); ?>
                            <?= $supplement ?> - <?= $prix ?> €
                        </label>    
                    </div>
                <?php endforeach; ?>
                            
                <button type="submit" class="btn btn-primary">Envoyer votre composition</button>

            </form>

        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Votre glace</h5>
                    <ul>
                        <?php 
                            foreach($ingredients as $ingredient){
                                echo '<li>'.$ingredient.'</li>';
                            }
                        ?>
                    </ul>
                    <p>Prix : <?= $total ?>€</p>
                </div>
            </div>
        </div>

    </div>
</section>




<?php require_once('inc/footer.php');?>