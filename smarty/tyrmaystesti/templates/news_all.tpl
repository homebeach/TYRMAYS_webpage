

{ include file="header.tpl" }

<table>
    {section name="i" loop=$news}	
    
    {if $lang eq fi}
	<tr>
    	<td>{$news[i].newsinserteddatetime|date_format:"%d.%m.%Y"}</td>
		<td><a href="index.php?action=newsdetails&amp;lang={$lang}&amp;details=details&amp;nid={$news[i].newsid}">
	{$news[i].newsheadingfi}</a></td>
    </tr>

	{else}
	<tr>
		<td>{$news[i].newsinserteddatetime|date_format:"%d.%m.%Y"}</td>
		<td><a href="index.php?action=newsdetails&amp;lang={$lang}&amp;details=details&amp;nid={$news[i].newsid}">
	{$news[i].newsheadingen}</a></td>
	</tr>
    {/if}

    
    
    {sectionelse}

        <tr>
            <td colspan="2">{#nonews#}</td>
        </tr>
    {/section}
</table>


{ include file="footer.tpl"}

