	<h2>New Entry</h2>
	<div class="egbookDiv">
	<p>Mandatory fields are marked with an asterisk. HTML will be removed.</p>
	<p>Note: I reserve the right to edit or delete any entry!</p>
	<form action="<?php echo $_SERVER["SCRIPT_NAME"];?>" method="post">
	<?php
	foreach($GBFieldList as $field){
		$f2 = str_replace("*", "", $field); //remove any asterisks
		$field = str_replace("*", " <span class=\"EmRed\">*</span>", $field);
		//echo "<p>$f2</p>";
		if($f2 == "Comment"){
			echo "<div class=\"egbookDisplayDIV\">$field</div>";
			?>
			<table border="0" cellpadding="0" cellspacing="2">
				<tr>
				<td rowspan="2" class="egbookCommentTD"><textarea name="Comment" cols="30" rows="9"></textarea></td>
				<td class="egbookIconsList">
						<div>The following smileys are recognised!</div>
						<div> :) <img src="icons/smile.jpg" alt="smiling face icon" /></div>
						<div> :( <img src="icons/frown.jpg" alt="frowning face icon" /></div>
						<div> :D <img src="icons/happy.jpg" alt="happy face icon" /></div>
						<div> :p <img src="icons/tongue.jpg" alt="happy face icon" /></div>
						<div> ;) <img src="icons/wink.jpg" alt="happy face icon" /></div>
						<div> :o <img src="icons/bored.jpg" alt="happy face icon" /></div>
						<div> 8) <img src="icons/cool.jpg" alt="happy face icon" /></div>
						<div> :I <img src="icons/hmm.jpg" alt="hmm face icon" /></div>
					</td>
				</tr>
			</table>
			
			<?php
			}
		else{
			echo "<p class=\"egbookDisplayDIV\">$field&nbsp;<input type=\"text\" name=\"$f2\" /></p>";
			}
		}
	
	?>
	<div class="egbookDisplayDIV"><input type="submit" name="SUBMIT" value="Submit Entry" /> * <input type="reset" name="reset" value="Reset" /></div>
	</form>
	</div>
