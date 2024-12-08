

{ include file="header.tpl" }

<table>
    {section name="i" loop=$event}
    {if $smarty.section.i.first}

	
    {/if}


    {if $lang eq fi}
      	<tr>
		<td colspan=3><h2>{$event[i].eventnamefi}</h2></td>
		</tr>
		<tr>
			<td colspan=3>{$event[i].eventdescriptionfi} <br /><br /></td>
		</tr>
		
		<tr>    
    	{if $event[i].eventlocationlink}
    		<td>{#eventlocation#}: <a href="{$event[i].eventlocationlink}">{$event[i].eventlocation}</a></td>
		{else}
			<td>{#eventlocation#}: {$event[i].eventlocation}</td>
    	{/if}
		</tr>

		<tr>
			<td colspan=3>{#eventstart#}: {$event[i].eventstartdatetime|date_format:"%d.%m.%Y %H:%M"}</td>
		</tr>
		<tr>
			<td colspan=3>{#eventend#}: {$event[i].eventenddatetime|date_format:"%d.%m.%Y %H:%M"}</td>
		</tr>
		{if $studentnumber ne '' && $futureevent eq 'true'}
		<tr>
			{if $enrolled eq 'false'}
			
				{if $eventfull eq 'true'}
					<td colspan=3><br />{#eventfull#}</td>
				{else}
	    			<td colspan=3><br /><a href="index.php?action=enroll&amp;lang={$lang}&amp;details=details&amp;eventid={$event[i].eventid}&amp;studentnumber={$studentnumber}">{#enroll#}</a></td>
	    		{/if}
	    		
			{else}
					<td colspan=3><br />{#enrolled#} <br /> <a href="index.php?action=leave&amp;lang={$lang}&amp;details=details&amp;eventid={$event[i].eventid}">{#leaveevent#}</a></td>
	    	{/if}
			</tr>
			<tr>
				<td colspan=3><a href="index.php?action=participants&amp;lang={$lang}&amp;details=details&amp;eid={$event[i].eventid}">{#participants#}</a></td>
			</tr>
		</tr>
	    {/if}
    {else}
   	    <tr>
		<td colspan=3><h2>{$event[i].eventnameen}</h2></td>
    
		</tr>
		<tr>
			<td colspan=3>{$event[i].eventdescriptionen} <br /><br /></td>
		</tr>
		
		<tr>    
    	{if $event[i].eventlocationlink}
    		<td>{#eventlocation#}: <a href="{$event[i].eventlocationlink}">{$event[i].eventlocation}</a></td>
		{else}
			<td>{#eventlocation#}: {$event[i].eventlocation}</td>
    	{/if}
		</tr>

		<tr>
			<td colspan=3>{#eventstart#}: {$event[i].eventstartdatetime|date_format:"%d.%m.%Y %H:%M"}</td>
		</tr>
		
		<tr>
			<td colspan=3>{#eventend#}: {$event[i].eventenddatetime|date_format:"%d.%m.%Y %H:%M"}</td>
		</tr>
		{if $studentnumber ne '' && $futureevent eq 'true'}
			<tr>
			{if $enrolled eq 'false'}
			
	    		{if $eventfull eq 'true'}
					<td colspan=3><br />{#eventfull#}</td>
				{else}
	    			<td colspan=3><br /><a href="index.php?action=enroll&amp;lang={$lang}&amp;details=details&amp;eventid={$event[i].eventid}&amp;studentnumber={$studentnumber}">{#enroll#}</a></td>
	    		{/if}
	    		
			{else}
				<td colspan=3>{#enrolled#} <br /> <a href="index.php?action=leave&amp;lang={$lang}&amp;details=details&amp;eventid={$event[i].eventid}">{#leaveevent#}</a></td>
	    	{/if}

			</tr>
			<tr>
				<td colspan=3><a href="index.php?action=participants&amp;lang={$lang}&amp;details=details&amp;eid={$event[i].eventid}">{#participants#}</a></td>
			</tr>
    	{/if}
	{/if}
    
    {sectionelse}
        <tr>
            <td colspan="3">{#noevents#}</td>
        </tr>
    {/section}
</table>




{ include file="footer.tpl"}

