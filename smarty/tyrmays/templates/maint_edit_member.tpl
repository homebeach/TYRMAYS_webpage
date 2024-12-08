

{ include file="maint_header.tpl" header="Edit member" }

<h1>Edit member</h1>

{section name="i" loop=$member}

<form id="editMemberForm" action="index.php" method="post">
<p><input type="hidden" name="action" value="edit_member" /></p>
<p><input type="hidden" name="studentnumber" size="40" maxlength="40" value="{$member[i].studentnumber}" /></p>

<table>

<tr>
<td>First name</td>
<td><input type="text" name="firstname" size="40" maxlength="40" value="{$member[i].first_name}" /></td>
</tr>

<tr>
<td>Surname</td>
<td><input type="text" name="surname" size="40" maxlength="50" value="{$member[i].surname}" /></td>
</tr>

<tr>
<td>Other names</td>
<td><input type="text" name="othernames" size="40" maxlength="50" value="{$member[i].other_names}" /></td>
</tr>

<tr>
<td>Phone</td>
<td><input type="text" name="phone" size="40" maxlength="40" value="{$member[i].phone}" /></td>
</tr>

<tr>
<td>E-Mail</td>
<td><input type="text" name="email" size="40" maxlength="40" value="{$member[i].email}" /></td>
</tr>

<tr>
<td>Major</td>
<td>
<select name="majorid">
{section name="j" loop=$majors}
	<option value="{$majors[j].majorid}" {if $majors[j].majorid eq $member[i].majorid}selected="selected"{/if}>{$majors[j].majorfi}</option>
{/section}
</select>
</td>
</tr>

<tr>
<td>Membership request date </td>
<td>
<select name="requestday" size="1">
	{section name="dayloop" start=1 loop=32}

 		<option value="{$smarty.section.dayloop.index}" {if $smarty.section.dayloop.index eq $membership_requestedday}selected="selected"{/if}>{$smarty.section.dayloop.index}</option>

	{/section}
</select>

<select name="requestmonth" size="1">
	{section name="monthloop" start=1 loop=13}

 		<option value="{$smarty.section.monthloop.index}" {if $smarty.section.monthloop.index eq $membership_requestedmonth}selected="selected"{/if}>{$smarty.section.monthloop.index}</option>

	{/section}
</select>

<select name="requestyear" size="1">
	{section name="yearloop" start=2007 loop=2011}

 		<option value="{$smarty.section.yearloop.index}" {if $smarty.section.yearloop.index eq $membership_requestedyear}selected="selected"{/if}>{$smarty.section.yearloop.index}</option>

	{/section}
</select>

</td>
</tr>

<tr>
<td>Membership request time</td>
<td>

<select name="requesthour" size="1">
	{section name="hourloop" start=00 loop=24}

 		<option value="{$smarty.section.hourloop.index}" {if $smarty.section.hourloop.index eq $membership_requestedhour}selected="selected"{/if}>{$smarty.section.hourloop.index}</option>

	{/section}
</select>

<select name="requestminute" size="1">
	{section name="minuteloop" start=00 loop=60}

 		<option value="{$smarty.section.minuteloop.index}" {if $smarty.section.minuteloop.index eq $membership_requestedminute}selected="selected"{/if}>{$smarty.section.minuteloop.index}</option>

	{/section}
</select>

</td>
</tr>

<tr>
<td>Membership last paid date</td>
<td>
<select name="payday" size="1">
	{section name="dayloop" start=1 loop=32}

 		<option value="{$smarty.section.dayloop.index}" {if $smarty.section.dayloop.index eq $membership_last_paidday}selected="selected"{/if}>{$smarty.section.dayloop.index}</option>

	{/section}
</select>

<select name="paymonth" size="1">
	{section name="monthloop" start=1 loop=13}

 		<option value="{$smarty.section.monthloop.index}" {if $smarty.section.monthloop.index eq $membership_last_paidmonth}selected="selected"{/if}>{$smarty.section.monthloop.index}</option>

	{/section}
</select>

<select name="payyear" size="1">
	{section name="yearloop" start=2007 loop=2011}

 		<option value="{$smarty.section.yearloop.index}" {if $smarty.section.yearloop.index eq $membership_last_paidyear}selected="selected"{/if}>{$smarty.section.yearloop.index}</option>

	{/section}
</select>

</td>
</tr>

<tr>
<td>Membership last paid time</td>
<td>

<select name="payhour" size="1">
	{section name="hourloop" start=00 loop=24}

 		<option value="{$smarty.section.hourloop.index}" {if $smarty.section.hourloop.index eq $membership_last_paidhour}selected="selected"{/if}>{$smarty.section.hourloop.index}</option>

	{/section}
</select>

<select name="payminute" size="1">
	{section name="minuteloop" start=00 loop=60}

 		<option value="{$smarty.section.minuteloop.index}" {if $smarty.section.minuteloop.index eq $membership_last_paidminute}selected="selected"{/if}>{$smarty.section.minuteloop.index}</option>

	{/section}
</select>

</td>
</tr>

<tr>
<td>Membership paid</td>
<td>
<select name="membership_paid">
<option {if ($member[i].membership_paid == 1)}selected="selected"{/if} value="1">Yes</option>
<option {if ($member[i].membership_paid == 0)}selected="selected"{/if} value="0">No</option>
</select>
</td>
</tr>

<tr>
<td>Favourite band 1</td>
<td><input type="text" name="band1" size="40" maxlength="40" value="{$member[i].band1}" /></td>
</tr>

<tr>
<td>Favourite band 2</td>
<td><input type="text" name="band2" size="40" maxlength="40" value="{$member[i].band2}" /></td>
</tr>

<tr>
<td>Favourite band 3</td>
<td><input type="text" name="band3" size="40" maxlength="40" value="{$member[i].band3}" /></td>
</tr>

<tr>
<td>IRC-nick</td>
<td><input type="text" name="ircnick" size="20" maxlength="20" value="{$member[i].ircnick}" /></td>
</tr>

<tr>
<td>MSN Messenger</td>
<td><input type="text" name="msnmessenger" size="40" maxlength="40" value="{$member[i].msn_messenger}" /></td>
</tr>

<tr>
<td>Other Instant Messengers</td>
<td><input type="text" name="otherims" size="40" maxlength="100" value="{$member[i].other_ims}" /></td>
</tr>

<tr>
<td>Picture</td>
<td><input type="text" name="picture" size="40" maxlength="40" value="{$member[i].picture}" /></td>
</tr>

<tr>
<td>Free comments in English</td>
<td><textarea name="commentsen" rows="15" cols="61">{$member[i].commentsen}</textarea></td>
</tr>

<tr>
<td>Free comments in Finnish</td>
<td><textarea name="commentsfi" rows="15" cols="61">{$member[i].commentsfi}</textarea></td>
</tr>
</table>

<p><input type="submit" value="Store" /></p>

</form>

{sectionelse}

    <p>Member not found</p>

{/section}

<form action="index.php" method="post">
<p>
<input type="hidden" name="action" value="members" />
<input type="submit" value="Back to members listing" />
</p>
</form>


{ include file="maint_footer.tpl"}
