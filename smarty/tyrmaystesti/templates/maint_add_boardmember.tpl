

{ include file="maint_header.tpl" header="Board member insertion" }

<h1>Insert board member</h1>

<form name="newsForm" action="index.php" method="post">
<input type="hidden" name="action" value="add_boardmember"/>
<table cellpadding="5">

<tr>
<td>First name</td>
<td><input type="text" name="firstname" size="40" maxlength="40"/> </td>
</tr>

<tr>
<td>Surname</td>
<td><input type="text" name="surname" size="40" maxlength="50"/> </td>
</tr>

<tr>
<td>Other names</td>
<td><input type="text" name="other_names" size="40" maxlength="50"/> </td>
</tr>

<tr>
<td>Phone</td>
<td><input type="text" name="phone" size="15" maxlength="15"/> </td>
</tr>

<tr>
<td>E-Mail</td>
<td><input type="text" name="email" size="40" maxlength="60" /></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" name="password" size="40" maxlength="50" /></td>
</tr>

<tr>
<td>Student number</td>
<td><input type="text" name="student_number" size="20" maxlength="20" /></td>
</tr>

<tr>
<td>Marjor subject in English</td>
<td><input type="text" name="major_subjecten" size="40" maxlength="300" /></td>
</tr>

<tr>
<td>Marjor subject in Finnish</td>
<td><input type="text" name="major_subjectfi" size="40" maxlength="300" /></td>
</tr>

<tr>
<td>Membership paid</td>
<td>
<SELECT NAME="membership_paid">
<OPTION VALUE="1">true
<OPTION VALUE="0">false
</SELECT>


</td>
</tr>

<tr>
<td>Favourite band 1</td>
<td><input type="text" name="band1" size="40" maxlength="300"/> </td>
</tr>

<tr>
<td>Favourite band 2</td>
<td><input type="text" name="band2" size="40" maxlength="300"/> </td>
</tr>

<tr>
<td>Favourite band 3</td>
<td><input type="text" name="band3" size="40" maxlength="300"/> </td>
</tr>

<tr>
<td>Status</td>
<td><input type="text" name="status" size="40" maxlength="300"/> </td>
</tr>

<tr>
<td>Picture</td>
<td><input type="text" name="picture" size="40" maxlength="300"/> </td>
</tr>

<tr>
<td>IRC-nick</td>
<td><input type="text" name="ircnick" size="40" maxlength="300"/> </td>
</tr>


<tr>
<td>
<input type="submit" value="Store">
<td>
</form>


<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="members"/>
<input type="submit" value="Back to members listing">
</form>
<td>
</tr>
</table>


{ include file="footer.tpl"}
