{ include file="maint_header.tpl" }
	
	{$message}
	
	<h2>Minutes for year {$years[i].year}</h2>
	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="action" id="action" type="action" value="add_minute" />
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	
		<table>
		<tr>
			<td>Minute date</td>
			<td><input type="text" name="minutedatetime" id="minutedatetime" /><input type="button" onclick="show_cal(this);" value="..." /></td>
		</tr>
		<tr>
			<td>Upload minute from local disk</td>
			<td><input type="file" name="minute" id="minute" /></td>
		</tr>
		</table>
	
	<input type="submit" value="Submit" />
	</form>

{ include file="maint_footer.tpl"}