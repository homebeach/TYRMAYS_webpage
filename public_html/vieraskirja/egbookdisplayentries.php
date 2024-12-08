<?php
	
	//Start of entries inclusion code
    // Initialize temporary arrays for sorting
    $DirFiles = array();

    // Open directory;
    $handle = opendir($GBDataDir . "entries/") or die("Entries directory not found.");

    // Loop through all directory entries, construct
    // two temporary arrays containing files and sub directories
    while($entry = readdir($handle)){
        if(!is_dir($entry) && $entry !=".." && $entry != "."){
            $DirFiles[] = $entry;
        }
    }

    // Sort files and sub directories
    sort($DirFiles);
	$DirFiles = array_reverse($DirFiles);
    
	$EntriesCount = count($DirFiles);
	
	if($EntriesCount >0){
		if($EntriesCount == 1){
			echo "<p>There is 1 entry in the guestbook.</p>";
			}
		else{
			echo "<p>There are $EntriesCount entries in the guestbook.</p>";
			}
		}
	
    if($EntriesCount==0){
	    echo "<p>There are entries currently in the guestbook... why don't you post one? <img src=\"icons/smile.jpg\" alt=\"smiling face icon\" /></p>";
    	}
    elseif($_GET["DisplayAll"]){
    	//Display all entries
    	for($i=0; $i<$EntriesCount; $i++){
	    	DisplayEntry($GBDataDir . "entries/" . $DirFiles[$i]);
    		}
		}
	elseif($EntriesCount > 10 && !$_GET["DisplayAll"]){
		echo "<p>Below are the most recent 10 entries. <a href=\"index.php?DisplayAll=TRUE\">Click to view all entries</a>.</p>";
		for($i=0; $i<10; $i++){
			DisplayEntry($GBDataDir . "entries/" . $DirFiles[$i]);
    		}
		}
	else{
		 //Display all entries
    	for($i=0; $i<$EntriesCount; $i++){
	    	DisplayEntry($GBDataDir . "entries/" . $DirFiles[$i]);
    		}
		}
    // Close directory
    closedir($handle);

/*

Function to display an entry. 

Needs a complete path as an argument.

*/
function DisplayEntry($P){
	echo "\n\n<!-- Start " . basename($P) . "-->\n";
        	$FA = file($P);
        	$EntryHTML = "";
	        	$EntryHTML = "<table border=\"0\" class=\"egbookTable\" width=\"70%\" cellpadding=\"0\" cellspacing=\"2\">";
        	foreach($FA as $line){
	        	$FieldData = explode("\t", $line);
	        	if(strlen(trim($FieldData[1]))>0){
		        	if($FieldData[0] == "Email"){
		        		$EntryHTML .= "<tr><td class=\"egbookFieldTitle\">Email</td><td class=\"egbookField\"><a href=\"mailto:$FieldData[1]\">" . wordwrap($FieldData[1], $GLOBALS["WordWrapAt"], "<br />", 1) . "</a></td></tr>";
		        		//echo "EMAIL - Line is: $line<br>";
	        			}
	        		elseif($FieldData[0] == "URL"){
		        		$U = "";
		        		//Try to detect if the protocol was specified in the URL or not. If not, add it, defaulting to http://
		        		if(!stristr($FieldData[1], "://")){
			        		$U = "http://" . $FieldData[1];
		        			}
		        		else{
			        		$U = $FieldData[1];
		        			}
		        		$EntryHTML .= "<tr><td class=\"egbookFieldTitle\">Website</td><td class=\"egbookField\"><a href=\"$U\">" . wordwrap($U, $GLOBALS["WordWrapAt"], "<br />", 1) . "</a></td></tr>";
		        		//echo "URL - Line is: $line<br>";
	        			}
	        		elseif($FieldData[0] == "Comment"){
		        		//process the comment
		        		$CommentText = $FieldData[1];
		        		$CommentText = wordwrap($CommentText, 40, "<br />", 1);
		        		$CommentText = str_replace(":)", "<img src=\"icons/smile.jpg\" alt=\"smiling face icon\" />", $CommentText);
						$CommentText = str_replace(":D", "<img src=\"icons/happy.jpg\" alt=\"happy face icon\" />", $CommentText);
						$CommentText = str_replace(":(", "<img src=\"icons/frown.jpg\" alt=\"frowning face icon\" />", $CommentText);
						$CommentText = str_replace(":p", "<img src=\"icons/tongue.jpg\" alt=\"tongue face icon\" />", $CommentText);
						$CommentText = str_replace(":P", "<img src=\"icons/tongue.jpg\" alt=\"tongue face icon\" />", $CommentText); // and the capitalised form
						$CommentText = str_replace(":o", "<img src=\"icons/bored.jpg\" alt=\"bored face icon\" />", $CommentText);
						$CommentText = str_replace(":O", "<img src=\"icons/bored.jpg\" alt=\"bored face icon\" />", $CommentText); // and the capitalised form
						$CommentText = str_replace("8)", "<img src=\"icons/cool.jpg\" alt=\"cool face icon\" />", $CommentText);
						$CommentText = str_replace(";)", "<img src=\"icons/wink.jpg\" alt=\"winking face icon\" />", $CommentText);
						$CommentText = str_replace(":I", "<img src=\"icons/hmm.jpg\" alt=\"hmm face icon\" />", $CommentText);
						$EntryHTML .= "<tr><td class=\"egbookFieldTitle\">Comment</td><td class=\"egbookField\">$CommentText</td></tr>";
	        			}
		        	else{
			        	$EntryHTML .= "<tr><td class=\"egbookFieldTitle\">$FieldData[0]</td><td class=\"egbookField\">" . wordwrap($FieldData[1], 40, "<br />", 1) . "</td></tr>";
			        	//echo "OTHER - Line is: $line<br>";
	    				}
    				}
    		}
    		$EntryHTML .= "</table>";
        		//Done processing	
        		echo $EntryHTML;
        	echo "<!-- End " . basename($P) . "-->\n";
        	echo "<div>&nbsp;</div>";
	
	}

//End of entries inclusion code
?>