

{ include file="maint_header.tpl" header="Event maintenance" }

<h1>TYRMÄYS Events</h1>

<form action="index.php" method="post">
<input type="hidden" name="action" value="add_event_form"/>
<input type="submit" value="Add Event"/>
</form>


<table border=1>
    {section name="i" loop=$events}	
    {if $smarty.section.i.first}
    	<tr>
			<td><b>Event id</b></td><td><b>Event start date and time</b></td><td><b>Event end date and time</b></td><td><b>Event name en</b></td><td><b>Event name fi</b></td><td><b>Event description en</b></td><td><b>Event description fi</b></td><td><b>Gallery link</b></td><td><b>Location</b></td><td><b>Location link</b></td>
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
			<td><form action="index.php" method="post">
            		<input type="hidden" name="action" value="edit_event_form"/>
            		<input type="hidden" name="eventid" value="{$events[i].eventid}"/>
	    			<input type="submit" value="Edit" />
	    		</form>
	    	</td>
			<td><form action="index.php" method="post">
            		<input type="hidden" name="action" value="delete_event"/>
            		<input type="hidden" name="eventid" value="{$events[i].eventid}"/>
	   	 			<input type="submit" onclick="return confirm('Really remove?');" value="Delete" />
	    		</form>
			</td>

    	</tr>
    {sectionelse}
        <tr>
            <td colspan="3">No events</td>
        </tr>
    {/section}
</table>

<br>

<form action="index.php" method="post">
<input type="hidden" name="action" value="main"/>
<input type="submit" value="Back to main menu"/>
</form>


{ include file="footer.tpl"}

