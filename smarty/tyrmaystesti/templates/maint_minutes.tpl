{ include file="maint_header.tpl" header="TYRMÄYS Maintenance Login"}


<form action="index.php" method="post">
<input type="hidden" name="action" value="add_minutes_form"/>
<input type="submit" value="Add Minutes"/>
</form>

  {section name="i" loop=$years}

  
  		<h2>Minutes for year {$years[i].year}</h2>
  
      	<table border="1">
      	
    {section name="j" loop=$minutes}
    
        {if ($minutes[j].minuteboard eq $years[i].year)}
        
        
        <br />

 
		<tr>
    		<td>{$minutes[j].minutedatetime}</td>
			<td><a href="http://www.tyrmays.net/poytakirjat/{$minutes[j].minutename}">{$minutes[j].minutename}</td>
    	</tr>


        {/if}
        
    {/section}
    
    	</table>
    	    

  {/section}


{ include file="maint_footer.tpl"}

