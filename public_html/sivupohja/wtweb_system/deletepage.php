<?php if (!(isset($_SESSION['controller']))) { Header('Location: index.php');}

if (!$_SESSION["log"] == 'in')
{
// User not logged in, redirect to login page
Header("Location: index.php");
}


if (isset($_POST['submit']))
{
	$pageid = $_REQUEST['pageid'];
	if ($pageid != '')
	{
		if (file_exists('wtweb_public_pages/'.$pageid.'.php')) unlink('wtweb_public_pages/'.$pageid.'.php');
		if (file_exists('wtweb_public_pages/'.$pageid.'/'))
		{
			$files = LoadFiles('wtweb_public_pages/'.$pageid.'/');
			foreach ($files as $file)
			{
				if (file_exists('wtweb_public_pages/'.$pageid.'/'.$file)) unlink('wtweb_public_pages/'.$pageid.'/'.$file);
			}
			if (file_exists('wtweb_public_pages/'.$pageid.'/thumbs'))
			{
				$files2 = LoadFiles('wtweb_public_pages/'.$pageid.'/thumbs');
				foreach ($files2 as $file2)
				{
					if (file_exists('wtweb_public_pages/'.$pageid.'/thumbs/'.$file2)) unlink('wtweb_public_pages/'.$pageid.'/thumbs/'.$file2);
				}
				rmdir('wtweb_public_pages/'.$pageid.'/thumbs');
			}
			rmdir('wtweb_public_pages/'.$pageid);
		}

		if (file_exists('wtweb_public_pages/'.$pageid))	rmdir('wtweb_public_pages/'.$pageid);

		$setupfilename = "wtweb.xml";	
		$oldxml = simplexml_load_file($setupfilename);
	
		$xml = simplexml_load_string('<?xml version="1.0"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><wtweb><pages></pages></wtweb>');
		$xml->addChild('location', $oldxml->wtweb->location);
		$xml->addChild('title', $oldxml->wtweb->defaultpage);
		foreach ($PAGES as $page)
		{
			// add all public pages to the config file, except the one being deleted
			if (($page['type'] == 'public') && ($page['id'] != $pageid) && ($page['id'] != 'login'))
			{
				$newpage = $xml->pages->addChild('page');
				$newpage->addChild('name', $page['name']);
				$newpage->addChild('id', $page['id']);
				$newpage->addChild('type', $page['type']);
				$newpage->addChild('edit', $page['edit']);
				$newpage->addChild('backup', $page['backup']);
			}
		}
		$fp = fopen($setupfilename,'w') or die ('Cannot open file');
	    fwrite($fp,$xml->asXml());
		fclose($fp);
	}
	Header("Location: index.php?id=admin");
	
}

?>
<form method="post" action="<?php echo $PHP_SELF;?>">
<div>
Page title: <select name="pageid">
<?php

	foreach( $PAGES as $page )
	{
		if ($page["type"] == "public")
		{
    			echo '<option value="'.$page['id'].'" >'.$page["name"] . '</option>';
		}
	}

?>

</select>
</div>

<div>
<input type="hidden" name="id" value="deletepage">
<input type="submit" value="submit" name="submit" />
</div>

<?php
?>