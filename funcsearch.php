<?php
include("connect.inc");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$currency = '$';
$choice = $_GET['search'];



	try
{
	$mdb = new MongoDB\Driver\Manager("mongodb://johndelc:johndelc@ds163010.mlab.com:63010/it635");	
	$command = new MongoDB\Driver\Command(['ping' => 1]);
	$mdb->executeCommand('db', $command);



if ($choice == "PaymentMethod")
{	
$answer = $_POST['PM'];
$filter = array('PaymentMethod' =>$answer);
	$query = new MongoDB\Driver\Query($filter);
	$results = $mdb->executeQuery("it635.main",$query);
	} 


if ($choice == "VendorPref")
{	
$answer = $_POST['VP'];
$filter = array('VendorPref' =>$answer);
	$query = new MongoDB\Driver\Query($filter);
	$results = $mdb->executeQuery("it635.main",$query);
}
if ($choice == "StockUpdate")
{	
$answer = $_POST['SU'];
$filter = array('StockUpdate' =>$answer);
	$query = new MongoDB\Driver\Query($filter);
	$results = $mdb->executeQuery("it635.main",$query);
}


foreach($results as $document) {

    var_dump($document);
	echo "<br>";
echo "<br>";
  
}
echo" <a href=\"search.php\">Return to search Page</a>";
}
catch(exception $e)
{
	print_r($e);
}
?>

