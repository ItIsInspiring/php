<?php

function est_connecte():bool{
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    // renvoie true ou false 
    return !empty($_SESSION['connected']);
}

?>