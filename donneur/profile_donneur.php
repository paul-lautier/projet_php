<?php
require '../function/connexion_test.php';

if (!is_connected()){
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="./change_pass.php">changer son mot de passe</a><br>
<a href="./sup_compte.php">supprimer votre compte</a>
    
</body>
</html>