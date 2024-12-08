<?php if (!$_SESSION['controller']) {	Header('Location: index.php');}

if (!$_SESSION["log"] == 'in')
{
// User not logged in, redirect to login page
Header("Location: index.php");
}

if (isset($_POST['submit']))
{
	$setupfilename = "wtweb.xml";	
	$pagetitle = $_REQUEST['pagetitle'];
	$pagetype = $_REQUEST['pagetype'];

	$xml = simplexml_load_file($setupfilename);

	$id = str_replace(" ","",$pagetitle);
	$id = strtolower($id);
	//$page = $xml->wtweb->pages->addChild('page');
	$page = $xml->pages->addChild('page');
		
	$page->addChild('name',$pagetitle);
	$page->addChild('id',$id);
	$page->addChild('type','public');
	$page->addChild('edit',$pagetype);
	$page->addChild('backup','1');
	$page->addChild('onpage','5');
	$fp = fopen($setupfilename,'w') or die ('Cannot open file');
	fwrite($fp,$xml->asXml());
	fclose($fp);
	
	$filename = 'wtweb_public_pages/'.$id.'.php';
	
	$body_content = $controllercheck . "\r\n";

	$fp = fopen ($filename, "w+"); 
	// Open the file in write mode, if file does not exist then it will be created.
	fwrite ($fp,$body_content);          // entering data to the file
	fclose ($fp);                                // closing the file pointer	
	if (($pagetype == "article") || ($pagetype == "gallery"))
	{
		mkdir("wtweb_public_pages/".$id);
		if ($pagetype == "gallery")
		{
			mkdir("wtweb_public_pages/".$id.'/thumbs');
		}
	}
	Header("Location: index.php");

}
else
{
?>
<form method="post" action="<?php echo $PHP_SELF;?>">
<table>
<tr>
<td>Page title</td><td><input type="text" name="pagetitle"/></td>
</tr>
<tr>
<td>Page type:</td><td><select name="pagetype">
<option value="normal">Normal</option>
<option value="article">Article</option>
<option value="gallery">Gallery</option>
</select>
</td>
</tr>
</table>
<input type="hidden" name="id" value="createpage">
<input type="submit" value="submit" name="submit" />

<?php
}
?>