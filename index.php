<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 11/09/2017
 * Time: 11:25
 */
?>

<html>
<title>Home : Yoyo Analysis</title>
<body>
	<h1>Yoyo Analysis</h1> 
	<p>Some stuff about analyzing Yoyo stats.</p> 
	
	<?php
		include  'php_scripts/DatabaseConnection.php';
		$db = ConnectToDatabase();
		CloseDatabaseConnection($db);
	?>

</body>

</html>
