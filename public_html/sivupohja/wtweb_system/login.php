<?php

if (!$_SESSION['controller']) {	Header('Location: ../index.php');}

if($_SESSION['log'] == 'in') {
	Header('Location: index.php?id=admin');
}

if (isset($_POST['submit'])) { 

	/* check they filled in what they were supposed to and authenticate */
	if(!$_POST['uname'] | !$_POST['passwd']) {
		$error = 'You did not fill in a required field.';
	}
/*
	// authenticate.
	$login_xml = simplexml_load_file("wtweb_system/wtweb_login.xml");
	$uname = $login_xml->uname;
	$password = $login_xml->password;

	if ((md5($_POST['uname']) != $uname) or (md5($_POST['passwd']) != $password)) {
		$error = 'Incorrect login.';
	}
*/
	if (($_POST['uname'] != 'tyrmays') or ($_POST['passwd'] != 'testi')) 
	{
		$error = 'Incorrect login.';
	}

	// if we get here username and password are correct
	if ($error == '')
	{
		$_SESSION['log'] = 'in';

		Header('Location: index.php');
	}

} 

if (!(isset($_POST['submit'])) or ($error != ""))
{
	if ($error != '')
	{
		echo '<div class="error">'.$error.'</div>';
	}
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<table border="0" cellspacing="3" cellpadding="5">
		<tr>
			<td>Username:</td>
			<td><input type="text" name="uname" maxlength="40" /></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="passwd" maxlength="50" /></td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input type="hidden" name="id" value="login" />
			<input type="submit" name="submit" value="Login" />
			</td>
		</tr>
	</table>
</form>
<?php
}

?>
