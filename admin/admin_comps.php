<?php

require '../function/connexion_test.php';
if (!is_connected()){
    header('Location: connexion.php');
}

session_start();
?>