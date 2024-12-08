<?php

if($_POST["SUBMIT"]){
	//we are receiving a new entry
	
	$MissingData = FALSE;
	
	foreach($GBMandatoryFields as $value){
		if(!$_POST[$value] && !$MissingData){
			echo "<p class=\"EmRed\" style=\"text-align:center;\">You have not filled in the following field: $value. Please fill it in.</p>";
			//require "egbookform.php";
			$MissingData = TRUE;
			}
		}
	if(!$MissingData){
		//we will now save the entry!
		//echo "<p>Will save...</p>";
		$NewEntryFilename = $GBDataDir . "entries/entry-" . mktime() . ".txt";
		
		touch($NewEntryFilename);
		chmod($NewEntryFilename, 0664);
		
		$CleanPost = array();
		foreach($_POST as $key => $value){
			$key = stripslashes(trim(htmlspecialchars($key))); //one clean up to go ;)
			$val = stripslashes(trim(htmlspecialchars($_POST[$key]))); //one clean up to go ;)
			//echo $key . "<br/>";
			if(strlen($val) > 0){
				if($key!="SUBMIT"){
					$CleanPost[$key] = $val;
					}
				}
			else{
				if($key!="SUBMIT"){
					$CleanPost[$key] = "\n";
					}
				}
			}
		
		$NewDataString = "";
		
		/*
		egbook2 file format
		
		It is a text file, where each line has the following format:
		
		FIELD_NAME\tFIELD_VALUE
		
		*/
		
		foreach($CleanPost as $key=>$value){
			$NewDataString .= $key . "\t" . str_replace("\n", "<br />", trim($value)) . "\n";
			}
		
		
		$fd = fopen($NewEntryFilename, "w");
		flock($fd, 2);
		fputs($fd, $NewDataString);
		fflush($fd); //just to make sure that any buffering is accounted for.
		flock($fd, 3);
		fclose($fd);
		
		echo "<p>Thank you for posting an entry! <a href=\"" . $_SERVER["SCRIPT_NAME"] . "\">Click to go back to the guestbook</a></p>";
		}
	}
?>