

{ include file="header.tpl" }


{if $lang eq fi}
<div id="heading"><a> {$event[0].eventnamefi} </a>  </div>
{else}
<div id="heading"><a> {$event[0].eventnameen} </a>  </div>
{/if}

<br />

<table>
    {section name="i" loop=$event}
    {if $smarty.section.i.first}

	
    {/if}


    {if $lang eq fi}
		<tr>
			<td colspan="3"><p>{$event[i].eventdescriptionfi}</p></td>
		</tr>
		
		<tr>
    	{if $event[i].eventlocationlink}
    		<td><span class="event">{#eventlocation#}: <a href="{$event[i].eventlocationlink}">{$event[i].eventlocation}</a></span></td>
		{else}
			<td><span class="event">{#eventlocation#}: {$event[i].eventlocation}</span></td>
    	{/if}
		</tr>

		<tr>
			<td colspan="3"><span class="event">{#eventstart#}: {$event[i].eventstartdatetime|date_format:"%d.%m.%Y %H:%M"}</span></td>
		</tr>
		<tr>
			<td colspan="3"><span class="event">{#eventend#}: {$event[i].eventenddatetime|date_format:"%d.%m.%Y %H:%M"}</span></td>
		</tr>
		{if $studentnumber ne '' && $futureevent eq 'true'}
		<tr>
			{if $enrolled eq 'false'}
			
				{if $eventfull eq 'true'}
					<td colspan="3"><span class="event">{#eventfull#}</span></td>
				{else}
	    			<td colspan="3">
	    				<p><{#enroll#}</p>
		    			<form action="index.php" method="post">
						<p>
							<input type="hidden" name="action" value="enroll" />	    			
			    			<input type="hidden" name="lang" value="{$lang}" />
			    			<input type="hidden" name="details" value="details" />
			    			<input type="hidden" name="eventid" value="{$event[i].eventid}" />
			    			<input type="hidden" name="studentnumber" value="{$studentnumber}" />
			    			{#eventcomments#}
			    			<br />    			
			    			<textarea name="comments" rows="5" cols="61"></textarea>
			    			<br />
			    			<input type="submit" value="{#enroll#}" />
		    			</p>
		    			</form>
	    			</td>
	    		{/if}
	    		
			{else}
					<td colspan="3"><p>{#enrolled#} <br /> <a href="index.php?action=leave&amp;lang={$lang}&amp;details=details&amp;eventid={$event[i].eventid}">{#leaveevent#}</a></p></td>
	    	{/if}
			</tr>
			<tr>
				<td colspan="3"><span class="event"><a href="index.php?action=participants&amp;lang={$lang}&amp;details=details&amp;eid={$event[i].eventid}">{#participants#}</a></span></td>
			</tr>
		</tr>
	    {/if}
    {else}
		<tr>
			<td colspan="3"><p>{$event[i].eventdescriptionen}</p></td>
		</tr>
		
		<tr>    
    	{if $event[i].eventlocationlink}
    		<td><span class="event">{#eventlocation#}: <a href="{$event[i].eventlocationlink}">{$event[i].eventlocation}</a></span></td>
		{else}
			<td><span class="event">{#eventlocation#}: {$event[i].eventlocation}</span></td>
    	{/if}
		</tr>

		<tr>
			<td colspan="3"><span class="event">{#eventstart#}: {$event[i].eventstartdatetime|date_format:"%d.%m.%Y %H:%M"}</span></td>
		</tr>
		
		<tr>
			<td colspan="3"><span class="event">{#eventend#}: {$event[i].eventenddatetime|date_format:"%d.%m.%Y %H:%M"}</span></td>
		</tr>
		{if $studentnumber ne '' && $futureevent eq 'true'}
			<tr>
			{if $enrolled eq 'false'}
			
	    		{if $eventfull eq 'true'}
					<td colspan="3"><span class="event">{#eventfull#}</span></td>
				{else}
	    			<td colspan="3">
	    				<p><{#enroll#}</p>
		    			<form action="index.php" method="post">
						<p>
							<input type="hidden" name="action" value="enroll" />	    			
			    			<input type="hidden" name="lang" value="{$lang}" />
			    			<input type="hidden" name="details" value="details" />
			    			<input type="hidden" name="eventid" value="{$event[i].eventid}" />
			    			<input type="hidden" name="studentnumber" value="{$studentnumber}" />
			    			{#eventcomments#}
			    			<br />    			
			    			<textarea name="comments" rows="5" cols="61"></textarea>
			    			<br />
			    			<input type="submit" value="{#enroll#}" />
		    			</p>
		    			</form>
	    			</td>
	    		{/if}
	    		
			{else}
				<td colspan="3"><p>{#enrolled#} <br /> <a href="index.php?action=leave&amp;lang={$lang}&amp;details=details&amp;eventid={$event[i].eventid}">{#leaveevent#}</a></p></td>
	    	{/if}

			</tr>
			<tr>
				<td colspan="3"><span class="event"><a href="index.php?action=participants&amp;lang={$lang}&amp;details=details&amp;eid={$event[i].eventid}">{#participants#}</a></span></td>
			</tr>
    	{/if}
	{/if}
    
    {sectionelse}
        <tr>
            <td colspan="3">{#noevents#}</td>
        </tr>
    {/section}
</table>




{ include file="footer.tpl"}

