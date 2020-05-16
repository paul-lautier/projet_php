<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=login','root','Paul@123');

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espace connexion</title>
</head>
<body>
    <div class="login_user">
        <a href="./demandeur/connexion_demandeur.php"><h1>connexion utilisateur</h1></a>
        <a href="./demandeur/new_demandeur.php"><h1>nouveau compte utilisateur</h1></a>
        <a href="./admin/connexion_admin.php"><h1>connexion_admin</h1></a>
        <a href="./donneur/connexion_donneur.php"><h1>connexion entreprise</h1></a>
        <a href="./donneur/new_donneur.php"><h1>nouveau compte entreprise</h1></a>
    </div>




</body>
</html>