<?php
include("stone.inc");
include("connect.inc");
error_reporting(E_ALL);
ini_set('display_errors', 1);
	$formId = $_GET['id'];
	$Purchase = new Stone();
	$choice=$Purchase->editStone($formId);
	$row = $choice-> fetch_assoc();

?>

<html>
<body>

    <?php if (isset($_POST['submit'])) { 
       

	$stt = htmlentities($_POST['ST'], ENT_QUOTES);
	$spp = htmlentities($_POST['SP'], ENT_QUOTES);
	$scc = htmlentities($_POST['SC'], ENT_QUOTES);
	$sqq = htmlentities($_POST['SQ'], ENT_QUOTES);
		$v = htmlentities($_POST['vendor'], ENT_QUOTES);
	if ($stt==''||$spp ==''||$scc=='' ||$sqq==''){
	
	echo "<div><h1><font color =\"red\">Soemthing isnt working!</font></h1></div>";
	}else{
	
	$Purchase = new Stone();
	$Purchase->editStoneSubmit($formId,$stt,$spp,$scc, $sqq, $v);
	
	} }

?></h1>
   <a href="admin.php">Return to Admin Page</a>
    <form action="" method="post">
    <p>Stone Type: <input type="text" name="ST" value= "<?php echo $row["stoneType"]; ?>" /></p>
    <p>Stone Price: <input type="text" name="SP" value= "<?php echo $row["stylePrice"]; ?>"  /></p>
    <p>Stone Cut: <select name="SC">
		  <option value="Round" <?php if( $row["stoneCut"] == "Round") echo "selected=\"selected\"";    ?>> Round </option>
		  <option value="Square" <?php if( $row["stoneCut"] == "Square") echo "selected=\"selected\"";    ?>> Square </option>
		 <option value="Princess"<?php if( $row["stoneCut"] == "Princess") echo "selected=\"selected\"";    ?>> Princess </option>
		 <option value="Emerald"<?php if( $row["stoneCut"] == "Emerald") echo "selected=\"selected\"";    ?>> Emerald </option>
		 <option value="Heart"<?php if( $row["stoneCut"] == "Heart") echo "selected=\"selected\"";    ?>> Heart </option>
		 <option value="Rectangle"<?php if( $row["stoneCut"] == "Rectangle") echo "selected=\"selected\"";    ?>> Rectangle</option></select></p>
    <p>Stone Qty: <input type="text" name="SQ" value= "<?php echo $row["styleQty"]; ?>"/></p>
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



