<?php

$WordWrapAt = 40;



/*====================================================


STOP! Please do not edit below this line unless you 
really really really know what you are doing!

Thank you for using egbook :)

Pierre Far
January 2004

====================================================*/

$GBDataDir = dirname($_SERVER["SCRIPT_FILENAME"]) . "/data/"; //keep the trailing slash!
$GBMandatoryFields = array ();

$GBFieldListFile = file($GBDataDir . "fieldlist.txt");
$GBFieldList = array();
foreach($GBFieldListFile as $value){
	$GBFieldList[] = trim($value);
	if(strstr($value, "*")){
		$GBMandatoryFields[] = trim(str_replace("*", "", $value));
		}
	}

	
	
require "processsubmit.php";
?>