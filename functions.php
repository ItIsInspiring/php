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
       nav_item('/blog.php', 'Blog', $linkCLass);

}