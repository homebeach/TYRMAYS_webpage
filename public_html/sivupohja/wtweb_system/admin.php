<?php
if (!$_SESSION['controller']) {	Header('Location: index.php');}

if (!$_SESSION["log"] == 'in')
{
// User not logged in, redirect to login page
Header("Location: index.php");
}


	echo '<div class="adminlinks">';
	foreach( $PAGES as $page )
	{
		if ($page["type"] == "admin")
		{
   			echo '<span class="adminnavi"> <a href="./index.php?id=admin&action=' . $page['id'] . '">' .
    			$page["name"] . '</a></span>' . "\n";
		}
	}
	echo '</div>';
	
	if ($action != "")
	{
		include ($action.'.php');
	}

?>