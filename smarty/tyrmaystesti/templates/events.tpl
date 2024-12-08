

{ include file="header.tpl" }


<h2>{#future_events#}</h2>
<table>
    {section name="i" loop=$future_events}	
    {if $smarty.section.i.first}

	
    {/if}
    <tr>

    {if $lang eq fi}
		<td><a href="index.php?action=event&amp;lang={$lang}&amp;details=details&amp;eid={$future_events[i].eventid}">
	{$future_events[i].eventnamefi}</a></td>

    {if !{$future_events[i].eventgallerylink eq ''}}
		<td><a href="{$future_events[i].eventgallerylink}">[ {#gallery#} ]</a></td>
    {/if}

    {else}
		<td><a href="index.php?action=event&amp;lang={$lang}&amp;details=details&amp;eid={$future_events[i].eventid}">
	{$future_events[i].eventnameen}</a></td>
    {if !{$future_events[i].eventgallerylink eq ''}}
		<td><a href="{$future_events[i].eventgallerylink}">[ {#gallery#} ]</a></td>
    {/if}
    
    {/if}

    	</tr>
    {sectionelse}
        <tr>
            <td colspan="3">{#noevents#}</td>
        </tr>
    {/section}
</table>

<h2>{#passed_events#}</h2>

<table>
    {section name="i" loop=$passed_events}	
    {if $smarty.section.i.first}

	
    {/if}
    	<tr>

    {if $lang eq fi}
		<td><a href="index.php?action=event&lang={$lang}&details=details&eid={$passed_events[i].eventid}">
		{$passed_events[i].eventnamefi}</a></td>

    {if $passed_events[i].eventgallerylink}
		<td><a href="{$passed_events[i].eventgallerylink}">[ {#gallery#} ]</a></td>
    {/if}

    {else}
		<td><a href="index.php?action=event&lang={$lang}&details=details&eid={$passed_events[i].eventid}">
	{$passed_events[i].eventnameen}</a></td>
    {if $passed_events[i].eventgallerylink}
		<td><a href="{$passed_events[i].eventgallerylink}">[ {#gallery#} ]</a></td>
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