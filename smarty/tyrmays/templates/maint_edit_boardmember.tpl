

{ include file="maint_header.tpl" header="Board member edit" }

<h1>Edit board member</h1>

{section name="i" loop=$boardmember}

<form name="newsForm" action="index.php" method="post">
<input type="hidden" name="action" value="edit_boardmember">
<table cellpadding="5">

<tr>
<td>Name</td>
<td><input type="text" name="name" size="40" maxlength="300" value="{$boardmember[i].name}"></td>
</tr>

<tr>
<td>Phone</td>
<td><input type="text" name="phone" size="40" maxlength="300" value="{$boardmember[i].phone}"></td>
</tr>

<tr>
<td>E-Mail</td>
<td><input type="text" name="email" size="40" maxlength="300" value="{$boardmember[i].email}"></td>
</tr>

<input type="hidden" name="studentnumber" size="40" maxlength="300" value="{$boardmember[i].studentnumber}">


<tr>
<td>Marjor subject</td>
<td><input type="text" name="major_subject" size="40" maxlength="300" value="{$boardmember[i].major_subject}"></td>
</tr>

<tr>
<td>Membership paid</td>
<td>
<SELECT NAME="membership_paid">
<OPTION {if ($boardmember[i].membership_paid == 1)}SELECTED{/if} VALUE="1">Yes
<OPTION {if ($boardmember[i].membership_paid == 0)}SELECTED{/if} VALUE="0">No
</SELECT>
</td>
</tr>

<tr>
<td>Favourite band 1</td>
<td><input type="text" name="band1" size="40" maxlength="300" value="{$boardmember[i].band1}"></td>
</tr>

<tr>
<td>Favourite band 2</td>
<td><input type="text" name="band2" size="40" maxlength="300" value="{$boardmember[i].band2}"></td>
</tr>

<tr>
<td>Favourite band 3</td>
<td><input type="text" name="band3" size="40" maxlength="300" value="{$boardmember[i].band3}"></td>
</tr>

<tr>
<td>Status</td>
<td><input type="text" name="status" size="40" maxlength="300" value="{$boardmember[i].status}"></td>
</tr>

<tr>
<td>Picture</td>
<td><input type="text" name="picture" size="40" maxlength="300" value="{$boardmember[i].picture}"></td>
</tr>

<tr>
<td>IRC-nick</td>
<td><input type="text" name="ircnick" size="40" maxlength="300" value="{$boardmember[i].ircnick}"></td>
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

    {sectionelse}
        <tr>
            <td colspan="3">Boardmember not found</td>
        </tr>
    {/section}

</table>


{ include file="maint_footer.tpl"}
