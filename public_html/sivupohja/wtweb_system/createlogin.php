<?php if (!(isset($_SESSION['controller']))) { Header('Location: index.php');}

if (file_exists('wtweb_system/wtweb_login.xml'))
{
	// login info exists, we're not supposed to be here
	Header('Location: index.php');
}
	
if (isset($_POST['submit'])) { 

	$uname = $_REQUEST['uname'];
	$password = $_REQUEST['password'];
/*	
	if( !preg_match( "/^[a-zA-Z0-9]{3-8}$/", $uname))
	{
		$error = "Invalid characters in username. Use a-z, A-Z and 0-9 only. Username must be 3-8 characters long.";
	}	
	if( !preg_match( "/^[a-zA-Z0-9]{3-8}$/", $password))
	{
		$error = "Invalid characters in password. Use a-z, A-Z and 0-9 only. Password must be 3-8 characters long.";
	}	
	*/
	if ($error == "")
	{
		$login_xml = simplexml_load_file("wtweb_system/wtweb_login_default.xml");
		$login_xml->uname = md5($uname);
		$login_xml->password = md5($password);
		
		$fp = fopen("wtweb_system/wtweb_login.xml",'w') or die ('Cannot open file');
	    fwrite($fp,$login_xml->asXml());
		fclose($fp);
		
		// we have a very good reason to assume the person working on the page knows the login and password, so let's just log them in
		$_SESSION['log'] = 'in';
		
	}
}	
if (!isset($_REQUEST["submit"]) or $error != '' )
{
	if ($error != '')
	{
		echo '<div class="error">'.$error.'</div>';
	}
?>
Enter username and password to be used for the site admin:
<form method="post" action="<?php echo $PHP_SELF;?>">
<table>
<tr>
<td>Username:</td><td><input type="text" name="uname"/></td>
</tr>
<tr>
<td>Password:</td><td><input type="password" name="password"/></td>
</tr>
</table>

<input type="hidden" name="id" value="createlogin">
<input type="submit" value="submit" name="submit" />
</form>
<?
}
?>
