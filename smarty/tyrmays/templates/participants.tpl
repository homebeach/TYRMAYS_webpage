

{ include file="header.tpl" }

	<div id="heading"><a> {#participantsforevent#} {if $lang eq fi} {$event[0].eventnamefi}. {else} {$event[0].eventnameen}. {/if} </a>  </div>

	{section name="i" loop=$participants}
	
    {if $smarty.section.i.first}

	
    {/if}	

		<p>{$participants[i].first_name} {$participants[i].surname}</p>
		
    {sectionelse}

        <p>{#noparticipants#}</p>

    {/section}


{ include file="footer.tpl"}

