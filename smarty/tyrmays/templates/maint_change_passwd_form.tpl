

{ include file="maint_header.tpl" header="Change password" }

<h1>Please give a new password to user {$member[0].first_name} {$member[0].surname}</h1>

<h3>{$message}</h3>

<table cellpadding="5">

<form name="changePasswdForm" action="index.php" method="post">
<input type="hidden" name="action" value="change_passwd" />
<input type="hidden" name="studentnumber" value="{$member[0].studentnumber}" />


<tr>
<td>New password</td>
<td><input type="password" name="newPasswd1" /></td>
</tr>

<tr>
<td>New password again</td>
<td><input type="password" name="newPasswd2" /></td>
</tr>

<tr>
<td>
<input type="submit" value="Change password" />
<td>
</form>

<td>

<br>

<form action="index.php" method="post">
<input type="hidden" name="action" value="members" />
<input type="submit" value="Back to members maintenance" />
</form>

</table>


{ include file="maint_footer.tpl"}
