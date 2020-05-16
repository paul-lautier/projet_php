<?php
function is_connected (): bool {
    if (session_start() === PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION['connected']);
}

function redirect_id_connect (): void {
    if (is_connected()){
        header("Location: home.php");
        exit;
    }
    
}
?>