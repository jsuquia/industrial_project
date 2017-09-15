<?php

/*
Function takes a spreadsheet and uploads the data into the DB.
It is very large, I will rrefactor later.
Designed to initially put the data into the DB AND to 

ALSO UNFINISHED DO NOT USE YET >:(
*/
function UploadToDatabase($spreadsheet)
{
	include 'php_scripts/PHPExcel/IOFactory.php';
	include 'php_scripts/DatabaseConnection.php';

	$inputFileName = $spreadsheet;

	try {
    	$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
    	$objPHPExcel = $objReader->load($inputFileName);
	} catch(Exception $e) {
    	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	$sheetToUse = $objPHPExcel->getSheet(0);
	$amountOfRows = $sheetToUse->getHighestRow();
	$amountOfColumns = $sheetToUse->getHighestColumn();

	//TESTING REMOVE PLEASE
	$getHighestRow = 10;
	//

	for($row = 1; $row <= $getHighestRow; $row++)
	{
		$rowData = $sheetToUse->rangeToArray('A' . $row . ':' . $amountOfColumns . $row, NULL, TRUE, FALSE);
		var_dump($rowData);
		echo '<br>';
	}

	
	$db = ConnectToDatabase();

	//Can i function this shit somehow?

	//Check is retailer is in, if not, create new retailer
	$retailerName = 'test';
	$columnName = 'test';
	$value = 'test';
	if(!CheckIfInDB($retailerName, $columnName, $value, $db));
	{
		//Add into db
	}

	//Check if outlet is in, if not, create noew retailer
	$outletName = 'test';
	$columnName = 'test';
	$value = 'test';
	if(!CheckIfInDB($outletName, $columnName, $value, $db));
	{
		//Add into db
	}

	//Check if user (customer) is in, if not, create new user.
	$customerID = 'test';
	$columnName = 'test';
	$value = 'test';
	if(!CheckIfInDB($customerID, $columnName, $value, $db));
	{
		//Add into db
	}

	
}

/*
Probably not needed, but nice to protect against SQL injection.
*/
function Sanitise($toClean)
{
	$toClean = mysql_real_escape_string($toClean);
	$toClean = strip_tags($toClean);
	$toClean = htmlspecialchars($toClean);
	return $toClean;
}

/*
Returns true is in database, false if it is not in database.
*/
function CheckIfInDB($table, $Column, $value, $dbConnection)
{
	$value = Sanitise($value);
	mysql_select_db($dbConnection);
	$query = mysql_query("SELECT '$column' FROM '$table' where '$column' = '$value'");
	while( $row = mysql_fetch_array($query))
	{
		$val = $row[$column];
		if($value == $val)
		{
			return true;
		}
	}
	return false;
}

?>