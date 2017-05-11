<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM styleNumbers WHERE styleID ='" . $_GET["code"] . "'");
			$mergeID= "ID" . $_GET["code"]; 
			$itemArray = array($mergeID=>array('ID'=> $productByCode[0]["styleID"] , 'ST1'=> $productByCode[0]["stoneType"],'ST2'=> $productByCode[0]["styleNumber"],'type'=> $productByCode[0]["type"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["stylePrice"]));
			

			if(!empty($_SESSION["cart_item"])) {


if(in_array($mergeID,array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($mergeID == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}




	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					$removeID= "ID".$_GET["code"] ;
					if($removeID == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>JDC Groupe Website</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr><th style="text-align:left;"><strong>ID</strong></th>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["ID"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["ST1"];echo $item["ST2"]; ?></td>	
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&code=<?php echo $item["ID"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
	$_SESSION["Total"] = $item_total;
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td> <td>


<form method="post" action="submitpo.php">

			<input type="submit" value="Check out" />
			</form></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM styleNumbers ORDER BY type ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if ($product_array[$key]["styleQty"] >0 ){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["styleID"]; ?>">
			<?php if ($product_array[$key]["type"] == "Stone"){ ?>
				<div><strong><?php echo "Stone: ". $product_array[$key]["stoneType"]; ?></strong></div>
				<div><strong><?php echo "Stone Cut: ".$product_array[$key]["stoneCut"]; ?></strong></div>
				<div><strong><?php echo "Avaliable : " . $product_array[$key]["styleQty"]; ?></strong></div>
				<div class="product-price"><?php echo "$".$product_array[$key]["stylePrice"]; ?></div>

<?php }else { ?>
			<div><strong><?php echo "Style: ".$product_array[$key]["styleNumber"]; ?></strong></div>			
			<div><strong><?php echo "Style Type: ".$product_array[$key]["styleType"]; ?></strong></div>
			<div><strong><?php echo "Metal Type: ".$product_array[$key]["metalType"]; ?></strong></div>
			<div><strong><?php echo "Available : " . $product_array[$key]["styleQty"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["stylePrice"]; ?></div>

<?php   } ?>
			
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>
	<?php }
			}
	}
	?>
</div>
</BODY>
</HTML>
