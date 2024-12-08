

{ include file="maint_header.tpl" header="Event maintenance" }

<h1>TYRMÄYS Events</h1>

<form action="index.php" method="post">
<p><input type="hidden" name="action" value="add_event_form"/>
<input type="submit" value="Add Event"/></p>
</form>


<table border="1">
    {section name="i" loop=$events}	
    {if $smarty.section.i.first}
    	<tr>
			<th>Event id</th><th>Event start date and time</th><th>Event end date and time</th><th>Event name en</th><th>Event name fi</th><th>Event description en</th><th>Event description fi</th><th>Gallery link</th><th>Location</th><th>Location link</th>
   		</tr>	
    {/if}
    	<tr>
			<td>{$events[i].eventid}</td>
			<td>{$events[i].eventstartdatetime|date_format:"%d.%m.%Y %H:%M"}</td>
			<td>{$events[i].eventenddatetime|date_format:"%d.%m.%Y %H:%M"}</td>
			<td>{$events[i].eventnameen}</td>
			<td>{$events[i].eventnamefi}</td>
			<td>{$events[i].eventdescriptionen}</td>
			<td>{$events[i].eventdescriptionfi}</td>
			<td>{$events[i].eventgallerylink}</td>
			<td>{$events[i].eventlocation}</td>
			<td>{$events[i].eventlocationlink}</td>
			<td>
				<form action="index.php" method="post">
            		<p><input type="hidden" name="action" value="maint_participants"/>
            		<input type="hidden" name="eventid" value="{$events[i].eventid}"/>
	    			<input type="submit" value="Participants" /></p>
	    		</form>
	    	</td>
			<td>
				<form action="index.php" method="post">
            		<p><input type="hidden" name="action" value="edit_event_form"/>
            		<input type="hidden" name="eventid" value="{$events[i].eventid}"/>
	    			<input type="submit" value="Edit" /></p>
	    		</form>
	    	</td>
			<td>
				<form action="index.php" method="post">
            		<p><input type="hidden" name="action" value="delete_event"/>
            		<input type="hidden" name="eventid" value="{$events[i].eventid}"/>
	   	 			<input type="submit" onclick="return confirm('Really remove?');" value="Delete" /></p>
	    		</form>
			</td>

    	</tr>
    {sectionelse}
        <tr>
            <td colspan="3">No events</td>
        </tr>
    {/section}
</table>

<form action="index.php" method="post">
	<p>
	<input type="hidden" name="action" value="main"/>
	<input type="submit" value="Back to main menu"/>
	</p>
</form>


{ include file="maint_footer.tpl"}

