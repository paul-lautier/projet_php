<?php
session_start();

require '../function/connexion_test.php';

if (!is_connected()){
    header('Location: ../connexion.php');
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


$username = $_SESSION['connected']

?>
    <p>changement de mdp pour l'utilisateur <?php echo "$username" ?></p>
<form method="post">
        <label>mot de passe actuel</label>
        <input type="password" name="old_pass"><br>
        <label>nouveau mot de passe</label>
        <input type="password" name="new_pass"><br>
        <label>comfirmation nouveau mot de passe</label>
        <input type="password" name="new_pass_verif"><br>

        <button type="submit">changer le mot de pass</button>
    </form>
    

<?php

if (isset($_POST['old_pass']) && isset($_POST['new_pass']) && isset($_POST['new_pass_vérif'])){
    $old_pass = md5($_POST['old_pass']);
    $new_pass = md5($_POST['new_pass']);
    $new_pass_verif = md5($_POST['new_pass_verif']);

    // $querry_verif_compte = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    // $querry_verif_compte->bindParam(":username",$username);
    // $querry_verif_compte->bindParam(":password",$old_pass);
    // $querry_verif_compte->execute();
   

    // $query_verif_old_pass = $pdo->prepare("SELECT users from users where password = ?");
    // $querry_verif_compte->bindParam(':password',$new_pass);
    // $query_verif_old_pass->execute();

    // if (!isset($_POST["old_pass"]) && !isset($_POST["new_pass"]) && !isset($_POST["new_pass_vérif"])){
    //     echo "<script type='text/javascript'>alert('veuillez remplir les champs');</script>";
    // }
    // elseif($querry_verif_compte->rowCount() == 0 ){
    //     echo "<script type='text/javascript'>alert('erreur d'identifiant ou de come de passe');</script>";
    // }
    // elseif ($query_verif_old_pass->rowCount() == 0){
    //     echo "<script type='text/javascript'>alert('votre ancien mot de passe ne correspond pas');</script>";
    //     }

    // elseif ($new_pass !== $new_pass_verif) {
    //     echo "<script type='text/javascript'>alert('les deux mot de passes ne correspondent pas');</script>";
    // }

    // else {


        $querr_change_info = $pdo->prepare("UPDATE users SET password = :new_pass where password = :old_pass");
        $querr_change_info->execute([':new_pass',$new_pass,':old_pass',$old_pass]);
        echo "<script type='text/javascript'>alert('changement éffectué');</script>";
        // }

    }


?>