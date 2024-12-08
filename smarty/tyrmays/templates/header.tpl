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
   {literal}  
		function openwin(url) {
		  if( window.open(url,'','left=0,top=0,scrollbars=yes,location=no,resizable=yes') ) 
		    return false; 
		  else 
		    return true;
		}
   {/literal}
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
					<a href="index.php?action=main&amp;lang={$lang}"> <!-- class="link_atm" --> {#main#}</a>
            </li>

            
            <li>
            	{if $action eq 'allnews'}	
					<a href="index.php?action=allnews&amp;lang={$lang}" class="link_atm"> {#news#}</a>	
				{else}
					<a href="index.php?action=allnews&amp;lang={$lang}"> {#news#}</a>
				{/if}
            </li>
            <!-- <li class="link_alalinkki"> <img alt="-" src="kuvat/nuoli.jpg"/> Lorem Ipsum  </li>  -->

            <li>

	                {if $action eq 'future_events' || $action eq 'past_events'}	
						<a href="index.php?action=future_events&amp;lang={$lang}" class="link_atm"> {#events#} &raquo; </a>	
					{else}
						<a href="index.php?action=future_events&amp;lang={$lang}"> {#events#} &raquo; </a>
					{/if}
  
               <ul>
                  <li><a href="index.php?action=future_events&amp;lang={$lang}">{#future_events#}</a></li>
                  <li><a href="index.php?action=past_events&amp;lang={$lang}">{#past_events#}</a></li>
               </ul>
            </li>
            
            <li>
            
	            {if $action eq 'board' || $action eq 'past_boards' || $action eq 'minutes'}
					<a href="index.php?action=board&amp;lang={$lang}" class="link_atm">{#board#} &raquo;</a>
				{else}
					<a href="index.php?action=board&amp;lang={$lang}">{#board#} &raquo;</a>
				{/if}
		
               <ul>
                   <li><a href="index.php?action=board&amp;lang={$lang}">{#currentboard#}</a></li>
                   <li><a href="index.php?action=past_boards&amp;lang={$lang}">{#oldboards#}</a></li>
                   <li><a href="index.php?action=minutes&amp;lang={$lang}">{#minutes#}</a></li>
               </ul>

            </li>
            
            <li>
            
            	{if $action eq 'info' || $action eq 'history' || $action eq 'rules'}
					<a href="index.php?action=info&amp;lang={$lang}" class="link_atm">{#info#} &raquo;</a>
				{else}
					<a href="index.php?action=info&amp;lang={$lang}">{#info#} &raquo;</a>
				{/if}      
            
               <ul>
                   <li><a href="index.php?action=info&amp;lang={$lang}">{#general#}</a></li>
                   <li><a href="index.php?action=history&amp;lang={$lang}">{#history#}</a></li>
                   <li><a href="index.php?action=rules&amp;lang={$lang}">{#rules#}</a></li>
               </ul>
            </li>
            
            <li>
            
                {if $action eq 'joinmember' || $action eq 'editmember' || $action eq 'renewal' || $action eq 'memberstatistics'}
					<a href="index.php?action=joinmember&amp;lang={$lang}" class="link_atm">{#membership#} &raquo;</a>
				{else}
					<a href="index.php?action=joinmember&amp;lang={$lang}">{#membership#} &raquo;</a>
				{/if}  
            
			   <ul>
                   <li><a href="index.php?action=joinmember&amp;lang={$lang}">{#joinmember#}</a></li>
                   <li><a href="index.php?action=editmember&amp;lang={$lang}&amp;studentnumber={$studentnumber}">{#editmember#}</a></li>
                   <li><a href="index.php?action=renewal&amp;lang={$lang}&amp;studentnumber={$studentnumber}">{#renewal#}</a></li>
                   <li><a href="index.php?action=memberstatistics&amp;lang={$lang}">{#memberstatistics#}</a></li>
               </ul>
            </li>
            
            <!--[if IE 6]>
                <li><a href="index.php?action=editmember&amp;lang={$lang}&amp;studentnumber={$studentnumber}">{#editmember#}</a></li>
   			<![endif]-->
   			
            <li>
					<a href="/tyrmaysgalleria/" onclick="return openwin(this.href)" >{#gallery#}</a>
            </li>
            
            <li>
					<a href="http://www.ttykitys.net/forum/" onclick="return openwin(this.href)" >{#bbs#}</a>
            </li>

            <li>
                {if $action eq 'contact'}
					<a href="index.php?action=contact&amp;lang={$lang}" class="link_atm">{#contact#}</a>
				{else}
					<a href="index.php?action=contact&amp;lang={$lang}">{#contact#}</a>
				{/if}  
            </li>

            <li>
                {if $action eq 'links'}
					<a href="index.php?action=links&amp;lang={$lang}" class="link_atm">{#links#}</a>
				{else}
					<a href="index.php?action=links&amp;lang={$lang}">{#links#}</a>
				{/if}            
            </li>
         </ul>
      </div>

      </div>


      <div id="centerblock">


