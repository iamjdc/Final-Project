<?php

session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();



$sql ="select * from poLists;";
$newPO  = $db_handle->numRows($sql);
$newPO = $newPO +1; $currDate = date("Y-m-d"); 
$db_handle->runQuery("insert into poLists(poDate, poFinal) Values ('".$currDate."','".$_SESSION["Total"]."');");


foreach ($_SESSION["cart_item"] as $item){



$db_handle->runQuery("insert into poDetails(itemID,itemCategory,poListID, itemCost,itemQty, poFinal) Values ('".$item["ID"]."','".$item["type"]."','".$newPO."','".$item["price"]."','".$item["quantity"]."','".$_SESSION["Total"]."');");
$db_handle->runQuery("update styleNumbers set styleQty = styleQty-".$item["quantity"]."  WHERE styleID ='" . $item["ID"] . "'");


}
echo "Thank you ! Your order has been accepted!";
header('Refresh: 3; index.php?action=empty');

?>
