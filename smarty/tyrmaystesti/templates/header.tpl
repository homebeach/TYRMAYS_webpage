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
      
      		{if $lang eq fi}
				{if $details eq 'yes' && $year ne ''}
					<a href="index.php?action={$action}&amp;lang=en&amp;details=details&amp;eid={$eventid}&amp;nid={$newsnumber}&amp;year={math equation="x - y" x=$year y=2000}">
				{else}	
						
					{if $details eq 'yes'}		
						<a href="index.php?action={$action}&amp;lang=en&amp;details=details&amp;eid={$eventid}&amp;nid={$newsnumber}">	
					{else}
						<a href="index.php?action={$action}&amp;lang=en">
					{/if}	
				{/if}
					<img src="images/eng_gray.jpg" alt="In English" /></a>

			{else}
	
				{if $details eq 'yes' && $year ne ''}
					<a href="index.php?action={$action}&amp;lang=fi&amp;details=details&amp;eid={$eventid}&amp;nid={$newsnumber}&amp;year={math equation="x - y" x=$year y=2000}">	
				{else}
					{if $details eq 'yes'}	
						<a href="index.php?action={$action}&amp;lang=fi&amp;details=details&amp;eid={$eventid}&amp;nid={$newsnumber}">	
					{else}
						<a href="index.php?action={$action}&amp;lang=fi">
					{/if}
					<img src="images/fin_gray.jpg" alt="In Finnish" /></a>
				{/if}	
			{/if}
      
      </div>
      
      <div id="login">
      
			{if $studentnumber eq '' || $studentnumber eq 'error'}

				  <form action="index.php" method="post">
				  <p>{#studentnumber#}: <input type="text" name="studentnumber" size="8" />
				     {#password#}: <input type="password"name="password" size="8" />
			      <input type="hidden" name="action" value="login"/>
				  <input type="submit" value="Log in"/>
				  </form>
				  <br/>
				  <a href="index.php?action=getpassword&amp;lang={$lang}">{#forgotpassword#}</a></p>
			{else}
			   
				  {if $lang eq fi}
				   <p>Kirjautuneena sisään nimellä {$firstname} {$surname}.</p>
				  {else}
				   <p>Logged in as {$firstname} {$surname}.</p>
				  {/if}
				  <p><a href="index.php?action=logout&amp;lang={$lang}">{#logout#}</a></p>
			{/if}
      </div>
   
      <div id="navi">
         <ul id="navmenu-v">
            <!-- Navibarin linkit, link_atm näyttää käyttäjälle graafisesti mikä sivu on auki.
            link_fill on muutetaan link_alalinkiksi ja kirjoitetaan mikä alemman tason linkki käyttäjällä on auki.
            link_fillin arvona täytyy olla jokin merkki, jotta Safari ja Chrome näyttää menun oikein -->
            <li>
					<a href="index.php?action=main&amp;lang={$lang}"> <!-- class="link_atm" --> {#main#}</a>
            </li>
            <li class="link_fill">-</li>

            <li>
					<a href="index.php?action=allnews&amp;lang={$lang}"> <!-- class="link_atm" --> {#news#}</a>
            </li>
            <!-- <li class="link_alalinkki"> <img alt="-" src="kuvat/nuoli.jpg"/> Lorem Ipsum  </li>  -->
            <li class="link_fill">-</li>
            <li>
					<a href="index.php?action=future_events&amp;lang={$lang}">{#events#} &raquo; </a>
  
               <ul>
                  <li><a href="index.php?action=future_events&amp;lang={$lang}">{#future_events#}</a></li>
                  <li><a href="index.php?action=past_events&amp;lang={$lang}">{#past_events#}</a></li>
               </ul>
            </li>
            <li class="link_fill">-</li>

            <li>

						<a href="index.php?action=board&amp;lang={$lang}">{#board#} &raquo;</a>
		
               <ul>
                   <li><a href="index.php?action=board&amp;lang={$lang}">{#currentboard#}</a></li>
                   <li><a href="index.php?action=past_boards&amp;lang={$lang}">{#oldboards#}</a></li>
                   <li><a href="index.php?action=minutes&amp;lang={$lang}">{#minutes#}</a></li>
               </ul>

            </li>
            <li class="link_fill">-</li>

            <li>

					<a href="index.php?action=info&amp;lang={$lang}">{#info#} &raquo;</a>         
            
               <ul>
                   <li><a href="index.php?action=info&amp;lang={$lang}">{#general#}</a></li>
                   <li><a href="index.php?action=history&amp;lang={$lang}">{#history#}</a></li>
                   <li><a href="index.php?action=rules&amp;lang={$lang}">{#rules#}</a></li>
               </ul>
            </li>
            <li class="link_fill">-</li>

            <li>
				   <a href="index.php?action=joinmember&amp;lang={$lang}">{#membership#} &raquo;</a>
			   <ul>
                   <li><a href="index.php?action=joinmember&amp;lang={$lang}">{#joinmember#}</a></li>
                   <li><a href="index.php?action=editmember&amp;lang={$lang}&amp;studentnumber={$studentnumber}">{#editmember#}</a></li>
                   <li><a href="index.php?action=memberstatistics&amp;lang={$lang}">{#memberstatistics#}</a></li>
               </ul>
            </li>
            <li class="link_fill">-</li>

            <li>
					<a href="index.php?action=contact&amp;lang={$lang}">{#contact#}</a>
            </li>
            <li class="link_fill">-</li>

            <li>
					<a href="index.php?action=links&amp;lang={$lang}">{#links#}</a>
            </li>
         </ul>
      </div>



      <div id="mainokset">
      
      	 <!-- {#cooperation#}<br /> -->
         <a href="http://www.ravintolahella.fi"><img alt="Hella" src="images/hella.jpg"/></a>
      </div>

   </div>
   
   <!-- Content rightblockin sisälle -->
   <div id="rightblock">
   


