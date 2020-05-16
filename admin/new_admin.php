<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="register">
			<h1>crée compte admin</h1>
			<form action="new_account.php" method="post">
				<label for="username">
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<label for="emai">
				</label>
				<input type="email" name="email" placeholder="Email" id="email" required>
				<input type="submit" value="Register">
			</form>
		</div>
	</body>
</html>