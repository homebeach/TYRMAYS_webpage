<?php
if (!$_SESSION['controller']) {	Header('Location: index.php');}

// set the articlepage that is being handled into a variable from request
// if the request doesn't define the articlepage, the page is being accessed
// wrong, and we'll guide the page to the index page
if ( array_key_exists( "articlepage", $_REQUEST ))
{
	$articlepage = $_REQUEST["articlepage"];
}
else
{
	Header("Location: index.php");
}

$headline = $_POST["headline"];
$text = $_POST["text"];

if (!$_SESSION["log"] == 'in')
{
// User not logged in, redirect to index page
Header("Location: index.php");
}
// if page is not submitted to itself echo the form
if (!isset($_POST['submit'])) {
?>

<form method="post" action="<?php echo $PHP_SELF;?>">
	<table border="0" cellspacing="3" cellpadding="5">
		<tr>
			<td>Otsikko:</td>
			<td><input type="text" size="65" maxlength="50" name="headline" /></td>
		</tr>
		<tr>
			<td>Teksti:</td>
			<td><textarea rows="5" cols="50" name="text"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input type="hidden" name="id" value="addarticle" />
				<input type="hidden" name="articlepage" value=<?php echo '"' . $articlepage . '"'; ?> />
				<input type="submit" value="submit" name="submit" />
			</td>
		</tr>
	</table>
</form>

<?
}
else
{
	// get the posted article, process it into a file and save it
	if ((trim($headline) == "") | (trim($text) == ""))
	{
		// !!! alert-warning telling that headline and text are required?
		Header('Location: index.php?page=article&amp;articlepage=' . $articlepage );
    }
	else
	{
		$newsdate = date(d) . '.' . date(m) . '.' . date(y);
		$text2 = str_replace("\r\n", '</div>' . "\r\n" . '<div class="newstext">', $text);
		$body_content = '<span class="newsdate">' . $newsdate . '</span>' . "\r\n" .
		 	'<span class="newsheader">'. $headline . '</span>' . "\r\n" .
			'<div class="newstext">' . $text2 . '</div>';
        $directory = $_POST['articlepage'];

		$file_name= "wtweb_public_pages/$directory/" . date(ymdHis) . ".php";

		$fp = fopen ($file_name, "w");
		// Open the file in write mode, if file does not exist then it will be created.
		fwrite ($fp,$body_content);          // entering data to the file
		fclose ($fp);                                // closing the file pointer
		//chmod($file_name,0777);           // changing the file permission.
	    Header("Location: index.php?id=$articlepage");
	}
}
?>

