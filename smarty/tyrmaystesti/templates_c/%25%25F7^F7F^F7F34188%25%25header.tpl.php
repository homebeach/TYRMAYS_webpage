<?php /* Smarty version 2.6.16, created on 2009-07-23 22:25:46
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'header.tpl', 30, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
   <meta name="author" content="TYRMÄYS" />
   <meta name="keywords" content="Tampereen yliopisto, University of Tampere, metallimusiikki, metal music, heavy metal, thrash metal, black metal, death metal, doom metal, power metal, industrial metal, symphonic metal, progressive metal, avantarde metal, metalcore, hardcore punk, industrial, gothic" />
   <meta name="description" content="Tampereen yliopiston opiskelijoille suunnattu raskaan musiikin yhteisö, Association targeted for students in University of Tampere" />

   <title>TYRMÄYS ry - Tampereen Yliopiston Raskaan Musiikin Ystävien Seura</title>
   <link rel="stylesheet" type="text/css" href="tyylit.css" media="all" />
   
   <!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="ietyylit.css" />
   <![endif]-->

</head>

<body>
<div id="page">
  <div id="header"> </div>

<div id="content">
   <div id="leftblock">  
   
      <div id="kieli">
      
      		<?php if ($this->_tpl_vars['lang'] == fi): ?>
				<?php if ($this->_tpl_vars['details'] == 'yes' && $this->_tpl_vars['year'] != ''): ?>
					<a href="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&amp;lang=en&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['eventid']; ?>
&amp;nid=<?php echo $this->_tpl_vars['newsnumber']; ?>
&amp;year=<?php echo smarty_function_math(array('equation' => "x - y",'x' => $this->_tpl_vars['year'],'y' => 2000), $this);?>
">
				<?php else: ?>	
						
					<?php if ($this->_tpl_vars['details'] == 'yes'): ?>		
						<a href="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&amp;lang=en&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['eventid']; ?>
&amp;nid=<?php echo $this->_tpl_vars['newsnumber']; ?>
">	
					<?php else: ?>
						<a href="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&amp;lang=en">
					<?php endif; ?>	
				<?php endif; ?>
					<img src="images/eng_gray.jpg" alt="In English" /></a>

			<?php else: ?>
	
				<?php if ($this->_tpl_vars['details'] == 'yes' && $this->_tpl_vars['year'] != ''): ?>
					<a href="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&amp;lang=fi&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['eventid']; ?>
&amp;nid=<?php echo $this->_tpl_vars['newsnumber']; ?>
&amp;year=<?php echo smarty_function_math(array('equation' => "x - y",'x' => $this->_tpl_vars['year'],'y' => 2000), $this);?>
">	
				<?php else: ?>
					<?php if ($this->_tpl_vars['details'] == 'yes'): ?>	
						<a href="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&amp;lang=fi&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['eventid']; ?>
&amp;nid=<?php echo $this->_tpl_vars['newsnumber']; ?>
">	
					<?php else: ?>
						<a href="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&amp;lang=fi">
					<?php endif; ?>
					<img src="images/fin_gray.jpg" alt="In Finnish" /></a>
				<?php endif; ?>	
			<?php endif; ?>
      
      </div>
      
      <div id="login">
      
			<?php if ($this->_tpl_vars['studentnumber'] == '' || $this->_tpl_vars['studentnumber'] == 'error'): ?>

				  <form action="index.php" method="post">
				  <p><?php echo $this->_config[0]['vars']['studentnumber']; ?>
: <input type="text" name="studentnumber" size="8" />
				     <?php echo $this->_config[0]['vars']['password']; ?>
: <input type="password"name="password" size="8" />
			      <input type="hidden" name="action" value="login"/>
				  <input type="submit" value="Log in"/>
				  </form>
				  <br/>
				  <a href="index.php?action=getpassword&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['forgotpassword']; ?>
</a></p>
			<?php else: ?>
			   
				  <?php if ($this->_tpl_vars['lang'] == fi): ?>
				   <p>Kirjautuneena sisään nimellä <?php echo $this->_tpl_vars['firstname']; ?>
 <?php echo $this->_tpl_vars['surname']; ?>
.</p>
				  <?php else: ?>
				   <p>Logged in as <?php echo $this->_tpl_vars['firstname']; ?>
 <?php echo $this->_tpl_vars['surname']; ?>
.</p>
				  <?php endif; ?>
				  <p><a href="index.php?action=logout&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['logout']; ?>
</a></p>
			<?php endif; ?>
      </div>
   
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
            <li class="link_fill">-</li>

            <li>
					<a href="index.php?action=allnews&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"> <!-- class="link_atm" --> <?php echo $this->_config[0]['vars']['news']; ?>
</a>
            </li>
            <!-- <li class="link_alalinkki"> <img alt="-" src="kuvat/nuoli.jpg"/> Lorem Ipsum  </li>  -->
            <li class="link_fill">-</li>
            <li>
					<a href="index.php?action=future_events&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['events']; ?>
 &raquo; </a>
  
               <ul>
                  <li><a href="index.php?action=future_events&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['future_events']; ?>
</a></li>
                  <li><a href="index.php?action=past_events&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['past_events']; ?>
</a></li>
               </ul>
            </li>
            <li class="link_fill">-</li>

            <li>

						<a href="index.php?action=board&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['board']; ?>
 &raquo;</a>
		
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
            <li class="link_fill">-</li>

            <li>

					<a href="index.php?action=info&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['info']; ?>
 &raquo;</a>         
            
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
            <li class="link_fill">-</li>

            <li>
				   <a href="index.php?action=joinmember&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['membership']; ?>
 &raquo;</a>
			   <ul>
                   <li><a href="index.php?action=joinmember&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['joinmember']; ?>
</a></li>
                   <li><a href="index.php?action=editmember&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;studentnumber=<?php echo $this->_tpl_vars['studentnumber']; ?>
"><?php echo $this->_config[0]['vars']['editmember']; ?>
</a></li>
                   <li><a href="index.php?action=memberstatistics&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['memberstatistics']; ?>
</a></li>
               </ul>
            </li>
            <li class="link_fill">-</li>

            <li>
					<a href="index.php?action=contact&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['contact']; ?>
</a>
            </li>
            <li class="link_fill">-</li>

            <li>
					<a href="index.php?action=links&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['links']; ?>
</a>
            </li>
         </ul>
      </div>



      <div id="mainokset">
      
      	 <!-- <?php echo $this->_config[0]['vars']['cooperation']; ?>
<br /> -->
         <a href="http://www.ravintolahella.fi"><img alt="Hella" src="images/hella.jpg"/></a>
      </div>

   </div>
   
   <!-- Content rightblockin sisälle -->
   <div id="rightblock">
   

