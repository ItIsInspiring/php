<?php 
require_once('functions/auth.php');


require_once('functions/compteur.php');

$pgTitle = "Dashboard";

$annee = (int) date('Y');
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : $_GET['mois'];
if($annee_selection && $mois_selection){
    $total = nombre_vues_mois($annee_selection, $mois_selection);
    $detail = nombre_vues_mois_details($annee_selection, $mois_selection);
} else {
    $total = showViews();
}

$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre'
];
require_once('inc/header.php');
?>



<div class="row">
    <div class="col-md-4">
        <ul class="list-group">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <li><a class="list-group-item  <?= $annee - $i === $annee_selection ? 'active' : ''?> <?= $annee - $i === $annee_selection; ?>" href="dashboard.php?annee=<?= $annee - $i ?>"><?= $annee - $i ?></a></li>
                <?php if ( $annee - $i === $annee_selection): ?>
                    <div class="list-group">
                        <?php foreach($mois as $id => $nom): ?>
                            <a href="dashboard.php?annee=<?= $annee - $i ?>&mois=<?= $id ?>" class="list-group-item <?= $id === $mois_selection ? 'active' : '' ?>"><?= $nom ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                <?php endfor; ?>
        </ul>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <strong style="font-size:3em"><?= $total ?></strong><br>
                Visite<?= $total > 1 ? 's' : '' ?> total
            </div>
        </div>
        <?php if(isset($detail)): ?>
            <h2>Détails des visites pour le mois<h2>
            <table>
                <thead>
                    <tr>
                        <th>Année</th>
                        <th>Mois</th>
                        <th>Jour</th>
                        <th>Nombre de visite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($detail as $ligne) :?>
                    <tr>
                        <td><?= $ligne['annee']?></td>
                        <td><?= $ligne['mois']?></td>
                        <td><?= $ligne['jour']?></td>
                        <td><?= $ligne['visites']?> visite<?= $ligne['visites'] >1 ? 's' : '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>


<?php 
require_once('inc/footer.php');
?>
