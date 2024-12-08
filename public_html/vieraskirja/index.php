<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	      <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head><title>Guestbook</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
	<link href="only-egbook.css" rel="stylesheet" />
	</head>
<body>
<h1>Guestbook</h2>
<p>Welcome to my guestbook!</p>
<?php
require "egbook.php";
require "egbookform.php";	
?>
<h2>Guestbook Entries</h2>
<div class="egbookDiv">
<?php
	require "egbookdisplayentries.php";
?></div>
</body></html>