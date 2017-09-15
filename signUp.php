<?php
	if(isset($_SESSION["privilege"]))
	{
		header("Location: index.php");
		exit;
	}

	if(isset($_POST["submit"]))
	{
		include 'php_scripts/DatabaseConnection.php';
		include 'php_scripts/DatabaseHandling.php';

		$db = ConnectToDatabase();
		$error = 0;

		$username = Sanitise($_POST["username"]);
		$password = Sanitise($_POST["password"]); 
		$password2 = Sanitise($_POST["password2"]);
		$email = Sanitise($_POST["email"]);

		if(CheckIfInDB('users', 'username', $username, $db))
		{
			$error++;
		}

		if(CheckIfInDB('users', 'email', $email, $db))
		{
			$error++;
		}

		if($password !== $password2)
		{
			$error++;
		}

		//HASH PASSWORD HERE

		$query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email');";
		$result = MYSQL_QUERY($query);

		if($error != 0)
		{
			//Set appropriate error here in a session variable and display it??
			header("Location: signUp.php");
			exit;
		}
		else if($error === 0)
		{
			header("Location: login.php");
			exit;
		}	

	}
?>

<!DOCTYPE html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<html>
<title>Sign Up : YoYo Analysis</title>
<body>

 <?php include 'forms/signUpform.php'; ?>

</body>

</html>