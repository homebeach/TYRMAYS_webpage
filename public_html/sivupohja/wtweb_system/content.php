<?php if (!(isset($_SESSION['controller']))) { Header('Location: index.php');}
	$pageInfo = null;


	if ((!isset($_REQUEST['id'])) or ($_REQUEST['id'] == ''))
	{
		$pageInfo = FetchPage($defaultPage);
	}
	else
	{
		$pageInfo = FetchPage( $_REQUEST['id'] );
	}

	if ($pageInfo == null)
	{
		if ($defaultPage == null)
		{
			$pageInfo = FetchPage('login');
		}
		else
		{
			$pageInfo = FetchPage($defaultPage);
		}
	}
	// if page is being edited, include a Cancel-button and open the page in edit-mode
	// using editpage.php
	if (isset( $_REQUEST['edit']))
	{
		echo '<div><a href="index.php?id=' . $pageInfo["id"] . '">Cancel</a></div>';
		$editPage = FetchPage(EDITPAGE);
		include( $editPage["file"] );
	}
	else
	{
		// if user is logged in, display the extra gadgets they can use
		if ($_SESSION['log'] == 'in')
		{
			// normal pages get the edit-button
			if ($pageInfo["edit"] == "normal")
			{
				echo '<div><a href="index.php?id=' . $pageInfo["id"] . '&amp;edit=true">Edit</a></div>';
			}
			// article pages get the button for adding an article and gallery gets "add pic"
			if ($pageInfo["edit"] == "article")
			{
				echo '<div>';
				echo '	<span><a href="index.php?id=addarticle&amp;articlepage=' . $pageInfo["id"] . '">Add new</a></span>';
				echo '	<span><a href="index.php?id=' . $pageInfo["id"] . '&amp;edit=true">Edit title</a></span>';
				echo '</div>';
			}
			if ($pageInfo["edit"] == "gallery")
			{
				echo '<div>';
				echo '	<span><a href="index.php?id=addpicture&amp;gallerypage=' . $pageInfo["id"] . '">Add new picture</a></span>';
				echo '	<span><a href="index.php?id=' . $pageInfo["id"] . '&amp;edit=true">Edit title</a></span>';
				echo '</div>';
			}
		}
        // if no filename is specifed, find it from the default path, which is public_pages/<id>.php

		if ($pageInfo["file"] == "")
        {
			// some pages need special care. The page the link point towards becomes $articlepage,
			// and the actual page to be included is a handler for that type of page
			$subpage = $pageInfo["id"];
			if ($pageInfo["edit"] == "article")
			{
				include( "wtweb_system/article.php" );
			}
			else if ($pageInfo["edit"] == "gallery")
			{
				include( "wtweb_system/gallery.php" );
			}
			else
			{
				include( "wtweb_public_pages/" . $pageInfo["id"] . ".php" );
			}
        }
        else
        {
			// filename specified, so get fetch that one
            include( $pageInfo["file"] );
        }
		if (($pageInfo["edit"] == "article") || ($pageInfo["edit"] == "gallery"))
		{
			$prev = $start-1;
			$next = $start+1;

			echo '<div>';
			if ($prev >= 0)
			{
				echo '	<span><a href="index.php?id=' . $pageInfo["id"] . '&amp;start=' . $prev . '">Uudemmat</a></span>';
			}
			else
			{
				echo '	<span>Uudemmat</span>';
			}
			if ($total > $onpage * ($start +1))
			{
				echo '	<span><a href="index.php?id=' . $pageInfo["id"] . '&amp;start=' . $next . '">Vanhemmat</a></span>';
			}
			else
			{
				echo '	<span>Vanhemmat</span>';
			}
			echo '</div>';
		}
	}
?>