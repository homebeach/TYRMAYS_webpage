{ include file="maint_header.tpl" header="TYRMÄYS Maintenance Login"}


	<div id="cal1_div"></div>

	{$message}
	
	<h2>Add a new minute</h2>
	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="action" id="action" type="action" value="add_minute" />
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	
		<table>
		<tr>
		<td>Minute date</td>
		<td>
			<select name="minuteday" size="1">
			{section name="j" loop=$day}
			 <OPTION  VALUE="{$day[j]}">{$day[j]}
			{/section}
			</select>
			
			<select name="minutemonth" size="1">
			{section name="j" loop=$month}
			 <OPTION  VALUE="{$month[j]}">{$month[j]}
			{/section}
			</select>
			
			<select name="minuteyear" size="1">
			{section name="j" loop=$year}
			 <OPTION  VALUE="{$year[j]}">{$year[j]}
			{/section}
			</select>
		</td>
		</tr>

		<tr>
		<td>Minute time</td>
		<td>
			<select name="minutehour" size="1">
			{section name="j" loop=$hour}
			 <OPTION  VALUE="{$hour[j]}">{$hour[j]}
			{/section}
			</select>
		
			<select name="minuteminute" size="1">
			{section name="j" loop=$minute}
			 <OPTION  VALUE="{$minute[j]}">{$minute[j]}
			{/section}
			</select>
		</td>
		</tr>
		
		<tr>
		<td>Selection year of the board</td>
		<td>
		<select name="minuteboard" size="1">
		
		    {section name="j" loop=$boardyears}

		 		<OPTION VALUE="{$boardyears[j]}"> {$boardyears[j]}
		
			{/section}
			
		</select>
		</td>
		</tr>
		

		<tr>
			<td>Upload minute from local disk</td>
			<td><input type="file" name="minute" id="minute" /></td>
		</tr>
		</table>
	
	<input type="submit" value="Submit" />
	</form>

  {section name="i" loop=$years}

  
  		<h2>Minutes for year {$years[i].year}</h2>
  
      	<table border="1">
      	
    {section name="j" loop=$minutes}
    
        {if ($minutes[j].minuteboard eq $years[i].year)}

		<tr>
    		<td>{$minutes[j].minutedatetime}</td>
			<td><a href="http://www.tyrmays.net/poytakirjat/{$minutes[j].minutename}">{$minutes[j].minutename}</td>
			<td><form action="index.php" method="post">
            		<input type="hidden" name="action" value="delete_minute"/>
            		<input type="hidden" name="minuteid" value="{$minutes[j].minuteid}"/>
	   	 			<input type="submit" onclick="return confirm('Really remove?');" value="Delete" />
	   	 		</form>
	   	 	</td>
    	</tr>


        {/if}
        
    {/section}
    
    	</table>
    	    

  {/section}
  
  	<br />
    <br />
  	
	<form action="index.php" method="post">
	<input type="hidden" name="action" value="main"/>
	<input type="submit" value="Back to main menu"/>
	</form>


{ include file="maint_footer.tpl"}

