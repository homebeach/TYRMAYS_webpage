<html>
<head>
<title>TYRMÄYS maintenance</title>
</head>
<body>
TYRMÄYS Maintenance Application
<br/>
<br/>
{if ($firstname && $surname)}
You are logged in as {$firstname} {$surname}.
{/if}
<h2>{$header|capitalize|default:"Somebody forgot the header!"}</h2>


