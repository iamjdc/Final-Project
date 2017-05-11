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


include("session.php");


$sql = "SELECT * from styleNumbers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Stone Type </th><th>Price</th><th>Cut</th><th>Qty</th><th> Vendor </th><th> Edit </th><th>Delete </th></tr>";
     echo "<div> <a href= vendors.php>Add Vendor</a></div>";
 echo "<div> <a href= search.php>Search Notes in Vendor</a></div>";
 echo "<div> <a href= vendorlist.php>Vendor List</a></div>";
     echo "<div> <a href= records.php>Add Stone</a></div>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
	if($row["type"] == "Stone"){
        echo "<tr>
		<td>".$row["styleID"]."</td>
		<td>".$row["stoneType"]."</td>
		<td> ".$row["stylePrice"]."</td>
		<td> ".$row["stoneCut"]."</td>
		<td> ".$row["styleQty"]."</td>
		<td> ".$row["vendor"]."</td>
		<td> <a href= edit.php?id=" . $row["styleID"] . ">Edit</a></td>
		<td> <a href= delete.php?id=" . $row["styleID"] . ">delete</a></td>



</tr>";
    }}
    echo "</table>";
} else {
        echo "<table><tr><th>ID</th><th>Stone Type </th><th>Price</th><th>Cut</th><th>Qty</th><th> Vendor </th><th> Edit </th><th>Delete </th></tr>";
     echo "<div> <a href= records.php>Add Stone</a></div>";
    echo "0 results";
}


$sql = "SELECT * from styleNumbers";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<br> <br>";
    echo "<table><tr><th>ID</th><th>Style Number </th><th>Metal Type</th><th>Style Type</th><th>Style Qty</th><th>Style Price</th><th> Vendor </th><th> Edit </th><th>Delete </th></tr>";
     echo "<div> <a href= stylerecord.php>Add New Style Number</a></div>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
if($row["type"] == "Jewelry"){
        echo "<tr>
		<td>".$row["styleID"]."</td>
		<td>".$row["styleNumber"]."</td>
		<td> ".$row["metalType"]."</td>
		<td> ".$row["styleType"]."</td>
		<td> ".$row["styleQty"]."</td>
		<td> ".$row["stylePrice"]."</td>
		<td> ".$row["vendor"]."</td>
		<td> <a href= editstyle.php?id=" . $row["styleID"] . ">Edit</a></td>
		<td> <a href= deletestyle.php?id=" . $row["styleID"] . ">delete</a></td>



</tr>";
}
    }
    echo "<tr> <td><a href= pohistory.php> PO List</a></td> </table>";
} else {
	echo "<br> <br>";
    echo "<table><tr><th>ID</th><th>Style Number </th><th>Metal Type</th><th>Style Type</th><th>Style Qty</th><th>Style Price</th><th> Edit </th><th>Delete </th></tr>";
     echo "<div> <a href= stylerecord.php>Add New Style Number</a></div>";
    echo "0 results";
}







$conn->close();
?>
