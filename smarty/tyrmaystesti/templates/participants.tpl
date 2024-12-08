

{ include file="header.tpl" }

	<h2>{#participantsforevent#} {if $lang eq fi} {$event[0].eventnamefi}. {else} {$event[0].eventnameen}. {/if}</h2>

	{section name="i" loop=$participants}
	
    {if $smarty.section.i.first}

	
    {/if}	

		<p>{$participants[i].first_name} {$participants[i].surname}</p>
		
    {sectionelse}

        <p>{#noparticipants#}</p>

    {/section}


{ include file="footer.tpl"}

