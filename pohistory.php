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

$sql = "SELECT * from poLists";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>PO Date </th><th>Final Cost</th><th> Detail </th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
		<td>".$row["poID"]."</td>
		<td>".$row["poDate"]."</td>
		<td> $".$row["poFinal"]."</td>
		<td> <a href= podetail.php?id=" . $row["poID"] . ">Detail</a></td>



</tr>";
    }
    echo "</table> <table> <tr><td><a href= admin.php?>Return to Admin</a></td></table>";
} else {
    echo "0 results";
}
$conn->close();
?>
