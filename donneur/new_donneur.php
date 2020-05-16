<?php
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
	
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register entreprise</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>

	<form method="post">


  	  <label>nom utilisateur</label>
  	  <input type="text" name="username" >
  	

  	  <label>Email</label>
  	  <input type="email" name="email">
  	

  	  <label>mot de passe</label>
  	  <input type="password" name="password_1">
  	

  	  <label> confirmer mot de passe</label>
  	  <input type="password" name="password_2">
  	

  	  <button type="submit" name="connexion">se connecter </button>

  	
	</form>
	<a href="../index.php">retour au menu</a>
		
	</body>
</html>

<?php
if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password_1"])&&isset($_POST["password_2"])){
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password_1"];
	$password_test = $_POST['password_2'];

	$query_verif_user = $pdo->prepare("select username from companies where username = ?");
	$query_verif_user->execute([$username]);

	
	$query_verif_mail = $pdo->prepare("select email from companies where email = ?");
	$query_verif_mail->execute([$email]);

	if ($password !== $password_test) {
		echo "<script type='text/javascript'>alert('les deux mot de passes ne correspondent pas');</script>";
	}

	elseif ($query_verif_user-> rowCount() > 0){
		echo "<script type='text/javascript'>alert('l utilisateur existe déjà');</script>";
		
	}
	elseif ($query_verif_mail->rowCount()>0){
		echo "<script type='text/javascript'>alert('cette email est déjà utilisé');</script>";
	
	}
	
	else {
		$password = md5($password);
		$query_add = $pdo->prepare("INSERT INTO companies (username, email, password) VALUES(:username, :email, :password)");
		$query_add->bindparam(":username", $username);
		$query_add->bindparam(":email", $email);
		$query_add->bindparam(":password", $password);
		$query_add->execute();
	}
}
	



?>