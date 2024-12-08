

{ include file="maint_header.tpl" header="Event maintenance" }

<h2>{$message}</h2>

<form id="eventForm" action="index.php" method="post">
<p><input type="hidden" name="action" value="add_event"/></p>

<table>

<tr>
<td>Name in English</td>
<td><input type="text" name="eventNameEn" size="80" maxlength="80" /></td>
</tr>

<tr>
<td>Name in Finnish</td>
<td><input type="text" name="eventNameFi" size="80" maxlength="80" /></td>
</tr>

<tr>
<td>Description in English</td>
<td><textarea name="eventDescriptionEn"  rows="15" cols="61">
</textarea></td>
</tr>

<tr>
<td>Description in Finnish</td>
<td><textarea name="eventDescriptionFi"  rows="15" cols="61">
</textarea></td>
</tr>

<tr>
<td>Location</td>
<td><input type="text" name="eventLocation" size="80" maxlength="80" /></td>
</tr>

<tr>
<td>Location link (for example from <a href="http://maps.google.fi/">Google Maps</a>)</td>
<td><input type="text" name="eventLocationLink" size="40" maxlength="80" /></td>
</tr>

<tr>
<td>Link to gallery</td>
<td><input type="text" name="eventGalleryLink" size="80" maxlength="80" /></td>
</tr>

<tr>
<td>Event start date</td>
<td>
<select name="eventstartday" size="1">
{section name="j" loop=$day}
 <option value="{$day[j]}">{$day[j]}</option>
{/section}
</select>

<select name="eventstartmonth" size="1">
{section name="j" loop=$month}
 <option value="{$month[j]}">{$month[j]}</option>
{/section}
</select>

<select name="eventstartyear" size="1">
{section name="j" loop=$year}
 <option value="{$year[j]}">{$year[j]}</option>
{/section}
</select>
</td>
</tr>

<tr>
<td>Event start time</td>
<td>
<select name="eventstarthour" size="1">
{section name="j" loop=$hour}
 <option value="{$hour[j]}">{$hour[j]}</option>
{/section}
</select>

<select name="eventstartminute" size="1">
{section name="j" loop=$minute}
 <option value="{$minute[j]}">{$minute[j]}</option>
{/section}
</select>
</td>
</tr>


<tr>
<td>Event end date</td>
<td>
<select name="eventendday" size="1">
{section name="j" loop=$day}
 <option value="{$day[j]}">{$day[j]}</option>
{/section}
</select>

<select name="eventendmonth" size="1">
{section name="j" loop=$month}
 <option value="{$month[j]}">{$month[j]}</option>
{/section}
</select>

<select name="eventendyear" size="1">
{section name="j" loop=$year}
 <option value="{$year[j]}">{$year[j]}</option>
{/section}
</select>
</td>
</tr>

<tr>
<td>Event end time</td>
<td>
<select name="eventendhour" size="1">
{section name="j" loop=$hour}
 <option value="{$hour[j]}">{$hour[j]}</option>
{/section}
</select>

<select name="eventendminute" size="1">
{section name="j" loop=$minute}
 <option value="{$minute[j]}">{$minute[j]}</option>
{/section}
</select>
</td>
</tr>

</table>

<p><input type="submit" value="Store" /></p>

</form>



<form action="index.php" method="post">
<p><input type="hidden" name="action" value="events" />
<input type="submit" value="Back to event listing" /></p>
</form>



{ include file="maint_footer.tpl"}
