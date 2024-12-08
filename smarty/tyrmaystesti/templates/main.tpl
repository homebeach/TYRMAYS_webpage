
{ include file="header.tpl" }

{$message}

<h1>{#events#}</h1>

<table>
    {section name="i" loop=$future_events}	
    {if $smarty.section.i.first}

	
    {/if}
    
    <tr>

    {if $lang eq fi}
    
		<td>[{$future_events[i].eventstartdatetime|date_format:"%d.%m.%Y %H:%M"}]</td>
		<td><a href="index.php?action=event&amp;lang={$lang}&amp;details=details&amp;eid={$future_events[i].eventid}">
		
		{$future_events[i].eventnamefi}</a></td>

    {else}

		<td>[{$future_events[i].eventstartdatetime|date_format:"%d.%m.%Y %H:%M"}]</td>
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

<br />

<h1>{#news#}</h1>

<table>
    {section name="i" loop=$news}
    
    {if $lang eq fi}
		<tr>
    		<td>{$news[i].newsinserteddatetime|date_format:"%d.%m.%Y %H:%M"}</td>
			<td><h2>{$news[i].newsheadingfi}</h2></td>
    	</tr>
    	<tr>
    		<td></td>
			<td>{$news[i].newsdescfi}</td>
		</tr>
		<tr>
    		<td></td>
			<td>-{$news[i].first_name}</td>
		</tr>
	{else}
		<tr>
			<td>{$news[i].newsinserteddatetime|date_format:"%d.%m.%Y %H:%M"}</td>
			<td><h2>{$news[i].newsheadingen}</h2></td>
		</tr>
		<tr>
			<td></td>
			<td>{$news[i].newsdescen}</td>
		</tr>
		<tr>
    		<td></td>
			<td>-{$news[i].first_name}</td>
		</tr>
    {/if}

    {sectionelse}

        <tr>
            <td colspan="2">{#nonews#}</td>
        </tr>
    {/section}

        <tr>
        	<td></td>
            <td><br /><a href="index.php?action=allnews&amp;lang={$lang}">{#showallnews#}</a></td>
        </tr>
</table>

<br />

{ include file="footer.tpl"}

