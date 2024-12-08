<?php if (!$_SESSION['controller']) { Header('Location: index.php');}?>
<?php
// if $subpage hasn't been defined, we need to check if the info can be found
if ($subpage == "")
{
	if (isset( $_REQUEST['subpage']))
	{
		$subpage = $_REQUEST['subpage'];
	}
	else
	{
		// Didn't find any, we'll have to abort.
		Header("Location: index.php");
	}
}

if (isset( $_REQUEST['editfile']))
{
	$delete = $_REQUEST['editfile'];
	unlink("wtweb_public_pages/" . $subpage . "/". $delete);
}

// the files are located in a directory named according to the subpage
$filesPath = "wtweb_public_pages/" . $subpage . "/";
$files = LoadFiles($filesPath);
sort($files);
$files = array_reverse($files);

// if an article is being edited, take notice
if (isset( $_REQUEST['editfile']))
{
	$editfile = $_REQUEST['editfile'];
}

// Paging. Find out which page to start on.
if (isset( $_REQUEST['start']))
{
	$start = $_REQUEST["start"];
}
else
{
	$start = 0;
}
$passed = 0;

include ("wtweb_public_pages/" . $subpage . ".php");

// wtf. Just $articlepage won't work
// have to fetch info again
$subPageInfo = FetchPage("" . $subpage . "");
// how many article per page
$onpage = 9;
// how many shown so far
$displayed = 0;
// which article to start with
$pagestart = $onpage * $start;
// total amount of articles
$total = sizeof($files);

echo '<div class="gallery"></div>';

foreach($files as $file)
{
	createthumb($filesPath.'/'.$file, $filesPath.'/thumbs/'.$file,100,100);

	if ($passed != $pagestart)
	{
		$passed++;
	}
	else
	{
		if ($onpage == $displayed) break;
		$displayed++;
		// if user is logged in, edit options are available

		echo '<div class="pic'.$displayed.'">';

		// if the file is being edited, open it in editmode, using editarticle.php
		// if not, just include the file as it is
		echo '<a href="'.$filesPath.$file.'"><img src="'.$filesPath.'/thumbs/'.$file.'" alt="Kuva" /></a>';
		if($_SESSION['log'] == 'in')
	    {
	        echo '<div class="articleeditbuttons">';
			// include delete button
			echo '<a href="./index.php?id=gallery&amp;subpage=' . $subpage . '&amp;editfile=' . $file . '">Delete</a> </div>';
			
		}

		echo '</div>';
	}
}
?>


