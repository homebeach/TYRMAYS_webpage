{ include file="header.tpl" }

{if $studentnumber ne ""}


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
        
    {sectionelse}

        <tr>
            <td colspan="2">{#nostats#}</td>
        </tr>
    {/section}
    
    	</table>
    	    
  {sectionelse}

        <tr>
            <td colspan="2">{#nostats#}</td>
        </tr>
  {/section}

 {else}

		<p>{#membersonly#}</p>

 {/if}


{ include file="footer.tpl"}
