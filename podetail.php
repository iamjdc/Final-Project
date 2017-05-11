<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("connect.inc");

$sql = "SELECT * from poDetails where poListID=".$_GET["id"].";";

$result = $conn->query($sql);

if ($result->num_rows > 0) {	
    echo "<table>
<div> <h1> Purchase Order ".$_GET["id"]."</h1> </div>
<tr><th>ID</th><th>Price</th><th>Description</th><th>Quantity</th><th> Sub Total </th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
		<td>".$row["itemID"]."</td>
		<td>$".$row["itemCost"]."</td>";
$sql2 ="select * from styleNumbers where styleID =" . $row["itemID"] .";";
$inner = $conn->query($sql2);
$irow = $inner->fetch_assoc();
if ($irow["type"] == "Jewelry"){ echo "<td> " .$irow["styleType"]."</td>"; } else{
echo "<td> " .$irow["stoneType"]."</td>"; }

$subvalue= $row["itemQty"]*$row["itemCost"];
$subvalue=number_format(($subvalue),2);
		echo "<td>".$row["itemQty"]."</td>
		<td> $".$subvalue."</td>
		



</tr>";
$final =$row["poFinal"];
    }
echo  " <tr><td><a href=\"pohistory.php\">Return to PO Overview</a> </td><td></td><td></td><td></td><td>$".$final."</td></tr>";
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
