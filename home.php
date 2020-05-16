<?php 
require 'function/connexion_test.php';
require 'function/kill_session.php';

if (!is_connected()){
    header('Location: connexion.php');

}
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
    <form action="" method="post">
        <button name="logout">log out</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['logout'])){
    deconnect();
    header('Location: index.php');
}
?>