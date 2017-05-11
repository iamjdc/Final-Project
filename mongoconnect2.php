<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
$currency = '$';


	try
{
	$mdb = new MongoDB\Driver\Manager("mongodb://johndelc:johndelc@ds163010.mlab.com:63010/it635");	
	$command = new MongoDB\Driver\Command(['ping' => 1]);
	$mdb->executeCommand('db', $command);
	$servers = $mdb->getServers();
//print_r($servers);

$insertthis = new MongoDB\Driver\BulkWrite();


$insertthis ->insert([
    'item' => 'canvas',
    'qty' => 100]);

$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
$result = $mdb->executeBulkWrite('it635.main', $insertthis, $writeConcern);


	$filter = array('name'=>'steve');
	$query = new MongoDB\Driver\Query($filter);
	$results = $mdb->executeQuery("it635.main",$query);
		

//$insertOneResult = $servers->it635.main>insertOne([
  //  'item' => 'canvas',
  //  'qty' => 100,
  //  'tags' => ['cotton'],
 //   'size' => ['h' => 28, 'w' => 35.5, 'uom' => 'cm'],
//]);




	print_r($results->toArray());
}
catch(exception $e)
{
	print_r($e);
}










		

?>
