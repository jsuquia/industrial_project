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
    <br><br>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select an excel file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <input type="submit" value="Upload Image" name="submit">
    </form>

</body>

</html>
