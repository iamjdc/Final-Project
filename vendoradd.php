<?php
include("connect.inc");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$currency = '$';


$vendors = $_POST['vendor'];
$number = $_POST['number'];
$SR = $_POST['SR'];
$PM = $_POST['PM'];
$VP = $_POST['VP'];
$SU = $_POST['SU'];





	try
{
	$mdb = new MongoDB\Driver\Manager("mongodb://johndelc:johndelc@ds163010.mlab.com:63010/it635");	
	$command = new MongoDB\Driver\Command(['ping' => 1]);
	$mdb->executeCommand('db', $command);
	


$insertthis = new MongoDB\Driver\BulkWrite();


$insertthis ->insert([

    'Vendor' => $vendors,
    'phone' => $number,
    'Type' => 'vendor',
    'SalesRep' => $SR,
    'VendorPref' => $VP,
    'StockUpdate' => $SU,
    'PaymentMethod' => $PM]);

$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
$result = $mdb->executeBulkWrite('it635.main', $insertthis, $writeConcern);


$sql = "insert into vendors(vendor) VALUES ('$vendors');";

$result = $conn->query($sql);
header("Location: admin.php");
}
catch(exception $e)
{
	print_r($e);
}
?>

