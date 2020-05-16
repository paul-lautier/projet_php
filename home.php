<?php 
session_start();
?>

<!doctype html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <a href="index.php">retour menu</a>
    <button name="logout"><?php session_destroy();?>log out</button>
</body>
</html>