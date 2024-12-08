<?php /* Smarty version 2.6.26, created on 2010-05-05 04:56:26
         compiled from memberstats.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="heading"><a> <?php echo $this->_config[0]['vars']['memberstatistics']; ?>
 </a>  </div>

<?php if ($this->_tpl_vars['studentnumber'] != ""): ?>
	
	    
    <?php if ($this->_tpl_vars['lang'] == fi): ?>
		<p>Yhdistyksess‰ on <?php echo $this->_tpl_vars['membercount'][0]['membercount']; ?>
 j‰sent‰, joista <?php echo $this->_tpl_vars['supportmembercount'][0]['supportmembercount']; ?>
 on kannatusj‰seni‰.</p>
		<p>Varsinaisten j‰senten p‰‰ainejakauma:</p>
	<?php else: ?>
		<p>Association has <?php echo $this->_tpl_vars['membercount'][0]['membercount']; ?>
 members. <?php echo $this->_tpl_vars['supportmembercount'][0]['supportmembercount']; ?>
 of these members are supporting memebers.</p>
		<p>Majors of ordinary members:</p>
    <?php endif; ?>



<table>

	<tr>
    	<th> <?php echo $this->_config[0]['vars']['major']; ?>
</th>
		<th> <?php echo $this->_config[0]['vars']['members']; ?>
</th>
    </tr>

    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['majorsstats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    
    <?php if ($this->_tpl_vars['lang'] == fi): ?>
		<tr>
    		<td><?php echo $this->_tpl_vars['majorsstats'][$this->_sections['i']['index']]['majorfi']; ?>
</td>
			<td><?php echo $this->_tpl_vars['majorsstats'][$this->_sections['i']['index']]['members']; ?>
</td>
    	</tr>

	<?php else: ?>
		<tr>
    		<td><?php echo $this->_tpl_vars['majorsstats'][$this->_sections['i']['index']]['majoren']; ?>
</td>
			<td><?php echo $this->_tpl_vars['majorsstats'][$this->_sections['i']['index']]['members']; ?>
</td>
    	</tr>

    <?php endif; ?>

    <?php endfor; else: ?>

        <tr>
            <td colspan="2"><?php echo $this->_config[0]['vars']['nostats']; ?>
</td>
        </tr>
    <?php endif; ?>

</table>

<br />

 <?php else: ?>

		<p><?php echo $this->_config[0]['vars']['membersonly']; ?>
</p>

 <?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
