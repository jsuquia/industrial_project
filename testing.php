<?php

/*
Function takes a spreadsheet and uploads the data into the DB.
It is very large, I will rrefactor later.
Designed to initially put the data into the DB AND to 

ALSO UNFINISHED DO NOT USE YET >:(
*/
function UploadToDatabase($spreadsheet)
{
	$start = microtime(true);

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

	$amountOfRows = 1000;

	//$db = ConnectToDatabase();
	
	for($row = 6; $row <= $amountOfRows; $row++)
	{
		$rowData = $sheetToUse->rangeToArray('A' . $row . ':' . $amountOfColumns . $row, NULL, TRUE, FALSE);

		$addDate = str_replace('/', '-', $rowData[0][1]);
		$addDate = date ("Y-m-d H:i:s", strtotime($addDate));

		$retailerName = $rowData[0][4];
		$retailerID = $rowData[0][2];
		if(!CheckIfInDB("Retailer", "Retailer_Name", $retailerID, $db));
		{
			$query = "INSERT INTO Retailer (Retailer_ID, Retailer_Name) VALUES ('$retailerID', '$retailerName');";
			$result = mysql_query($query);
		}

		$outletName = $rowData[0][5];
		$outletID = $rowData[0][3];
		if(!CheckIfInDB("Outlet", "Outlet_ID", $outletID, $db));
		{
			$query = "INSERT INTO Outlet (Outlet_ID, Outlet_Name, Retailer_ID) VALUES ('$outletID', '$outletName', '$retailerID');";
			$result = mysql_query($query);
		}

		$customerID = $rowData[0][6];
		if(!CheckIfInDB("Customers" "Customer_ID", $customerID, $db));
		{
			//Add into db
			$query = "INSERT INTO Customers (Customer_ID) VALUES ('$customerID');";
			$result = mysql_query($query);
		}

		$tType = $rowData[0][7];
		$amount = $rowData[0][8];
		$discount = $rowData[0][9];
		$total = $rowData[0][10];
		$query = "INSERT INTO Transactions (Type_Transaction, Date_and_time, Amount, Discount, Total_Amount, Customer_ID, Outlet_ID) VALUES ('$tType', '$addDate', '$amount', '$discount', '$total', '$customerID', '$outletID');";
		$result = mysql_query($query);
	}
	//CloseDatabaseConnection($db);

	$end = microtime(true);
	$creationtime = ($end - $start);
	printf("Page created in %.6f seconds.", $creationtime);

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