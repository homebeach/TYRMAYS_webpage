

{ include file="header.tpl" }

<div id="heading"><a> {#future_events#} </a>  </div>

<br />

<table>
    {section name="i" loop=$future_events}	
    {if $smarty.section.i.first}

	
    {/if}
    
    <tr>

    {if $lang eq fi}
    
		<td>{$future_events[i].eventstartdatetime|date_format:"%d.%m.%Y" }</td>
		<td><a href="index.php?action=event&amp;lang={$lang}&amp;details=details&amp;eid={$future_events[i].eventid}">
		
		{$future_events[i].eventnamefi}</a></td>

    {else}

		<td>{$future_events[i].eventstartdatetime|date_format:"%d.%m.%Y"}</td>
		<td><a href="index.php?action=event&amp;lang={$lang}&amp;details=details&amp;eid={$future_events[i].eventid}">
	
		{$future_events[i].eventnameen}</a></td>
	
    
    {/if}

    </tr>
    
    {sectionelse}
        <tr>
            <td colspan="3">{#noevents#}</td>
        </tr>
    {/section}
    
</table>


{ include file="footer.tpl"}