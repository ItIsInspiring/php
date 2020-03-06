<?php 

    function nav_item(string $url, string $titre, string $linkClass = ''){
        $class = "nav-link";
        if ($_SERVER['SCRIPT_NAME'] === $url) {
            $class .= ' active'; 
        }
        return <<<HTML
    <li class="$linkClass">
            <a class="$class" href="$url">$titre</a>
        </li>
HTML;
    }

function nav_menu(String $linkCLass): string{
    return
       nav_item('/index.php', 'Accueil', $linkCLass) .
       nav_item('/contact.php', 'Contact', $linkCLass) .
       nav_item('/blog.php', 'Blog', $linkCLass).
       nav_item('/menu.php', 'Menu', $linkCLass).
       nav_item('/newsletter.php', 'Newsletter', $linkCLass).
       nav_item('/form.php', 'Choix', $linkCLass).
       nav_item('/dashboard.php', 'Dashboard', $linkCLass);
}

function checkbox(string $name, string $value, array $data): string{

    // variable qui va enregistrer les choix client après envoie du formulaire
    // initialement vide
    $attributes = '';
    
    // si envoie du formulaire
    // et si il y a des choix dans le tableau $data
    if(isset($data[$name]) && in_array($value, $data[$name])) {
        $attributes .= 'checked';
    }

    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes >
HTML;
}

function dump($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

// affiche la liste des horaires par jours
function creneaux_html(array $creneaux){
    // construire le tableau intermédiaire
    // de X à Y H
    // implode pour construire la phrase finale

    if(isset($creneaux)){
        if (empty($creneaux)){
            return 'Fermé';
        }
        $phrases = [];
        foreach ($creneaux as $creneau){
            // $creneau renvoie à la ligne, l'index renvoie à la donnée 
            $phrases[] = "<strong>{$creneau[0]}h</strong> - <strong>{$creneau[1]}h</strong>";
        }
        return implode(' et ', $phrases);
    }

}

// comparer l'heure actuelle avec les horaires
function in_creneaux (int $heure, array $creneaux) :bool{

    foreach($creneaux as $creneau){
        $debut = $creneau[0];
        $fin = $creneau[1];
        
        // si l'heure actuelle est comprise entre
        // l'ouverure et la fermetre
        if ($heure >= $debut && $heure <= $fin){
            return true;
        }
    }
    return false;

}

