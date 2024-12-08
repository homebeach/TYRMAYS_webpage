

{ include file="header.tpl" }

<h2>{#passed_events#}</h2>

<table>
    {section name="i" loop=$past_events}	
    {if $smarty.section.i.first}

	
    {/if}
    <tr>

    {if $lang eq fi}
    
		<td>{$past_events[i].eventstartdatetime|date_format:"%d.%m.%Y"}</td>
		<td><a href="index.php?action=event&amp;lang={$lang}&amp;details=details&amp;eid={$past_events[i].eventid}">
			
	{$past_events[i].eventnamefi}</a></td>

    {if $past_events[i].eventgallerylink}
		<td><a href="{$past_events[i].eventgallerylink}">[ {#gallery#} ]</a></td>
    {/if}

    {else}

		<td>{$past_events[i].eventstartdatetime|date_format:"%d.%m.%Y"}</td>
		<td><a href="index.php?action=event&amp;lang={$lang}&amp;details=details&amp;eid={$past_events[i].eventid}">
		
	{$past_events[i].eventnameen}</a></td>
		
    	{if $past_events[i].eventgallerylink}
			<td><a href="{$past_events[i].eventgallerylink}">[ {#gallery#} ]</a></td>
    	{/if}
    
    {/if}

    </tr>
    {sectionelse}
        <tr>
            <td colspan="3">{#noevents#}</td>
        </tr>
    {/section}
</table>



{ include file="footer.tpl"}