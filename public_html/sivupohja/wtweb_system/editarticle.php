<?php if (!$_SESSION['controller']) { Header('Location: index.php');}
if (!$_SESSION["log"] == 'in')
{
	Header("Location: index.php");
}
/*
if (isset( $_REQUEST['file']))
{
	$file = $_REQUEST['file'];
}
else
{
	Header("Location: index.php");
}
*/
$filename = "$filesPath$file";

if (!(isset($_REQUEST['submit']))) { // if page is not submitted to itself echo the form

if (isset($_REQUEST['delete']))
{
	// kai tähän voisi laittaa confirmin
	unlink($filename);
	Header("Location: index.php?id=" . $subpage);
}

$fh = fopen($filename, 'r') or die("Can't open file");
$article = fread($fh, filesize($filename));
fclose($fh);
?>

<form method="post" action="<?php echo $PHP_SELF;?>">
<div>
<textarea rows="5" cols="50" name="article"><?php echo $article; ?> </textarea>
<input type="hidden" name="id" value="editarticle" />
<input type="hidden" name="file" value=<?php echo '"' . $filename . '"'; ?> />
<input type="hidden" name="editing" value=<?php echo '"' . $subpage . '"'; ?> />
<input type="submit" value="submit" name="submit" />
</div>
</form>
<?
}
else
{
	$body_content = stripslashes($_REQUEST["article"]);
	$fp = fopen ($filename, "w+");
	// Open the file in write mode, if file does not exist then it will be created.
	fwrite ($fp,$body_content);          // entering data to the file
	fclose ($fp);                                // closing the file pointer
	//chmod($file_name,0777);           // changing the file permission.
	Header("Location: index.php?id=" . $editing);
}


?>
