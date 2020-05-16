<?php
$database_host = 'localhost';
$database_port = '3306';
$database_dbname = 'login';
$database_user = 'root';
$database_password = 'Paul@123';
$database_charset = 'UTF8';
$database_options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

$pdo = new PDO(
    'mysql:host=' . $database_host .
    ';port=' . $database_port .
    ';dbname=' . $database_dbname .
    ';charset=' . $database_charset,
    $database_user,
    $database_password,
    $database_options
);

session_start();
if (isset($_SESSION["id"])) {
    header("Location : ../home.php");
}
if (isset ($_POST["connexion"])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $query_verif = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $query_verif->execute([$username,$password]);

    if ($query_verif->rowCount() > 0){
        session_start();
        header('Location : ../home.php');
        exit;

    }
    else{
        echo "<script type='text/javascript'>alert('mauvais mdp');</script>";

    }
    
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
    <form method="post">
        <input type="username" placeholder="username" name ="username">
        <input type="password"placeholder="password" name="password">
        <button action="submit" name="connexion">se connecter</button>
    </form>

    
    
    
</body>
</html>