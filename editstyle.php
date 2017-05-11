<?php
include("style.inc");
include("connect.inc");
error_reporting(E_ALL);
ini_set('display_errors', 1);
	$formId = $_GET['id'];
	$Purchase = new Style();
	$choice=$Purchase->editstyle($formId);
	$row = $choice-> fetch_assoc();

?>

<<html>
<body>

    <?php if (isset($_POST['submit'])) { 
       

	$snn = htmlentities($_POST['SN'], ENT_QUOTES);
	$mtt = htmlentities($_POST['MT'], ENT_QUOTES);
	$stt = htmlentities($_POST['ST'], ENT_QUOTES);
	$sqq = htmlentities($_POST['SQ'], ENT_QUOTES);
	$spp = htmlentities($_POST['SP'], ENT_QUOTES);
	$vendor = htmlentities($_POST['vendor'], ENT_QUOTES);
	if ($snn==''||$mtt==''||$spp ==''||$stt=='' ||$sqq==''){
	
		echo "<div><h1><font color =\"red\">Soemthing isnt working!</font></h1></div>";
	}else{
	
	$Purchase = new Style();
	$Purchase->editstyleSubmit($formId, $snn, $mtt, $stt, $spp, $sqq, $vendor);
	header("Location: admin.php");
	} }

?></h1>
   <a href="admin.php">Return to Admin Page</a>
    <form action="" method="post">
    <p>Style Number: <input type="text" name="SN"value= "<?php echo $row["styleNumber"]; ?>" /></p>
    <p>Metal Type: <select name="MT">
		  <option value="14KW" <?php if( $row["metalType"] == "14KW") echo "selected=\"selected\"";    ?>> 14KW </option>	
		 <option value="925" <?php if( $row["metalType"] == "925") echo "selected=\"selected\"";    ?>> 925 Silver </option>
		 <option value="18KW" <?php if( $row["metalType"] == "18KW") echo "selected=\"selected\"";    ?>> 18KW </option>
		 <option value="24KW" <?php if( $row["metalType"] == "24KW") echo "selected=\"selected\"";    ?>> 24KW </option></select></p>	
    <p>Style Type: <select name="ST">
		  <option value="Bracelet"<?php if( $row["styleType"] == "Bracelet") echo "selected=\"selected\"";    ?>> Bracelet </option>
		  <option value="Ring"<?php if( $row["styleType"] == "Ring") echo "selected=\"selected\"";    ?>> Ring </option>
		 <option value="Necklace"<?php if( $row["styleType"] == "Necklace") echo "selected=\"selected\"";    ?>> Necklace </option>
		 <option value="Earrings"<?php if( $row["styleType"] == "Earrings") echo "selected=\"selected\"";    ?>> Earrings </option></select></p>
    <p>Price: <input type="text" name="SP"value= "<?php echo $row["stylePrice"]; ?>" /></p>
    
    <p>Qty: <input type="text" name="SQ" value= "<?php echo $row["styleQty"]; ?>" /></p>
	<?php $sql = mysqli_query($conn, "SELECT * FROM vendors");
 echo "<p>Vendor: <select name=\"vendor\">";
  while ($row = $sql->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['id'];
                  $vendor = $row['vendor']; 
		
                  echo '<option value="'.$vendor.'">'.$vendor.'</option>';

}

?>
</select>

      <p><input name="submit" value="Submit" type="submit"/></p>

</body>
</html>

