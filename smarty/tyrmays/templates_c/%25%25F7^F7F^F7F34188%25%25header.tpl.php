<?php /* Smarty version 2.6.26, created on 2010-05-04 14:35:11
         compiled from header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">

<head>

   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
   <title>TYRMÄYS ry - Tampereen Yliopiston Raskaan Musiikin Ystävien Seura</title>
   <link href="tyylit.css" rel="stylesheet" type="text/css" media="all" />
   <base href="http://tyrmays.net/" />
   <link rel="shortcut icon" href="favicon.ico" />
   
   
   <script type='text/javascript'> 
   <?php echo '  
		function openwin(url) {
		  if( window.open(url,\'\',\'left=0,top=0,scrollbars=yes,location=no,resizable=yes\') ) 
		    return false; 
		  else 
		    return true;
		}
   '; ?>

   </script>
   
</head>

<body>
<div id="page">
  <div id="header"> </div>

  <div id="content">
      <div id="leftblock">
      
      <div id="navi">
         <ul id="navmenu-v">
            <!-- Navibarin linkit, link_atm näyttää käyttäjälle graafisesti mikä sivu on auki.
            link_fill on muutetaan link_alalinkiksi ja kirjoitetaan mikä alemman tason linkki käyttäjällä on auki.
            link_fillin arvona täytyy olla jokin merkki, jotta Safari ja Chrome näyttää menun oikein -->
            <li>
					<a href="index.php?action=main&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"> <!-- class="link_atm" --> <?php echo $this->_config[0]['vars']['main']; ?>
</a>
            </li>

            
            <li>
            	<?php if ($this->_tpl_vars['action'] == 'allnews'): ?>	
					<a href="index.php?action=allnews&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
" class="link_atm"> <?php echo $this->_config[0]['vars']['news']; ?>
</a>	
				<?php else: ?>
					<a href="index.php?action=allnews&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"> <?php echo $this->_config[0]['vars']['news']; ?>
</a>
				<?php endif; ?>
            </li>
            <!-- <li class="link_alalinkki"> <img alt="-" src="kuvat/nuoli.jpg"/> Lorem Ipsum  </li>  -->

            <li>

	                <?php if ($this->_tpl_vars['action'] == 'future_events' || $this->_tpl_vars['action'] == 'past_events'): ?>	
						<a href="index.php?action=future_events&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
" class="link_atm"> <?php echo $this->_config[0]['vars']['events']; ?>
 &raquo; </a>	
					<?php else: ?>
						<a href="index.php?action=future_events&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"> <?php echo $this->_config[0]['vars']['events']; ?>
 &raquo; </a>
					<?php endif; ?>
  
               <ul>
                  <li><a href="index.php?action=future_events&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['future_events']; ?>
</a></li>
                  <li><a href="index.php?action=past_events&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['past_events']; ?>
</a></li>
               </ul>
            </li>
            
            <li>
            
	            <?php if ($this->_tpl_vars['action'] == 'board' || $this->_tpl_vars['action'] == 'past_boards' || $this->_tpl_vars['action'] == 'minutes'): ?>
					<a href="index.php?action=board&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
" class="link_atm"><?php echo $this->_config[0]['vars']['board']; ?>
 &raquo;</a>
				<?php else: ?>
					<a href="index.php?action=board&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['board']; ?>
 &raquo;</a>
				<?php endif; ?>
		
               <ul>
                   <li><a href="index.php?action=board&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['currentboard']; ?>
</a></li>
                   <li><a href="index.php?action=past_boards&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['oldboards']; ?>
</a></li>
                   <li><a href="index.php?action=minutes&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['minutes']; ?>
</a></li>
               </ul>

            </li>
            
            <li>
            
            	<?php if ($this->_tpl_vars['action'] == 'info' || $this->_tpl_vars['action'] == 'history' || $this->_tpl_vars['action'] == 'rules'): ?>
					<a href="index.php?action=info&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
" class="link_atm"><?php echo $this->_config[0]['vars']['info']; ?>
 &raquo;</a>
				<?php else: ?>
					<a href="index.php?action=info&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['info']; ?>
 &raquo;</a>
				<?php endif; ?>      
            
               <ul>
                   <li><a href="index.php?action=info&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['general']; ?>
</a></li>
                   <li><a href="index.php?action=history&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['history']; ?>
</a></li>
                   <li><a href="index.php?action=rules&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['rules']; ?>
</a></li>
               </ul>
            </li>
            
            <li>
            
                <?php if ($this->_tpl_vars['action'] == 'joinmember' || $this->_tpl_vars['action'] == 'editmember' || $this->_tpl_vars['action'] == 'renewal' || $this->_tpl_vars['action'] == 'memberstatistics'): ?>
					<a href="index.php?action=joinmember&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
" class="link_atm"><?php echo $this->_config[0]['vars']['membership']; ?>
 &raquo;</a>
				<?php else: ?>
					<a href="index.php?action=joinmember&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['membership']; ?>
 &raquo;</a>
				<?php endif; ?>  
            
			   <ul>
                   <li><a href="index.php?action=joinmember&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['joinmember']; ?>
</a></li>
                   <li><a href="index.php?action=editmember&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;studentnumber=<?php echo $this->_tpl_vars['studentnumber']; ?>
"><?php echo $this->_config[0]['vars']['editmember']; ?>
</a></li>
                   <li><a href="index.php?action=renewal&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;studentnumber=<?php echo $this->_tpl_vars['studentnumber']; ?>
"><?php echo $this->_config[0]['vars']['renewal']; ?>
</a></li>
                   <li><a href="index.php?action=memberstatistics&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['memberstatistics']; ?>
</a></li>
               </ul>
            </li>
            
            <!--[if IE 6]>
                <li><a href="index.php?action=editmember&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;studentnumber=<?php echo $this->_tpl_vars['studentnumber']; ?>
"><?php echo $this->_config[0]['vars']['editmember']; ?>
</a></li>
   			<![endif]-->
   			
            <li>
					<a href="/tyrmaysgalleria/" onclick="return openwin(this.href)" ><?php echo $this->_config[0]['vars']['gallery']; ?>
</a>
            </li>
            
            <li>
					<a href="http://www.ttykitys.net/forum/" onclick="return openwin(this.href)" ><?php echo $this->_config[0]['vars']['bbs']; ?>
</a>
            </li>

            <li>
                <?php if ($this->_tpl_vars['action'] == 'contact'): ?>
					<a href="index.php?action=contact&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
" class="link_atm"><?php echo $this->_config[0]['vars']['contact']; ?>
</a>
				<?php else: ?>
					<a href="index.php?action=contact&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['contact']; ?>
</a>
				<?php endif; ?>  
            </li>

            <li>
                <?php if ($this->_tpl_vars['action'] == 'links'): ?>
					<a href="index.php?action=links&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
" class="link_atm"><?php echo $this->_config[0]['vars']['links']; ?>
</a>
				<?php else: ?>
					<a href="index.php?action=links&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['links']; ?>
</a>
				<?php endif; ?>            
            </li>
         </ul>
      </div>

      </div>


      <div id="centerblock">

