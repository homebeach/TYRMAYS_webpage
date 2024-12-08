<?php /* Smarty version 2.6.26, created on 2010-05-04 14:38:22
         compiled from maint_events.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'maint_events.tpl', 22, false),)), $this); ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "maint_header.tpl", 'smarty_include_vars' => array('header' => 'Event maintenance')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>TYRMÄYS Events</h1>

<form action="index.php" method="post">
<p><input type="hidden" name="action" value="add_event_form"/>
<input type="submit" value="Add Event"/></p>
</form>


<table border="1">
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['events']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    	<tr>
			<th>Event id</th><th>Event start date and time</th><th>Event end date and time</th><th>Event name en</th><th>Event name fi</th><th>Event description en</th><th>Event description fi</th><th>Gallery link</th><th>Location</th><th>Location link</th>
   		</tr>	
    <?php endif; ?>
    	<tr>
			<td><?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventid']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['events'][$this->_sections['i']['index']]['eventstartdatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['events'][$this->_sections['i']['index']]['eventenddatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</td>
			<td><?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventnameen']; ?>
</td>
			<td><?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventnamefi']; ?>
</td>
			<td><?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventdescriptionen']; ?>
</td>
			<td><?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventdescriptionfi']; ?>
</td>
			<td><?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventgallerylink']; ?>
</td>
			<td><?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventlocation']; ?>
</td>
			<td><?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventlocationlink']; ?>
</td>
			<td>
				<form action="index.php" method="post">
            		<p><input type="hidden" name="action" value="maint_participants"/>
            		<input type="hidden" name="eventid" value="<?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventid']; ?>
"/>
	    			<input type="submit" value="Participants" /></p>
	    		</form>
	    	</td>
			<td>
				<form action="index.php" method="post">
            		<p><input type="hidden" name="action" value="edit_event_form"/>
            		<input type="hidden" name="eventid" value="<?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventid']; ?>
"/>
	    			<input type="submit" value="Edit" /></p>
	    		</form>
	    	</td>
			<td>
				<form action="index.php" method="post">
            		<p><input type="hidden" name="action" value="delete_event"/>
            		<input type="hidden" name="eventid" value="<?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['eventid']; ?>
"/>
	   	 			<input type="submit" onclick="return confirm('Really remove?');" value="Delete" /></p>
	    		</form>
			</td>

    	</tr>
    <?php endfor; else: ?>
        <tr>
            <td colspan="3">No events</td>
        </tr>
    <?php endif; ?>
</table>

<form action="index.php" method="post">
	<p>
	<input type="hidden" name="action" value="main"/>
	<input type="submit" value="Back to main menu"/>
	</p>
</form>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "maint_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
