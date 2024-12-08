<?php if (!(isset($_SESSION['controller']))) { Header('Location: index.php');}
if (!$_SESSION["log"] == 'in')
{
	// User not logged in, redirect to login page
	Header("Location: index.php");
}

$setupfilename = "wtweb_system/wtweb_system.xml";
$stylefilename = "wtweb_css/style.xml";
	
$xml = simplexml_load_file($setupfilename);
$style = simplexml_load_file($stylefilename);
// backup
$fp = fopen("$setupfilename.backup",'w') or die ('Cannot open file');
fwrite($fp,$xml->asXml());
fclose($fp);

if (isset($_POST['submit'])) { 

	$linkalign = $_REQUEST['linkalign'];
	$title = $_REQUEST['title'];
	
	$target_path = "wtweb_images/title.png";

//	$target_path = $target_path . basename( $_FILES['titleimage']['name']); 

	move_uploaded_file($_FILES['titleimage']['tmp_name'], $target_path);
	/*
	 {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
	} else{
	    echo "There was an error uploading the file, please try again!";
	}
	*/	
	//$titleimage = $_REQUEST['titleimage'];


	$body_backgroundcolor = $_REQUEST['bodybackgroundcolor'];
	$links_backgroundcolor = $_REQUEST['linksbackgroundcolor'];
	$links_bordercolor = $_REQUEST['linksbordercolor'];
	$content_backgroundcolor = $_REQUEST['contentbackgroundcolor'];
	$content_bordercolor = $_REQUEST['contentbordercolor'];
	$content_fontfamily = $_REQUEST['contentfontfamily'];
	$content_fontsize = $_REQUEST['contentfontsize'];

	$error = "";
	
	if( !preg_match( "/^[a-fA-F0-9]{6}$/", $body_backgroundcolor))
	{
		$error = "Body background color";
	}
	if( !preg_match( "/^[a-fA-F0-9]{6}$/", $links_backgroundcolor))
	{
		$error = "Links background color";
	}
	if( !preg_match( "/^[a-fA-F0-9]{6}$/", $links_bordercolor))
	{
		$error = "Links border color";
	}
	if( !preg_match( "/^[a-fA-F0-9]{6}$/", $content_backgroundcolor))
	{
		$error = "Content background color";
	}
	if( !preg_match( "/^[a-fA-F0-9]{6}$/", $content_bordercolor))
	{
		$error = "Content border color";
	}
	if( !preg_match( "/^[0-9]{1,2}$/", $content_fontsize))
	{
		$error = "Content font size";
	}
	if ( $error == '')
	{
		$style->links->align = $linkalign;
		if ($title != '')
		{
			$xml->title = $title;
		}
		if ($titleimage != '')
		{
			copy("wtweb_images/".$titleimage,"wtweb_images/title.png");			
		}
		echo $titleimage;
		$fp = fopen($setupfilename,'w') or die ('Cannot open file');
    	fwrite($fp,$xml->asXml());
		fclose($fp);

		$style->body->backgroundcolor = $body_backgroundcolor;
		$style->links->backgroundcolor = $links_backgroundcolor;
		$style->links->bordercolor = $links_bordercolor;
		$style->content->backgroundcolor = $content_backgroundcolor;
		$style->content->bordercolor = $content_bordercolor;
		$style->content->fontfamily = $content_fontfamily;
		$style->content->fontsize = $content_fontsize;
		$fp = fopen($stylefilename,'w') or die ('Cannot open file');
	    fwrite($fp,$style->asXml());
		fclose($fp);
	
		Header('Location: index.php');	
	}
	$error = $error.' was in a wrong format.';	
}

if (!isset($_REQUEST["submit"]) or $error != "" )
{
	if ($error != '')
	{
		echo '<div class="error">'.$error.'</div>';
	}
?>

<form enctype="multipart/form-data" method="post" action="<?php echo $PHP_SELF;?>">
<table>
<tr>
<td>Background color:</td><td><input type="text" name="bodybackgroundcolor" value=<?php echo '"'. $style->body->backgroundcolor . '"'?>/></td>
</tr>
<tr>
<td>Links background color:</td><td><input type="text" name="linksbackgroundcolor" value=<?php echo '"'. $style->links->backgroundcolor . '"'?>/></td>
</tr>
<tr>
<td>Links border color:</td><td><input type="text" name="linksbordercolor" value=<?php echo '"'. $style->links->bordercolor . '"'?>/></td>
</tr>
<tr>
<td>Content background color:</td><td><input type="text" name="contentbackgroundcolor" value=<?php echo '"'. $style->content->backgroundcolor . '"'?>/></td>
</tr>
<tr>
<td>Content border color:</td><td><input type="text" name="contentbordercolor" value=<?php echo '"'. $style->content->bordercolor . '"'?>/></td>
</tr>
<td>Content font:</td><td><select name="contentfontfamily"><option value="arial">Arial</option><option value="verdana">Verdana</option><option value="tahoma">Tahoma</option></select>
</td>
</tr>
<tr>
<td>Content font size:</td><td><input type="text" name="contentfontsize" value=<?php echo '"'. $style->content->fontsize . '"'?>/></td>
</tr>
<tr>
<td>Title:</td><td><input type="text" name="title" value=<?php echo '"' . $xml->title . '"' ?>/></td>
</tr>
<tr>
<td>Links:</td><td>
<input type="radio" name="linkalign" value="vertical" <?php if (trim($style->links->align) != 'horizontal') { echo 'checked="true"'; } ?> />Vertical<br>
<input type="radio" name="linkalign" value="horizontal" <?php if (trim($style->links->align) == 'horizontal') { echo 'checked="true"'; } ?> />Horizontal<br>
</tr>
</td>
<tr>
<td>Title image:</td><td><input name="titleimage" type="file" /></td>
</tr>
</table>

<input type="hidden" name="id" value="create">
<input type="submit" value="submit" name="submit" />
</form>
<?
}

?>
