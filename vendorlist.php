<?php
include("connect.inc");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$currency = '$';






	try
{
	$mdb = new MongoDB\Driver\Manager("mongodb://johndelc:johndelc@ds163010.mlab.com:63010/it635");	
	$command = new MongoDB\Driver\Command(['ping' => 1]);
	$mdb->executeCommand('db', $command);
	

	$filter = array('Type'=>'vendor');
	$query = new MongoDB\Driver\Query($filter);
	$results = $mdb->executeQuery("it635.main",$query);
		

foreach($results as $document) {

    var_dump($document);
	echo "<br>";
echo "<br>";
  
}

  echo" <a href=\"admin.php\">Return to Admin Page</a>";

}
catch(exception $e)
{
	print_r($e);
}
?>

