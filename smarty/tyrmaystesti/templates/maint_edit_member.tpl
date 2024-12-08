

{ include file="maint_header.tpl" header="Member edit" }

<h1>Edit member</h1>

{section name="i" loop=$member}

<form name="newsForm" action="index.php" method="post">
<input type="hidden" name="action" value="edit_member"/>
<table cellpadding="5">

<tr>
<td>First name</td>
<td><input type="text" name="firstname" size="40" maxlength="40" value="{$member[i].first_name}" /> </td>
</tr>

<tr>
<td>Surname</td>
<td><input type="text" name="surname" size="40" maxlength="50" value="{$member[i].surname}" /> </td>
</tr>

<tr>
<td>Other names</td>
<td><input type="text" name="othernames" size="40" maxlength="50" value="{$member[i].other_names}" /> </td>
</tr>

<tr>
<td>Phone</td>
<td><input type="text" name="phone" size="40" maxlength="40" value="{$member[i].phone}" /></td>
</tr>

<tr>
<td>E-Mail</td>
<td><input type="text" name="email" size="40" maxlength="40" value="{$member[i].email}" /></td>
</tr>


<input type="hidden" name="studentnumber" size="40" maxlength="40" value="{$member[i].studentnumber}" />


<tr>
<td>Major</td>
<td>
<SELECT NAME="majorid">
{section name="j" loop=$majors}
	<OPTION {if $majors[j].majorid eq $member[i].majorid}SELECTED{/if} VALUE="{$majors[j].majorid}">{$majors[j].majorfi}
{/section}
</SELECT>
</td>
</tr>

<tr>
<td>Membership request date </td>
<td>
<select name="requestday" size="1">
	{section name="dayloop" start=1 loop=32}

 		<OPTION {if $smarty.section.dayloop.index eq $membership_requestedday}SELECTED{/if} VALUE={$smarty.section.dayloop.index}> {$smarty.section.dayloop.index}

	{/section}
</select>

<select name="requestmonth" size="1">
	{section name="monthloop" start=1 loop=13}

 		<OPTION {if $smarty.section.monthloop.index eq $membership_requestedmonth}SELECTED{/if} VALUE={$smarty.section.monthloop.index}> {$smarty.section.monthloop.index}

	{/section}
</select>

<select name="requestyear" size="1">
	{section name="yearloop" start=2007 loop=2011}

 		<OPTION {if $smarty.section.yearloop.index eq $membership_requestedyear}SELECTED{/if} VALUE={$smarty.section.yearloop.index}> {$smarty.section.yearloop.index}

	{/section}
</select>

</td>
</tr>

<tr>
<td>Membership request time</td>
<td>

<select name="requesthour" size="1">
	{section name="hourloop" start=00 loop=24}

 		<OPTION {if $smarty.section.hourloop.index eq $membership_requestedhour}SELECTED{/if} VALUE={$smarty.section.hourloop.index}> {$smarty.section.hourloop.index}

	{/section}
</select>

<select name="requestminute" size="1">
	{section name="minuteloop" start=00 loop=60}

 		<OPTION {if $smarty.section.minuteloop.index eq $membership_requestedminute}SELECTED{/if} VALUE={$smarty.section.minuteloop.index}> {$smarty.section.minuteloop.index}

	{/section}
</select>

</td>
</tr>

<tr>
<td>Membership last paid date</td>
<td>
<select name="payday" size="1">
	{section name="dayloop" start=1 loop=32}

 		<OPTION {if $smarty.section.dayloop.index eq $membership_last_paidday}SELECTED{/if} VALUE={$smarty.section.dayloop.index}> {$smarty.section.dayloop.index}

	{/section}
</select>

<select name="paymonth" size="1">
	{section name="monthloop" start=1 loop=13}

 		<OPTION {if $smarty.section.monthloop.index eq $membership_last_paidmonth}SELECTED{/if} VALUE={$smarty.section.monthloop.index}> {$smarty.section.monthloop.index}

	{/section}
</select>

<select name="payyear" size="1">
	{section name="yearloop" start=2007 loop=2011}

 		<OPTION {if $smarty.section.yearloop.index eq $membership_last_paidyear}SELECTED{/if} VALUE={$smarty.section.yearloop.index}> {$smarty.section.yearloop.index}

	{/section}
</select>

</td>
</tr>

<tr>
<td>Membership last paid time</td>
<td>

<select name="payhour" size="1">
	{section name="hourloop" start=00 loop=24}

 		<OPTION {if $smarty.section.hourloop.index eq $membership_last_paidhour}SELECTED{/if} VALUE={$smarty.section.hourloop.index}> {$smarty.section.hourloop.index}

	{/section}
</select>

<select name="payminute" size="1">
	{section name="minuteloop" start=00 loop=60}

 		<OPTION {if $smarty.section.minuteloop.index eq $membership_last_paidminute}SELECTED{/if} VALUE={$smarty.section.minuteloop.index}> {$smarty.section.minuteloop.index}

	{/section}
</select>

</td>
</tr>

<tr>
<td>Membership paid</td>
<td>
<SELECT NAME="membership_paid">
<OPTION {if ($member[i].membership_paid == 1)}SELECTED{/if} VALUE="1">Yes
<OPTION {if ($member[i].membership_paid == 0)}SELECTED{/if} VALUE="0">No
</SELECT>
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
<td><input type="text" name="ircnick" size="20" maxlength="20" value="{$member[i].ircnick}" /> </td>
</tr>

<tr>
<td>MSN Messenger</td>
<td><input type="text" name="msnmessenger" size="40" maxlength="40" value="{$member[i].msn_messenger}" /> </td>
</tr>

<tr>
<td>Other Instant Messengers</td>
<td><input type="text" name="otherims" size="40" maxlength="100" value="{$member[i].other_ims}" /> </td>
</tr>

<tr>
<td>Picture</td>
<td><input type="text" name="picture" size="40" maxlength="40" value="{$member[i].picture}" /></td>
</tr>

<tr>
<td>Free comments in English</td>
<td><textarea name="commentsen" rows="15" cols="61">{$member[i].commentsen}</textarea> </td>
</tr>

<tr>
<td>Free comments in Finnish</td>
<td><textarea name="commentsfi" rows="15" cols="61">{$member[i].commentsfi}</textarea> </td>
</tr>

<tr>
<td>
<input type="submit" value="Store">
</td>
</tr>
</form>

    {sectionelse}
        <tr>
            <td colspan="3">Member not found</td>
        </tr>
    {/section}

<tr>
<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="members">
<input type="submit" value="Back to members listing">
</form>
</td>
</tr>


</table>


{ include file="footer.tpl"}
