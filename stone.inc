<?php

class Stone{

public function __construct()
{
	$this->db = new mysqli("localhost","root","root",'JDC');
	if ($this->db->connect_errno != 0)
	{
		echo "error connecting to databse: ".$this->db->connect_error.PHP_EOL;
		exit();
	}
}

public function __destruct()
{
	if (isset($this->db))
	{
		$this->db->close();
	}
}



public function addStone($stoneType,$stonePrice, $stoneCut, $stoneQty, $vendor)

{

	$ST = $stoneType;
	$SP = $stonePrice;
	$SC = $stoneCut;
	$SQ = $stoneQty;
	$v = $vendor;

	$sql = "insert into styleNumbers(stoneType, stylePrice, stoneCut, styleQty,type, vendor) VALUES ('$ST','$SP','$SC','$SQ','Stone','$v');";


	if (!$this->db->query($sql))
		{
			echo " <div>Failed to insert record for $stoneType".PHP_EOL ."</div>";
		}

			
}

public function editStone($stoneId)
{

	$SI = $stoneId;

	$sql = "select * from styleNumbers where styleid =" . $SI.";";
	$result = $this->db->query($sql);
	
	return $result;
}
public function editStoneSubmit($styleID,$stoneType,$stylePrice, $stoneCut, $styleQty, $vendor)
{
	$SI= $styleID;
	$ST = $stoneType;
	$SP = $stylePrice;
	$SC = $stoneCut;
	$SQ = $styleQty;
$v=$vendor;


		$sql = "update styleNumbers set stoneType = \"".$ST."\",
					      stylePrice = $SP,
					      stoneCut = \"".$SC."\",
					      styleQty = $SQ,
					      vendor = \"".$v."\"
					      where styleID =" . $SI.";";


	if (!$this->db->query($sql))
			{
				echo " <div>Failed to insert record for $stoneType".PHP_EOL ."</div>";
				
			} else{
				echo "<div><h1><font color =\"red\">Record Changed </font></h1></div>";

			}

	


}


public function deleteStone($stoneID)
{
	$SD = $stoneID;

	$sql= "delete from styleNumbers where styleID = " . $SD.";";


	if (!$this->db->query($sql))
			{
				echo " <div>Failed to insert record for $stoneType".PHP_EOL ."</div>";
			}


}




}

?>
