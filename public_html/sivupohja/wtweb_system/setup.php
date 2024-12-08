<?php
	// setup session
	ini_set('session.gc_maxlifetime',300);
	ini_set('session.gc_probability',1);
	ini_set('session.gc_divisor',100);
	session_start();

	define( "ADDARTICLE", "addarticle" );
	define( "ARTICLE", "article" );
	define( "EDITARTICLE", "editarticle" );
	define( "EDITPAGE", "editpage" );
	define( "LOGIN", "login" );
	define( "404", "main" );
	define( "CONTROLLERCHECK", "controllercheck" );
	define( "BACKUP", "backup" );

	define ( "PUBLIC_PAGES", "wtweb_public_pages" );
	define ( "SYSTEM", "wtweb_system" );
	define ( "IMAGES", "wtweb_images" );
	define ( "PUBLIC_PAGES", "wtweb_public_pages" );

	$controllercheck = "<?php if (!isset(\$_SESSION['controller'])) { Header('Location: index.php');}?>";

	$PAGES = array();
	
	// if config files are missing, copy the defaults in
	if (!(file_exists('wtweb_system/wtweb_system.xml')))
	{
		copy('wtweb_system/wtweb_system_default.xml', 'wtweb_system/wtweb_system.xml');
	}
	/*
	if (!(file_exists('wtweb.xml')))
	{
		copy('wtweb_system/wtweb_default.xml', 'wtweb.xml');
	}
	*/
	if (!(file_exists('wtweb_css/style.xml')))
	{
		copy('wtweb_css/style_default.xml', 'wtweb_css/style.xml');
	}

	// load system pages
	$system_xml = simplexml_load_file("wtweb_system/wtweb_system.xml");
	foreach($system_xml->page as $page)
	{
   		$pageTemp = array("name" => $page->name,
						"id" => $page->id,
						"type" => $page->type,
						"edit" => $page->edit,
						"backup" => $page->backup,
						"onpage" => $page->onpage,
						"file" => $page->file );
        array_push($PAGES, $pageTemp);
	}

	// load public pages
	$public_pages = LoadFiles("wtweb_public_pages/");

	foreach($public_pages as $page)
	{
		$positionOfLastDot = strrpos($page,".");
		$pageid = substr($page,0,$positionOfLastDot);
		
		$type = "normal";

		// check if the page has a directory. If it does, it has articles
		if(is_dir("wtweb_public_pages/$pageid"))
		{
			$type = "article";
		}
		
  		$pageTemp = array("name" => $pageid,
						"id" => $pageid,
						"type" => "public",
						"edit" => $type,
						"backup" => true,
						"onpage" => 10,
						"file" => "" );
//						"file" => "wtweb_public_pages/$page" );
        array_push($PAGES, $pageTemp);
    }
	
	
/*
	$xml = simplexml_load_file("wtweb.xml");
	$count = 0;
	foreach($xml->pages->page as $page)
	{
   		$pageTemp = array("name" => $page->name,
						"id" => $page->id,
						"type" => $page->type,
						"edit" => $page->edit,
						"backup" => $page->backup,
						"onpage" => $page->onpage );
        array_push($PAGES, $pageTemp);
		if ($count == 0)
		{
			$defaultPage = $pageTemp['id'];
			$count = 1;
		}
	}
* /
	*/
	$title = $system_xml->title;
	$defaultPage = "etusivu";
?>
