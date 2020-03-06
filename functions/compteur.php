<?php 
// COMPTEUR
function addView():void{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier = $fichier . '-' . date('Y-m-d');
    increment_cpt($fichier);
    increment_cpt($fichier_journalier);
}


function increment_cpt(string $fichier):void{
    $cpt = 1;
    if(file_exists($fichier)){
        $cpt = (int)file_get_contents($fichier);
        $cpt++;
    }
    file_put_contents($fichier, $cpt);
}


function showViews(): string{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' .DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}

function nombre_vues_mois(int $annee, int $mois):int{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' .DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $total = 0;
    foreach($fichiers as $fichier){
        $total += (int)file_get_contents($fichier);
    }
    return $total;
}

function nombre_vues_mois_details(int $annee, int $mois):array{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' .DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $visites = [];
    foreach($fichiers as $fichier){
        // basename renvoie le nom du fichier se trouvant dans une url
        $parties = explode('-', basename($fichier));
        $visites[] = [
            'annee' => $parties[1],
            'mois' => $parties[2],
            'jour' => $parties[3],
            'visites' => file_get_contents($fichier)
        ];
    }
    return $visites;
}