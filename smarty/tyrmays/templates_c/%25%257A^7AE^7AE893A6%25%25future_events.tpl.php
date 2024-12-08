<?php /* Smarty version 2.6.26, created on 2010-05-04 14:37:26
         compiled from future_events.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'future_events.tpl', 20, false),)), $this); ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="heading"><a> <?php echo $this->_config[0]['vars']['future_events']; ?>
 </a>  </div>

<br />

<table>
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
    
    <tr>

    <?php if ($this->_tpl_vars['lang'] == fi): ?>
    
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventstartdatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</td>
		<td><a href="index.php?action=event&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventid']; ?>
">
		
		<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventnamefi']; ?>
</a></td>

    <?php else: ?>

		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventstartdatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</td>
		<td><a href="index.php?action=event&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventid']; ?>
">
	
		<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventnameen']; ?>
</a></td>
	
    
    <?php endif; ?>

    </tr>
    
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