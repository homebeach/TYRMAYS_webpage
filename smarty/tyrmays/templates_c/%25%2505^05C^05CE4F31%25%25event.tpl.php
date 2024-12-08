<?php /* Smarty version 2.6.26, created on 2010-05-04 14:24:22
         compiled from event.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'event.tpl', 36, false),)), $this); ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php if ($this->_tpl_vars['lang'] == fi): ?>
<div id="heading"><a> <?php echo $this->_tpl_vars['event'][0]['eventnamefi']; ?>
 </a>  </div>
<?php else: ?>
<div id="heading"><a> <?php echo $this->_tpl_vars['event'][0]['eventnameen']; ?>
 </a>  </div>
<?php endif; ?>

<br />

<table>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['event']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<td colspan="3"><p><?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventdescriptionfi']; ?>
</p></td>
		</tr>
		
		<tr>
    	<?php if ($this->_tpl_vars['event'][$this->_sections['i']['index']]['eventlocationlink']): ?>
    		<td><span class="event"><?php echo $this->_config[0]['vars']['eventlocation']; ?>
: <a href="<?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventlocationlink']; ?>
"><?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventlocation']; ?>
</a></span></td>
		<?php else: ?>
			<td><span class="event"><?php echo $this->_config[0]['vars']['eventlocation']; ?>
: <?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventlocation']; ?>
</span></td>
    	<?php endif; ?>
		</tr>

		<tr>
			<td colspan="3"><span class="event"><?php echo $this->_config[0]['vars']['eventstart']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['event'][$this->_sections['i']['index']]['eventstartdatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</span></td>
		</tr>
		<tr>
			<td colspan="3"><span class="event"><?php echo $this->_config[0]['vars']['eventend']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['event'][$this->_sections['i']['index']]['eventenddatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</span></td>
		</tr>
		<?php if ($this->_tpl_vars['studentnumber'] != '' && $this->_tpl_vars['futureevent'] == 'true'): ?>
		<tr>
			<?php if ($this->_tpl_vars['enrolled'] == 'false'): ?>
			
				<?php if ($this->_tpl_vars['eventfull'] == 'true'): ?>
					<td colspan="3"><span class="event"><?php echo $this->_config[0]['vars']['eventfull']; ?>
</span></td>
				<?php else: ?>
	    			<td colspan="3">
	    				<p><<?php echo $this->_config[0]['vars']['enroll']; ?>
</p>
		    			<form action="index.php" method="post">
						<p>
							<input type="hidden" name="action" value="enroll" />	    			
			    			<input type="hidden" name="lang" value="<?php echo $this->_tpl_vars['lang']; ?>
" />
			    			<input type="hidden" name="details" value="details" />
			    			<input type="hidden" name="eventid" value="<?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventid']; ?>
" />
			    			<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['studentnumber']; ?>
" />
			    			<?php echo $this->_config[0]['vars']['eventcomments']; ?>

			    			<br />    			
			    			<textarea name="comments" rows="5" cols="61"></textarea>
			    			<br />
			    			<input type="submit" value="<?php echo $this->_config[0]['vars']['enroll']; ?>
" />
		    			</p>
		    			</form>
	    			</td>
	    		<?php endif; ?>
	    		
			<?php else: ?>
					<td colspan="3"><p><?php echo $this->_config[0]['vars']['enrolled']; ?>
 <br /> <a href="index.php?action=leave&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;eventid=<?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventid']; ?>
"><?php echo $this->_config[0]['vars']['leaveevent']; ?>
</a></p></td>
	    	<?php endif; ?>
			</tr>
			<tr>
				<td colspan="3"><span class="event"><a href="index.php?action=participants&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventid']; ?>
"><?php echo $this->_config[0]['vars']['participants']; ?>
</a></span></td>
			</tr>
		</tr>
	    <?php endif; ?>
    <?php else: ?>
		<tr>
			<td colspan="3"><p><?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventdescriptionen']; ?>
</p></td>
		</tr>
		
		<tr>    
    	<?php if ($this->_tpl_vars['event'][$this->_sections['i']['index']]['eventlocationlink']): ?>
    		<td><span class="event"><?php echo $this->_config[0]['vars']['eventlocation']; ?>
: <a href="<?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventlocationlink']; ?>
"><?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventlocation']; ?>
</a></span></td>
		<?php else: ?>
			<td><span class="event"><?php echo $this->_config[0]['vars']['eventlocation']; ?>
: <?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventlocation']; ?>
</span></td>
    	<?php endif; ?>
		</tr>

		<tr>
			<td colspan="3"><span class="event"><?php echo $this->_config[0]['vars']['eventstart']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['event'][$this->_sections['i']['index']]['eventstartdatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</span></td>
		</tr>
		
		<tr>
			<td colspan="3"><span class="event"><?php echo $this->_config[0]['vars']['eventend']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['event'][$this->_sections['i']['index']]['eventenddatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</span></td>
		</tr>
		<?php if ($this->_tpl_vars['studentnumber'] != '' && $this->_tpl_vars['futureevent'] == 'true'): ?>
			<tr>
			<?php if ($this->_tpl_vars['enrolled'] == 'false'): ?>
			
	    		<?php if ($this->_tpl_vars['eventfull'] == 'true'): ?>
					<td colspan="3"><span class="event"><?php echo $this->_config[0]['vars']['eventfull']; ?>
</span></td>
				<?php else: ?>
	    			<td colspan="3">
	    				<p><<?php echo $this->_config[0]['vars']['enroll']; ?>
</p>
		    			<form action="index.php" method="post">
						<p>
							<input type="hidden" name="action" value="enroll" />	    			
			    			<input type="hidden" name="lang" value="<?php echo $this->_tpl_vars['lang']; ?>
" />
			    			<input type="hidden" name="details" value="details" />
			    			<input type="hidden" name="eventid" value="<?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventid']; ?>
" />
			    			<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['studentnumber']; ?>
" />
			    			<?php echo $this->_config[0]['vars']['eventcomments']; ?>

			    			<br />    			
			    			<textarea name="comments" rows="5" cols="61"></textarea>
			    			<br />
			    			<input type="submit" value="<?php echo $this->_config[0]['vars']['enroll']; ?>
" />
		    			</p>
		    			</form>
	    			</td>
	    		<?php endif; ?>
	    		
			<?php else: ?>
				<td colspan="3"><p><?php echo $this->_config[0]['vars']['enrolled']; ?>
 <br /> <a href="index.php?action=leave&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;eventid=<?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventid']; ?>
"><?php echo $this->_config[0]['vars']['leaveevent']; ?>
</a></p></td>
	    	<?php endif; ?>

			</tr>
			<tr>
				<td colspan="3"><span class="event"><a href="index.php?action=participants&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['event'][$this->_sections['i']['index']]['eventid']; ?>
"><?php echo $this->_config[0]['vars']['participants']; ?>
</a></span></td>
			</tr>
    	<?php endif; ?>
	<?php endif; ?>
    
    <?php endfor; else: ?>
        <tr>
            <td colspan="3"><?php echo $this->_config[0]['vars']['noevents']; ?>
</td>
        </tr>
    <?php endif; ?>
</table>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
