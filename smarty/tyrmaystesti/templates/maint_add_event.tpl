

{ include file="maint_header.tpl" header="Event maintenance" }

<p><b>
{$message}
</b><p>


<form name="eventForm" action="index.php" method="post">
<input type="hidden" name="action" value="add_event"/>

<table cellpadding="5">

<tr>
<td>Name in English</td>
<td><input type="text" name="eventNameEn" size="80" maxlength="80" ></td>
</tr>

<tr>
<td>Name in Finnish</td>
<td><input type="text" name="eventNameFi" size="80" maxlength="80"></td>
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
<td><input type="text" name="eventLocation" size="80" maxlength="80"></td>
</tr>

<tr>
<td>Location link (for example from <a href="http://maps.google.fi/">Google Maps</a>)</td>
<td><input type="text" name="eventLocationLink" size="40" maxlength="80"></td>
</tr>

<tr>
<td>Link to gallery</td>
<td><input type="text" name="eventGalleryLink" size="80" maxlength="80"></td>
</tr>

<tr>
<td>Event start date</td>
<td>
<select name="eventstartday" size="1">
{section name="j" loop=$day}
 <OPTION  VALUE="{$day[j]}">{$day[j]}
{/section}
</select>

<select name="eventstartmonth" size="1">
{section name="j" loop=$month}
 <OPTION  VALUE="{$month[j]}">{$month[j]}
{/section}
</select>

<select name="eventstartyear" size="1">
{section name="j" loop=$year}
 <OPTION  VALUE="{$year[j]}">{$year[j]}
{/section}
</select>
</td>
</tr>

<tr>
<td>Event start time</td>
<td>
<select name="eventstarthour" size="1">
{section name="j" loop=$hour}
 <OPTION  VALUE="{$hour[j]}">{$hour[j]}
{/section}
</select>

<select name="eventstartminute" size="1">
{section name="j" loop=$minute}
 <OPTION  VALUE="{$minute[j]}">{$minute[j]}
{/section}
</select>
</td>
</tr>


<tr>
<td>Event end date</td>
<td>
<select name="eventendday" size="1">
{section name="j" loop=$day}
 <OPTION  VALUE="{$day[j]}">{$day[j]}
{/section}
</select>

<select name="eventendmonth" size="1">
{section name="j" loop=$month}
 <OPTION  VALUE="{$month[j]}">{$month[j]}
{/section}
</select>

<select name="eventendyear" size="1">
{section name="j" loop=$year}
 <OPTION  VALUE="{$year[j]}">{$year[j]}
{/section}
</select>
</td>
</tr>

<tr>
<td>Event end time</td>
<td>
<select name="eventendhour" size="1">
{section name="j" loop=$hour}
 <OPTION  VALUE="{$hour[j]}">{$hour[j]}
{/section}
</select>

<select name="eventendminute" size="1">
{section name="j" loop=$minute}
 <OPTION  VALUE="{$minute[j]}">{$minute[j]}
{/section}
</select>
</td>
</tr>


<tr>
<td>
<input type="submit" value="Store">
<td>
</form>


<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="events">
<input type="submit" value="Back to event listing">
</form>
<td>
</tr>
</table>


{ include file="footer.tpl"}
