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
		$password = Sanitise($_POST["password"]); //HASH THIS HERE PLEASE

		$query = "SELECT * FROM USERS WHERE username = '$username';";
		$result = mysql_query($query);
		if (mysql_num_rows($result)==0)
		{
			$error++;
		}

		while($row = mysql_fetch_array($result))
		{
			if($row["password"] === $password)
			{
				if(session_id() === '')
				{
					session_start();
				}

				$_SESSION["username"] = $username;
				$_SESSION["privilege"] = $row["privilege"];
			}
		}


		if($error != 0)
		{
			//error has happened.
		}
		else if($error === 0)
		{
			header("Location: dashbord.php");
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
<title>Log In : YoYo Analysis</title>
<body>

 <!-- <?php include 'forms/loginForm.php'; ?> -->
 <form action="login.php" method ="post">
		Username: <input type="text" name="username" value=""/><br/>
		Password: <input type="password" name="password" value=""/><br/>
		<br/>
		<input type="submit" name="submit" value="Submit"/>
</form>


</body>

</html>