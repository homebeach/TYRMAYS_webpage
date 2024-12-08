<?php if (!(isset($_SESSION['controller']))) { Header('Location: index.php');}
if (!$_SESSION["log"] == 'in')
{
	Header("Location: index.php");
}

if (isset($_POST['submit'])) { 

	unlink('wtweb_css/style.xml');
	Header("Location: index.php");
}	
	

if (!isset($_REQUEST["submit"]))
{
?>

<div>Are you sure you wish to reset the pages? You will lose all your changes to the appearance of the page! Pages will not be deleted.</div>
<form method="post" action="<?php echo $PHP_SELF;?>">

<input type="hidden" name="id" value="reset">
<input type="submit" value="submit" name="submit" />
</form>
<?
}

?>
