<?php

function ConnectToDatabase()
{
	$dbconnection = mysql_connect("silva.computing.dundee.ac.uk", "ip17team5","9473.ip17t.3749");
	mysql_select_db("ip17team5db"); 
	if(!$dbconnection)
	{
		echo '<br>';
		echo "Cannot connect to database, either there is a problem with authentication or the server is down.";
	}
	else
	{
		echo '<br>';
		echo 'Connection to database, or atleast connection not refused.'; //Remove this later, for testing now
	}
	return $dbconnection;
}

function CloseDatabaseConnection($dbconnection)
{
	mysql_close($dbconnection);
	echo '<br>';
	echo 'Database connection closed.';
}


?>