<?php
if (!$_SESSION['controller']) {	Header('Location: index.php');}

	foreach( $PAGES as $pageInfo )
	{
		if ($pageInfo["type"] == "public")
		{
		/*
            if ($pageInfo["edit"] == "article")
            {
    			echo '<p class="navi"> <a href="./index.php?page=article&amp;articlepage=' . $pageInfo['ID'] . '">' .
	    			$pageInfo["name"] . '</a></p>' . "\n";
            }
            else
            {
			*/
    			echo '<span class="navi"> <a href="./index.php?id=' . $pageInfo['id'] . '">' .
	    			$pageInfo["name"] . '</a></span>' . "\n";
           // }
		}
	}

	// if user is logged in, include private links
	if ($_SESSION["log"] == 'in'){
		foreach( $PAGES as $pageInfo )
		{
			if ($pageInfo["type"] == "private")
			{
				echo '<span class="navi"><a href="./index.php?id=' . $pageInfo['id'] . '">' .
					$pageInfo["name"] . '</a></span>' . "\n";
			}
		}
	}
?>