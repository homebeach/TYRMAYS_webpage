

{ include file="maint_header.tpl" header="Event maintenance" }

<h2>{$message}</h2>

{section name="i" loop=$event}	

<form id="eventForm" action="index.php" method="post">
<p><input type="hidden" name="action" value="edit_event" />
<input type="hidden" name="eventid" value="{$event[i].eventid}" /></p>
<table>

<tr>
<td>Name in English</td>
<td><input type="text" name="eventNameEn" size="80" maxlength="80" 
value="{$event[i].eventnameen}" /></td>
</tr>

<tr>
<td>Name in Finnish</td>
<td><input type="text" name="eventNameFi" size="80" maxlength="80"
value="{$event[i].eventnamefi}" /></td>
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
<td><input type="text" name="eventLocation" size="80" maxlength="80" value="{$event[i].eventlocation}" /></td>
</tr>

<tr>
<td>Location link (for example from <a href="http://maps.google.fi/">Google Maps</a>)</td>
<td><input type="text" name="eventLocationLink" size="80" maxlength="80" value="{$event[i].eventlocationlink}" /></td>
</tr>

<tr>
<td>Link to gallery</td>
<td><input type="text" name="eventGalleryLink" size="80" maxlength="80" value="{$event[i].eventgallerylink}" /></td>
</tr>

<tr>
<td>Event start date</td>
<td>
<select name="eventstartday" size="1">
{section name="j" loop=$day}
 <option value="{$day[j]}" {if $day[j] eq $eventstartday}selected="selected"{/if}>{$day[j]}</option>
{/section}
</select>

<select name="eventstartmonth" size="1">
{section name="j" loop=$month}
 <option value="{$month[j]}" {if $month[j] eq $eventstartmonth}selected="selected"{/if}>{$month[j]}</option>
{/section}
</select>

<select name="eventstartyear" size="1">
{section name="j" loop=$year}
 <option value="{$year[j]}" {if $year[j] eq $eventstartyear}selected="selected"{/if}>{$year[j]}</option>
{/section}
</select>
</td>
</tr>

<tr>
<td>Event start time</td>
<td>
<select name="eventstarthour" size="1">
{section name="j" loop=$hour}
 <option value="{$hour[j]}" {if $hour[j] eq $eventstarthour}selected="selected"{/if}>{$hour[j]}</option>
{/section}
</select>

<select name="eventstartminute" size="1">
{section name="j" loop=$minute}
 <option value="{$minute[j]}" {if $minute[j] eq $eventstartminute}selected="selected"{/if}>{$minute[j]}</option>
{/section}
</select>

</td>
</tr>

<tr>
<td>Event end date</td>
<td>
<select name="eventendday" size="1">
{section name="j" loop=$day}
 <option value="{$day[j]}" {if $day[j] eq $eventendday}selected="selected"{/if}>{$day[j]}</option>
{/section}
</select>

<select name="eventendmonth" size="1">
{section name="j" loop=$month}
 <option value="{$month[j]}" {if $month[j] eq $eventendmonth}selected="selected"{/if}>{$month[j]}</option>
{/section}
</select>

<select name="eventendyear" size="1">
{section name="j" loop=$year}
 <option value="{$year[j]}" {if $year[j] eq $eventendyear}selected="selected"{/if}>{$year[j]}</option>
{/section}
</select>
</td>
</tr>

<tr>
<td>Event end time</td>
<td>
<select name="eventendhour" size="1">
{section name="j" loop=$hour}
 <option value="{$hour[j]}" {if $hour[j] eq $eventendhour}selected="selected"{/if}>{$hour[j]}</option>
{/section}
</select>

<select name="eventendminute" size="1">
{section name="j" loop=$minute}
 <option value="{$minute[j]}" {if $minute[j] eq $eventendminute}selected="selected"{/if}>{$minute[j]}</option>
{/section}
</select>

</td>
</tr>

</table>

<p><input type="submit" value="Store" /></p>

</form>

{/section}

<form action="index.php" method="post">
<p><input type="hidden" name="action" value="events" />
<input type="submit" value="Back to event listing" /></p>
</form>

{ include file="maint_footer.tpl"}
