<?php if (!(isset($_SESSION['controller']))) { Header('Location: index.php');}

if (!$_SESSION["log"] == 'in')
{
	// User not logged in, redirect to login page
	Header("Location: index.php");
}

if (isset($_POST['submit'])) { 

	$id = $_REQUEST['id'];
	$subpage = $_REQUEST['subpage'];

	$target_path = "wtweb_public_pages/".$subpage.'/';

	$target_path = $target_path . basename( $_FILES['picture']['name']); 
	
	move_uploaded_file($_FILES['picture']['tmp_name'], $target_path);

	Header('Location: index.php?id='.$subpage);	
}

if (!isset($_REQUEST["submit"]))
{
?>

<form enctype="multipart/form-data" method="post" action="<?php echo $PHP_SELF;?>">
<table>
<tr>
<td>Picture:</td><td><input name="picture" type="file" /></td>
</tr>
</table>

<input type="hidden" name="id" value="addpicture">
<input type="hidden" name="subpage" value="<?php echo $_REQUEST['gallerypage']; ?>">
<input type="submit" value="submit" name="submit" />
</form>
<?
}

?>
