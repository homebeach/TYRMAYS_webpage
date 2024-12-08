
{ include file="header.tpl" }

<div id="heading"><a> {#news#} </a>  </div>

<p>{$message}</p>

<table>

    {section name="i" loop=$news}
        
    {if $lang eq fi}

		<tr>
    		<td>{$news[i].newsinserteddatetime|date_format:"%d.%m.%Y %H:%M"}</td>
			<td><h2 class="mainpage">{$news[i].newsheadingfi}</h2></td>
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
			<td><h2 class="mainpage">{$news[i].newsheadingen}</h2></td>
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

