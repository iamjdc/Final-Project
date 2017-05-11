<?php

// connect to the database
include('stone.inc');

// confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
// get the 'id' variable from the URL
$id = $_GET['id'];

// delete record from database

	$Purchase = new Stone();
	$Purchase->deleteStone($id);




// redirect user after delete is successful
header("Location: admin.php");
$conn->close();

}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: admin.php");
}

?>
