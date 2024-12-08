
{ include file="header.tpl" }

<h2>{#board#} {$year} - {math equation="x + y" x=$year y=1} </h2>

<table>
	


    {section name="i" loop=$board}

    {if $smarty.section.i.first}

    {/if}
    
    <tr>
    	<td><img src="images/{$board[i].picture}" alt="{$board[i].first_name} {$board[i].surname}"/></td>

    	<td>
    		{$board[i].first_name} {$board[i].surname}<br />
    	{if $lang eq fi}
			{$board[i].statusfi}<br />
    	{else}
			{$board[i].statusen}<br />
    	{/if}
			{$board[i].phone}<br />
			{$board[i].email}<br />
			IRC-nick: {$board[i].ircnick}<br />
    	</td>
    	<td>
			<br />
    		{if $lang eq fi}
				{$board[i].commentsfi}<br />
    		{else}
				{$board[i].commentsen}<br />
			{/if}
    	</td>
    </tr>
    
     
    {sectionelse}
        <tr>
            <td colspan="3">{#noboard#}</td>
        </tr>
    {/section}
</table>

<br />
<h2>{#officials#} {$year} - {math equation="x + y" x=$year y=1} </h2>

<table>

    {section name="i" loop=$officials}

    <tr>
    	<td><img src="images/{$officials[i].picture}" alt="{$officials[i].first_name} {$officials[i].surname}" /></td>

    	<td>
    		{$officials[i].first_name} {$officials[i].surname}<br />
    	{if $lang eq fi}
			{$officials[i].statusfi}<br />
    	{else}
			{$officials[i].statusen}<br />
    	{/if}
			{$officials[i].phone}<br />
			{$officials[i].email}<br />
		{if $officials[i].ircnick}
			IRC-nick: {$officials[i].ircnick}<br />
		{/if}
    	</td>
    	<td>

			<br />
    		{if $lang eq fi}
				{$officials[i].commentsfi}<br />
    		{else}
				{$officials[i].commentsen}<br />
			{/if}
    	</td>
    </tr>

    {sectionelse}
        <tr>
            <td colspan="3">{#noofficials#}</td>
        </tr>
    {/section}



	</table>
	
	<br />
	
    {section name="j" loop=$years}

        {if $years[j].year != $year}

    		<a href="index.php?action=oldboard&amp;lang={$lang}&amp;details=details&amp;year={math equation="x - y" x=$years[j].year y=2000}">{#board#} {$years[j].year} - {math equation="x + y" x=$years[j].year y=1}</a> <br />
    
    	{/if}
    	
    {/section}
    
    <br />
    
{ include file="footer.tpl"}

