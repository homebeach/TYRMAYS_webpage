<?php /* Smarty version 2.6.26, created on 2010-05-04 13:56:37
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'footer.tpl', 38, false),array('modifier', 'date_format', 'footer.tpl', 76, false),)), $this); ?>
      </div>
      
      <div id="rightblock">
              
           <div id="login">
      
			<?php if ($this->_tpl_vars['studentnumber'] == '' || $this->_tpl_vars['studentnumber'] == 'error'): ?>

				  <form action="index.php" method="post">
				  <p><input type="hidden" name="lang" value="<?php echo $this->_tpl_vars['lang']; ?>
"/>
				  	<?php echo $this->_config[0]['vars']['userid']; ?>
: <input type="text" name="studentnumber" size="8" />
				    <?php echo $this->_config[0]['vars']['password']; ?>
: <input type="password" name="password" size="8" />
			      <input type="hidden" name="action" value="login"/>
			      <br /><br />
				  <input type="submit" value="Log in"/>
				  </p>
				  </form>
				  <p>
				  <a href="index.php?action=getpassword&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo $this->_config[0]['vars']['forgotpassword']; ?>
</a>
				  </p>
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
					<?php endif; ?>	
					<img src="images/fin_gray.jpg" alt="In Finnish" /></a>
					
				<?php endif; ?>
	      
	       </div>
       
            <div id="tapahtumat">

	             <table id="events" >
				    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['future_events']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>	
				    <?php if ($this->_sections['i']['first']): ?>
				
				    <?php endif; ?>
				    
				    <?php if ($this->_tpl_vars['lang'] == fi): ?>
				    
				    <tr>				    
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventstartdatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.") : smarty_modifier_date_format($_tmp, "%d.%m.")); ?>
</td>
				    </tr>
				    <tr>						
						<td><a href="index.php?action=event&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventid']; ?>
">						
						<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventnamefi']; ?>
</a></td>
					</tr>

				    <?php else: ?>

				    <tr>					
				    	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventstartdatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.") : smarty_modifier_date_format($_tmp, "%d.%m.")); ?>
</td>
				    </tr>
				    <tr>	
						<td><a href="index.php?action=event&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventid']; ?>
">
						<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventnameen']; ?>
</a></td>
					</tr>
										
				    <?php endif; ?>
				    
				    <?php endfor; else: ?>
				        <tr>
				            <td colspan="3"><?php echo $this->_config[0]['vars']['noevents']; ?>
</td>
				        </tr>
				    <?php endif; ?>
				   </table>
                         
        	 </div>



       </div>


   </div>
    <div id="footer"> <p> TYRMÄYS - Tampereen Yliopiston Raskaan Musiikin Ystävien Seura
    <br />Sivuston toteutus: Petri Kotiranta &amp; Antero Mäenpää</p> </div>
</div>

<?php echo '
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10450584-1");
pageTracker._trackPageview();
} catch(err) {}</script>
'; ?>
 

</body>

</html>