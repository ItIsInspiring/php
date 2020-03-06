<?php
// permet d'écrire la hierarchie avec le signe du systeme d'exploitation concerné
// dirname (__DIR__) // pour utiliser le dossier parent
$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'countries.csv';
// rendre silencieux les erreurs d'une fonction avec '@' devant

// file(); encaspule le contenu d'un fichier dans un tableau
// fopen();
// fstats
// fgets
// fwrite

$resource = fopen($fichier, 'r');
$k = 0;
while($line = fgets($resource)){
    $k++;
    if($k == 5){
        echo $line;
    }
}
var_dump(fgets($resource));

fclose($resource);