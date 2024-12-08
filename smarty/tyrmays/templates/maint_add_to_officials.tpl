

{ include file="maint_header.tpl" header="Add member to officials" }

Add {$member[0].first_name} {$member[0].surname} {$member[0].other_names} to officials.

<form name="eventForm" action="index.php" method="post">
<input type="hidden" name="action" value="add_to_officials"/>
<input type="hidden" name="studentnumber" value="{$member[0].studentnumber}"/>
<table cellpadding="5">

<tr>
<td>Status in English</td>
<td><input type="text" name="statusEn" size="40" maxlength="80" ></td>
</tr>

<tr>
<td>Status in Finnish</td>
<td><input type="text" name="statusFi" size="40" maxlength="80" ></td>
</tr>

<tr>
<td>Year</td>
<td>
<select name="officialsyear" size="1">

    {section name="i" loop=$years}

 		<OPTION VALUE="{$years[i]}"> {$years[i]}

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
<input type="hidden" name="action" value="members">
<input type="submit" value="Back to members listing">
</form>
<td>
</tr>
</table>


{ include file="maint_footer.tpl"}
