<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
   <meta name="author" content="TYRMÄYS" />

   <title>TYRMÄYS ry - Tampereen Yliopiston Raskaan Musiikin Ystävien Seura</title>
   <link rel="stylesheet" type="text/css" href="maint_tyylit.css" media="all" />

   <script src="sortable/sortable.js"></script>
   
</head>
<body>
<p>TYRMÄYS Maintenance Application</p>
{if ($firstname && $surname)}
<p>You are logged in as {$firstname} {$surname}.</p>
{/if}
<h2>{$header|capitalize|default:"Somebody forgot the header!"}</h2>


