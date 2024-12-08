<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
	// include helpful functions
	try 
	{
		include_once("wtweb_system/functions.php");
		// include system setup. Initializes variables from config-files.
		include_once("wtweb_system/setup.php");
		// set controller to true.
		// each page checks for the existance of the contoller, so the pages can be read only through the index page
		$_SESSION['controller'] = "true";
	}
	catch (Exception $e)
	{
		die("Error during setup:" . $e->getMessage());
	}
?>

<html>
<head>
	<title><?php echo $title; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link href="wtweb_css/style.php" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="headerpic">
	 <img src="wtweb_images/title.png" alt="TTYkitys">
</div>

<div class="content">
<?php
	// include the handler for page content.
	// content.php will create most of the view
	try 
	{
		include("wtweb_system/content.php");
	}
	catch (Exception $e)
	{
		die("Error while generating content:" . $e->getMessage());
	}

?>
</div>

<div class="links">
<?php
	// links.php creates the rest of the view, namely the links
	try
	{
		include("wtweb_system/links.php");
	}
	catch (Exception $e)
	{
		die("Error while generating links:" . $e->getMessage());
	}
	
?>
</div>

</body>
</html>

<?php
	$_SESSION['error'] = "";
	$_SESSION['controller'] = false;
?>
