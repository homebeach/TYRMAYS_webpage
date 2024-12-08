<?php
	function FetchPage( $id )
	{
		global $PAGES;
		foreach($PAGES as $pagetemp)
		{
			// searching for the id in the array
			// it returns the key of the array,
			// which is "id", if the search matches
    		if (trim($pagetemp["id"]) == trim($id))
    		{
				return $pagetemp;
			}
		}
		return null;
	}

	function LoadFiles($dirname)
	{
		$dh = opendir( $dirname ) or die("couldn't open directory");
		$files = array();
		while (!(($file = readdir($dh)) == false ))
		{
			if (!( is_dir( "$dirname/$file" ) ))
			{
				array_push($files,$file);
			}
		}
		closedir($dh);
		return $files;
	}

	function LoadDirectories($dirname)
	{
		$dh = opendir( $dirname ) or die("couldn't open directory");
		$dirs = array();
		while (!(($file = readdir($dh)) == false ))
		{
  		if (is_dir( "$dirname/$file" ) )
			{
				if (($file != '.') & ($file != '..'))
				{
					array_push($dirs,$file);
				}
			}
		}
		closedir($dh);
		return $dirs;
	}
/*
	function IsArticlePage($pagename)
	{
		$dirname = "wtweb_public_pages";
		
		$dh = opendir( $dirname ) or die("couldn't open directory");

		$isit = is_dir( "$dirname/$pagename" )
		closedir($dh);
		
		return $isit;
	}
	
	function CreateThumb($name,$filename,$new_w,$new_h){
	$system=explode('.',$name);
	if (preg_match('/jpg|jpeg/',$system[1])){
		$src_img=imagecreatefromjpeg($name);
	}
	if (preg_match('/png/',$system[1])){
		$src_img=imagecreatefrompng($name);
	}	
	$old_x=imageSX($src_img);
	$old_y=imageSY($src_img);
	if ($old_x > $old_y) {
		$thumb_w=$new_w;
		$thumb_h=$old_y*($new_h/$old_x);
	}
	if ($old_x < $old_y) {
		$thumb_w=$old_x*($new_w/$old_y);
		$thumb_h=$new_h;
	}
	if ($old_x == $old_y) {
		$thumb_w=$new_w;
		$thumb_h=$new_h;
	}	
	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 	
	if (preg_match("/png/",$system[1]))
	{
		imagepng($dst_img,$filename); 
	} else {
		imagejpeg($dst_img,$filename); 
	}
	imagedestroy($dst_img); 
	imagedestroy($src_img); 
	}
	
	function rmdir_rf($dirname) {
	    if ($dirHandle = opendir($dirname)) {
	        chdir($dirname);
	        while ($file = readdir($dirHandle)) {
    	        if ($file == '.' || $file == '..') continue;
	            if (is_dir($file)) rmdir_rf($file);
	            else unlink($file);
	        }
	        chdir('..');
	        rmdir($dirname);
	        closedir($dirHandle);
	    }
}
*/	
?>