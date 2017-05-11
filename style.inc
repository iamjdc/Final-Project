<?php

class Style{

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



public function addstyle($styleNumber,$metalType,$styleType,$stylePrice, $styleQty,$vendor)

{
	$SN = $styleNumber;
	$MT = $metalType;
	$ST = $styleType;
	$SP = $stylePrice;
		$SQ = $styleQty;
		$v= $vendor;


	$sql = "insert into styleNumbers(styleNumber, metalType, styleType, stylePrice, styleQty, type, vendor) VALUES ('$SN', '$MT','$ST','$SP','$SQ', 'Jewelry', '$v');";


	if (!$this->db->query($sql))
		{	
			echo "Failed to insert record for $styleType".PHP_EOL;
		}

			
}

public function editstyle($styleId)
{

	$SI = $styleId;

	$sql = "select * from styleNumbers where styleID =" . $SI.";";
	$result = $this->db->query($sql);
	
	return $result;
}
public function editstyleSubmit($styleID,$styleNumber, $metalType, $styleType,$stylePrice, $styleQty, $vendor)
{
	$SI= $styleID;
	$SN = $styleNumber;
	$ST = $styleType;
	$SP = $stylePrice;
	$MT = $metalType;
	$SQ = $styleQty;
	$v = $vendor;

		$sql = "update styleNumbers set styleType = \"".$ST."\",
					      stylePrice = $SP,
					      styleNumber = \"".$SN."\",
					      metalType = \"".$MT."\",
					      styleQty = $SQ,
					      vendor = \"".$v."\"
					      where styleID =" . $SI.";";


	if (!$this->db->query($sql))
			{
				echo "Failed to insert record for $styleType".PHP_EOL;
			}else{
				echo "<div><h1><font color =\"red\">Record Changed </font></h1></div>";

			}

	


}


public function deletestyle($styleID)
{
	$SD = $styleID;

	$sql= "delete from styleNumbers where styleID = " . $SD.";";


	if (!$this->db->query($sql))
			{
				echo "Failed to  delete record for $styleType".PHP_EOL;
			}


}




}

?>
