<?php
header("Content-type: text/css");

$style = simplexml_load_file("style.xml");

$links_display = "block";
$links_position = "top: 230px; left: 130px; width: 120px;";
$links_backgroundcolor = $style->links->backgroundcolor;
if ($style->links->align == "horizontal")
{
	$links_display = "inline";
	$links_position = "top: 212px; left: 270px; width: 720px;";
}
$links_bordercolor = $style->links->bordercolor;
$body_backgroundcolor = $style->body->backgroundcolor;
$content_backgroundcolor = $style->content->backgroundcolor;
$content_bordercolor = $style->content->bordercolor;

$content_fontfamily = $style->content->fontfamily;
$content_fontsize = $style->content->fontsize;
?>

body
{
	background-color: <?echo '#'.$body_backgroundcolor;?>;
	padding-bottom: 200px;
	font-family: garamond;
}

div.headerpic
{
	position: relative;
	left: 260px;
	width: 600px;
	height: 190px;
	text-align: center;
}

/* content */
div.content
{
	position: relative;
	left: 190px;
	width: 510px;
	padding-left: 100px;
	padding-right: 120px;
	padding-top: 40px;
	padding-bottom: 30px;
	min-height: 350px;
	border: 3px solid <?echo '#'.$content_bordercolor;?>;
	background: <?echo '#'.$content_backgroundcolor;?>;
	font-family: <?echo $content_fontfamily;?>;
	font-size: <?echo $content_fontsize . 'px';?>;
}

div.content h1
{
	text-align: left;
	font-size: 28px;
	font-weight: bold;
	font-family: garamond;
	clear: left;
}

div.content h2
{
	font-size: 14px;
	font-weight: bold;
	font-family: tahoma;
	clear: left;
} 

div.content a:link, a:active
{
	color: #990000;
	font-weight: bold;
	text-decoration: none
}

/* content: Links to upper right corner  */

div.content a:visited
{
	color: #990000;
	font-weight: bold;
	text-decoration: none
}


div.content ul.linklist
{
	list-style: none;
	text-align: right;
}

div.content ul.linklist li.upper
{
	font-weight: bold;
	font-size: 19px;
	font-family: garamond;
}

div.content ul.linklist li.current
{
	font-weight: bold;
}

div.newstext
{
  position: relative;
  left: 130px;
  width: 640px;
  margin-top: 5px;
  margin-bottom: 5px;
  border: 0px;
  padding: 0px;
}

div.newsarticle
{
  margin-top: 0px;
  margin-bottom: 20px;
  border: 0px;
  padding: 0px;
}

span.newsdate
{
  position: relative;
  margin-top: 0px;
  margin-bottom: 25px;
  margin-left: 0px;
  margin-right: 0px;
  border: 0px;
  padding: 0px;
  font-weight: normal;
  font-family: serif;
  font-size: 24px;
}

span.newsheader
{
  position: relative;
  left: 40px;
  margin-top: 0px;
  margin-bottom: 25px;
  margin-left: 0px;
  margin-right: 0px;
  border: 0px;
  padding: 0px;
  font-weight: normal;
  font-family: serif;
  font-size: 24px;
}

/* Links for page navigation */

div.links
{
	position: fixed;
	border: none;
	<?echo $links_position;?>
}

/* explorer */
* html div.links
{
	position: absolute;
	border: none;
	<?echo $links_position;?>
}

div.links span.navi
{ 
	background-color: 	<?echo '#'.$links_backgroundcolor;?>;
	border: 3px solid <?echo '#'.$links_bordercolor;?>;
	width: 100%;
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 5px;
	padding-right: 5px;
	margin-bottom: 10px;
	text-align: center;
	display: <?echo $links_display;?>;
}

div.links a:link, a:active, a:visited
{
	font-weight: bold;
	color: black;
	text-decoration: none
}

div.links a:hover
{
	font-weight: bold;
	color: white;
	text-decoration: none
}

div.adminlinks
{
	position: relative;
	left: 20px;
	width: 510px;
}

span.adminnavi
{
	padding: 5px;
}

div.gallery
{
	position: relative;
	height: 400px;
}

div.pic1
{
	position: absolute;
	left: 120px;
	top: 120px;
}

div.pic2
{
	position: absolute;
	left: 310px;
	top: 120px;
}

div.pic3
{
	position: absolute;
	left: 500px;
	top: 120px;
}


div.pic4
{
	position: absolute;
	left: 120px;
	top: 260px;
}

div.pic5
{
	position: absolute;
	left: 310px;
	top: 260px;
}

div.pic6
{
	position: absolute;
	left: 500px;
	top: 260px;
}


div.pic7
{
	position: absolute;
	left: 120px;
	top: 400px;
}

div.pic8
{
	position: absolute;
	left: 310px;
	top: 400px;
}

div.pic9
{
	position: absolute;
	left: 500px;
	top: 400px;
}

