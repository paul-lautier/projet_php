<?php
session_start();

require '../function/connexion_test.php';

if (!is_connected()){
    header('Location: connexion.php');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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



?>




<form action="post">
        <label>nom d'utilisateur</label>
        <input type="text" name="username"><br>
        <label>mot de passe actuel</label>
        <input type="password" name="old_pass"><br>

        <label>nouveau mot de passe</label>
        <input type="password" name="new_pass"><br>
        <label>comfirmation nouveau mot de passe</label>
        <input type="password" name="new_pass_verif"><br>

        <button type="submit">changer le mot de pass</button>
    </form>
    

<?php

if (isset($_POST["username"]) && isset($_POST["old_pass"]) && isset($_POST["new_pass"]) && isset($_POST["new_pass"]) && isset($_POST['new_pass_vérif'])){


$username = $_POST['username'];
$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];
$new_pass_verif = $_POST['new_pass_verif'];


$query_verif_old_pass = $pdo->prepare("select ? from users where password = ?");
$query_verif_old_pass->execute([$type,$old_pass]);

if ($query_verif_old_pass->rowCount() == 0){
    echo "<script type='text/javascript'>alert('votre ancien mot de passe ne correspond pas');</script>";
    }

elseif ($new_pass !== $new_pass_verif) {
    echo "<script type='text/javascript'>alert('les deux mot de passes ne correspondent pas');</script>";
}

else {
    $querry_verif_compte = $pdo->prepare("SELECT * FROM ? where username = ? and password = ?");
    $querry_verif_compte->execute([$type,$username,$old_pass]);

    $querr_change_info = $pdo->prepare("UPDATE ? SET password = $new_pass where password = $old_pass");
    $querr_change_info->execute([$type,$new_pass]);
    }

}


?>