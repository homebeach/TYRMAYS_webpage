<?php /* Smarty version 2.6.26, created on 2010-05-21 16:09:07
         compiled from events.tpl */ ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo $this->_config[0]['vars']['future_events']; ?>
</h2>
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
		<td><a href="index.php?action=event&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventid']; ?>
">
	<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventnamefi']; ?>
</a></td>

    <?php if (! "{".($this->_tpl_vars['future_events'][$this->_sections['i']['index']]).".eventgallerylink" == ''): ?>}
		<td><a href="<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventgallerylink']; ?>
">[ <?php echo $this->_config[0]['vars']['gallery']; ?>
 ]</a></td>
    <?php endif; ?>

    <?php else: ?>
		<td><a href="index.php?action=event&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;eid=<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventid']; ?>
">
	<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventnameen']; ?>
</a></td>
    <?php if (! "{".($this->_tpl_vars['future_events'][$this->_sections['i']['index']]).".eventgallerylink" == ''): ?>}
		<td><a href="<?php echo $this->_tpl_vars['future_events'][$this->_sections['i']['index']]['eventgallerylink']; ?>
">[ <?php echo $this->_config[0]['vars']['gallery']; ?>
 ]</a></td>
    <?php endif; ?>
    
    <?php endif; ?>

    	</tr>
    <?php endfor; else: ?>
        <tr>
            <td colspan="3"><?php echo $this->_config[0]['vars']['noevents']; ?>
</td>
        </tr>
    <?php endif; ?>
</table>

<h2><?php echo $this->_config[0]['vars']['passed_events']; ?>
</h2>

<table>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['passed_events']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td><a href="index.php?action=event&lang=<?php echo $this->_tpl_vars['lang']; ?>
&details=details&eid=<?php echo $this->_tpl_vars['passed_events'][$this->_sections['i']['index']]['eventid']; ?>
">
		<?php echo $this->_tpl_vars['passed_events'][$this->_sections['i']['index']]['eventnamefi']; ?>
</a></td>

    <?php if ($this->_tpl_vars['passed_events'][$this->_sections['i']['index']]['eventgallerylink']): ?>
		<td><a href="<?php echo $this->_tpl_vars['passed_events'][$this->_sections['i']['index']]['eventgallerylink']; ?>
">[ <?php echo $this->_config[0]['vars']['gallery']; ?>
 ]</a></td>
    <?php endif; ?>

    <?php else: ?>
		<td><a href="index.php?action=event&lang=<?php echo $this->_tpl_vars['lang']; ?>
&details=details&eid=<?php echo $this->_tpl_vars['passed_events'][$this->_sections['i']['index']]['eventid']; ?>
">
	<?php echo $this->_tpl_vars['passed_events'][$this->_sections['i']['index']]['eventnameen']; ?>
</a></td>
    <?php if ($this->_tpl_vars['passed_events'][$this->_sections['i']['index']]['eventgallerylink']): ?>
		<td><a href="<?php echo $this->_tpl_vars['passed_events'][$this->_sections['i']['index']]['eventgallerylink']; ?>
">[ <?php echo $this->_config[0]['vars']['gallery']; ?>
 ]</a></td>
    <?php endif; ?>
    
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