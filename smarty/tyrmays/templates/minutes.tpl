{ include file="header.tpl" }

{if $studentnumber ne ""}


  {section name="i" loop=$years}
  
  		<div id="heading"><a> {#minutesforboard#} {$years[i].year} </a>  </div>
  
  		<br />
  		
      	<table>
      	
    {section name="j" loop=$minutes}
    
        {if ($minutes[j].minuteboard eq $years[i].year)}
        
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
 
   		<br />

		<p>{#membersonly#}</p>

 {/if}


{ include file="footer.tpl"}
