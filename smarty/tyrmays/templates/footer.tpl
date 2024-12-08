      </div>
      
      <div id="rightblock">
              
           <div id="login">
      
			{if $studentnumber eq '' || $studentnumber eq 'error'}

				  <form action="index.php" method="post">
				  <p><input type="hidden" name="lang" value="{$lang}"/>
				  	{#userid#}: <input type="text" name="studentnumber" size="8" />
				    {#password#}: <input type="password" name="password" size="8" />
			      <input type="hidden" name="action" value="login"/>
			      <br /><br />
				  <input type="submit" value="Log in"/>
				  </p>
				  </form>
				  <p>
				  <a href="index.php?action=getpassword&amp;lang={$lang}">{#forgotpassword#}</a>
				  </p>
			{else}
			   
				  {if $lang eq fi}
				  	<p>Kirjautuneena sisään nimellä {$firstname} {$surname}.</p>
				  {else}
				  	<p>Logged in as {$firstname} {$surname}.</p>
				  {/if}
				  <p><a href="index.php?action=logout&amp;lang={$lang}">{#logout#}</a></p>
			{/if}
			
     	    </div>
     	    
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
					{/if}	
					<img src="images/fin_gray.jpg" alt="In Finnish" /></a>
					
				{/if}
	      
	       </div>
       
            <div id="tapahtumat">

	             <table id="events" >
				    {section name="i" loop=$future_events}	
				    {if $smarty.section.i.first}
				
				    {/if}
				    
				    {if $lang eq fi}
				    
				    <tr>				    
						<td>{$future_events[i].eventstartdatetime|date_format:"%d.%m."}</td>
				    </tr>
				    <tr>						
						<td><a href="index.php?action=event&amp;lang={$lang}&amp;details=details&amp;eid={$future_events[i].eventid}">						
						{$future_events[i].eventnamefi}</a></td>
					</tr>

				    {else}

				    <tr>					
				    	<td>{$future_events[i].eventstartdatetime|date_format:"%d.%m."}</td>
				    </tr>
				    <tr>	
						<td><a href="index.php?action=event&amp;lang={$lang}&amp;details=details&amp;eid={$future_events[i].eventid}">
						{$future_events[i].eventnameen}</a></td>
					</tr>
										
				    {/if}
				    
				    {sectionelse}
				        <tr>
				            <td colspan="3">{#noevents#}</td>
				        </tr>
				    {/section}
				   </table>
                         
        	 </div>



       </div>


   </div>
    <div id="footer"> <p> TYRMÄYS - Tampereen Yliopiston Raskaan Musiikin Ystävien Seura
    <br />Sivuston toteutus: Petri Kotiranta &amp; Antero Mäenpää</p> </div>
</div>

{literal}
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10450584-1");
pageTracker._trackPageview();
} catch(err) {}</script>
{/literal} 

</body>

</html>