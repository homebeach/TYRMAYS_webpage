

{ include file="maint_header.tpl" header="Event maintenance" }

<p><b>
{$message}
</b><p>

{section name="i" loop=$event}	

<form name="eventForm" action="index.php" method="post">
<input type="hidden" name="action" value="edit_event">
<input type="hidden" name="eventid" value="{$event[i].eventid}">
<table cellpadding="5">

<tr>
<td>Name in English</td>
<td><input type="text" name="eventNameEn" size="80" maxlength="80" 
value="{$event[i].eventnameen}"></td>
</tr>

<tr>
<td>Name in Finnish</td>
<td><input type="text" name="eventNameFi" size="80" maxlength="80"
value="{$event[i].eventnamefi}"></td>
</tr>

<tr>
<td>Description in English</td>
<td><textarea name="eventDescriptionEn" rows="15" cols="61">
{$event[i].eventdescriptionen}
</textarea></td>
</tr>

<tr>
<td>Description in Finnish</td>
<td><textarea name="eventDescriptionFi" rows="15" cols="61">
{$event[i].eventdescriptionfi}
</textarea></td>
</tr>

<tr>
<td>Location</td>
<td><input type="text" name="eventLocation" size="80" maxlength="80" value="{$event[i].eventlocation}"></td>
</tr>

<tr>
<td>Location link (for example from <a href="http://maps.google.fi/">Google Maps</a>)</td>
<td><input type="text" name="eventLocationLink" size="80" maxlength="80" value="{$event[i].eventlocationlink}"></td>
</tr>

<tr>
<td>Link to gallery</td>
<td><input type="text" name="eventGalleryLink" size="80" maxlength="80" value="{$event[i].eventgallerylink}"></td>
</tr>

<tr>
<td>Event start date</td>
<td>
<select name="eventstartday" size="1">
{section name="j" loop=$day}
 <OPTION {if $day[j] eq $eventstartday}SELECTED{/if} VALUE="{$day[j]}">{$day[j]}
{/section}
</select>

<select name="eventstartmonth" size="1">
{section name="j" loop=$month}
 <OPTION {if $month[j] eq $eventstartmonth}SELECTED{/if} VALUE="{$month[j]}">{$month[j]}
{/section}
</select>

<select name="eventstartyear" size="1">
{section name="j" loop=$year}
 <OPTION {if $year[j] eq $eventstartyear}SELECTED{/if} VALUE="{$year[j]}">{$year[j]}
{/section}
</select>
</td>
</tr>

<tr>
<td>Event start time</td>
<td>
<select name="eventstarthour" size="1">
{section name="j" loop=$hour}
 <OPTION  {if $hour[j] eq $eventstarthour}SELECTED{/if} VALUE="{$hour[j]}">{$hour[j]}
{/section}
</select>

<select name="eventstartminute" size="1">
{section name="j" loop=$minute}
 <OPTION {if $minute[j] eq $eventstartminute}SELECTED{/if} VALUE="{$minute[j]}">{$minute[j]}
{/section}
</select>

</td>
</tr>



<tr>
<td>Event end date</td>
<td>
<select name="eventendday" size="1">
{section name="j" loop=$day}
 <OPTION {if $day[j] eq $eventendday}SELECTED{/if} VALUE="{$day[j]}">{$day[j]}
{/section}
</select>

<select name="eventendmonth" size="1">
{section name="j" loop=$month}
 <OPTION {if $month[j] eq $eventendmonth}SELECTED{/if} VALUE="{$month[j]}">{$month[j]}
{/section}
</select>

<select name="eventendyear" size="1">
{section name="j" loop=$year}
 <OPTION {if $year[j] eq $eventendyear}SELECTED{/if} VALUE="{$year[j]}">{$year[j]}
{/section}
</select>
</td>
</tr>

<tr>
<td>Event end time</td>
<td>
<select name="eventendhour" size="1">
{section name="j" loop=$hour}
 <OPTION  {if $hour[j] eq $eventendhour}SELECTED{/if} VALUE="{$hour[j]}">{$hour[j]}
{/section}
</select>

<select name="eventendminute" size="1">
{section name="j" loop=$minute}
 <OPTION {if $minute[j] eq $eventendminute}SELECTED{/if} VALUE="{$minute[j]}">{$minute[j]}
{/section}
</select>

</td>
</tr>




<tr>
<td>
<input type="submit" value="Store">
<td>
</form>


{/section}

<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="events">
<input type="submit" value="Back to event listing">
</form>
<td>
</tr>
</table>


{ include file="footer.tpl"}
