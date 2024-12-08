<?php if (!$_SESSION['controller']) { Header('Location: ../index.php');}

if ($_SESSION["log"] != 'in')
{
	Header("Location: index.php");
}

// if no filename is specifed, find it from the default path
if ($pageInfo["file"] == "")
{
	$filename = "wtweb_public_pages/" . $pageInfo["id"] . ".php";
}
else
{
	$filename = $pageInfo["file"];
}

if (!isset($_POST['submit'])) { // if page is not submitted to itself echo the form
	$fh = fopen($filename, 'r') or die("Can't open file");

	$data=file($filename);
	$size=count($data);

	$article = "";

	for($line=1;$line<$size;$line++)
	{
		$article =  $article . $data[$line];
	}
	fclose($fh);

?>

<form method="post" action="<?php echo $PHP_SELF;?>">
<div>
<textarea rows="30" cols="70" name="article"><?php echo $article ?></textarea>
<input type="hidden" name="id" value="editpage" />
<input type="hidden" name="file" value=<?php echo '"' . $filename . '"'; ?> />
<input type="hidden" name="endin" value=<?php echo '"' . $pageInfo["id"] . '"'; ?> />
<input type="submit" value="submit" name="submit" />
</div>
</form>
<?
}
else
{
	$filename = $_POST['file'];
	
	$body_content = $controllercheck . "\r\n" . stripslashes($_POST["article"]);

	$fp = fopen ($filename, "w+"); 
	// Open the file in write mode, if file does not exist then it will be created.
	fwrite ($fp,$body_content);          // entering data to the file
	fclose ($fp);                                // closing the file pointer
	//chmod($file_name,0777);           // changing the file permission.	
	Header("Location: index.php?id=" . $_POST["endin"]);
}

?>
