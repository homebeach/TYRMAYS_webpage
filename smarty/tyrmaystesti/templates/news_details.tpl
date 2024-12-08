

{ include file="header.tpl" }

<table>
    {section name="i" loop=$news}	
    {if $lang eq fi}
    <tr>
	<td>{$news[i].newsinserteddatetime|date_format:"%d.%m.%Y %H.%M"}</td>
	<td><h2>{$news[i].newsheadingfi}</h2></td>	


    </tr>
    <tr>
	<td colspan=2>{$news[i].newsdescfi}</td>
    </tr>


    {else}
    <tr>
	<td>{$news[i].newsinserteddatetime|date_format:"%d.%m.%Y %H.%M"}</td>
	<td><h2>{$news[i].newsheadingen}</h2></td>	


    </tr>
    <tr>
	<td colspan=2>{$news[i].newsdescen}</td>
    </tr>
    {/if}
    {sectionelse}

        <tr>
            <td colspan="3">{#nonews#}</td>
        </tr>
    {/section}
</table>


{ include file="footer.tpl"}

