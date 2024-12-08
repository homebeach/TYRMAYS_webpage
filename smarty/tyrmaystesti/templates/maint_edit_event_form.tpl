

{ include file="maint_header.tpl" header="Event maintenance" }

<p><b>
{$message}
</b><p>

{section name="i" loop=$event}	

<form name="eventForm" action="index.php" method="post">
<input type="hidden" name="action" value="edit_event"/>
<input type="hidden" name="eventid" value="{$event[i].eventid}"/>
<table cellpadding="5">

<tr>
<td>Name in English</td>
<td><input type="text" name="eventNameEn" size="40" maxlength="80" 
value="{$event[i].eventnameen}"></td>
</tr>

<tr>
<td>Name in Finnish</td>
<td><input type="text" name="eventNameFi" size="40" maxlength="80"
value="{$event[i].eventnamefi}"></td>
</tr>

<tr>
<td>Description in English</td>
<td><textarea name="eventDescriptionEn" size="80" maxlength="80">
{$event[i].eventdescriptionen}
</textarea></td>
</tr>

<tr>
<td>Description in Finnish</td>
<td><textarea name="eventDescriptionFi" size="80" maxlength="80">
{$event[i].eventdescriptionfi}
</textarea></td>
</tr>

<tr>
<td>Link to gallery</td>
<td><input type="text" name="eventGalleryLink" size="80" maxlength="80"
value="{$event[i].eventgallerylink}"></td>
</tr>

<tr>
<td>Event date</td>
<td><input type="text" name="eventDate" size="20" maxlength="20"
    value="{$event[i].eventdate|date_format:"%d-%m-%Y "}">
</td>
</tr>

<tr>
<td>Event time</td>
<td><input type="text" name="eventTime" size="20" maxlength="20"    value="{$event[i].eventtime}">
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
<input type="hidden" name="action" value="events"/>
<input type="submit" value="Back to event listing">
</form>
<td>
</tr>
</table>


{ include file="footer.tpl"}
