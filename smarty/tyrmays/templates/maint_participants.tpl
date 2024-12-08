
{ include file="maint_header.tpl" header="Event participants"}

	<h2>{#participantsforevent#} {$event[0].eventnameen}</h2>

	<table border="1">
	
	{section name="i" loop=$participants}
	
    {if $smarty.section.i.first}

	
    {/if}	
	<tr>
		<td>{$participants[i].first_name} {$participants[i].surname}</td>
		<td>{$participants[i].comments}</td>
		<td>
		
			<form action="index.php" method="post">
            	<p>
            	<input type="hidden" name="action" value="remove_from_participants"/>
            	<input type="hidden" name="studentnumber" value="{$particiants[i].studentnumber}"/>
            	<input type="hidden" name="eventid" value="{$paricipants[i].eventid}"/>
	    		<input type="submit" value="Remove participant" />
	    		</p>
	    	</form>
	    </td>
	</tr>
	{sectionelse}
	<tr>
        <td colspan="1">{#noparticipants#}</td>
	</tr>

    {/section}
    
    </table>
    
    <form action="index.php" method="post">
		<p>
		<input type="hidden" name="action" value="events" />
		<input type="submit" value="Back to event listing" />
		</p>
	</form>

{ include file="maint_footer.tpl"}