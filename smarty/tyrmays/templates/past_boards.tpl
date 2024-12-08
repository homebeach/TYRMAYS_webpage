
{ include file="header.tpl" }

	<div id="heading"><a> {#oldboards#} </a>  </div>
	
	<br />
	
    {section name="j" loop=$years}

        {if $years[j].year != $year}

    		<a href="index.php?action=oldboard&amp;lang={$lang}&amp;details=details&amp;year={math equation="x - y" x=$years[j].year y=2000}">{#board#} {$years[j].year} - {math equation="x + y" x=$years[j].year y=1}</a> <br />
    
    	{/if}
    	
    {/section}
    
    <br />
    
{ include file="footer.tpl"}

