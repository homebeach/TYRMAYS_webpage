<?php /* Smarty version 2.6.26, created on 2010-05-04 16:41:58
         compiled from past_boards.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'past_boards.tpl', 12, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="heading"><a> <?php echo $this->_config[0]['vars']['oldboards']; ?>
 </a>  </div>
	
	<br />
	
    <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['years']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>

        <?php if ($this->_tpl_vars['years'][$this->_sections['j']['index']]['year'] != $this->_tpl_vars['year']): ?>

    		<a href="index.php?action=oldboard&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
&amp;details=details&amp;year=<?php echo smarty_function_math(array('equation' => "x - y",'x' => $this->_tpl_vars['years'][$this->_sections['j']['index']]['year'],'y' => 2000), $this);?>
"><?php echo $this->_config[0]['vars']['board']; ?>
 <?php echo $this->_tpl_vars['years'][$this->_sections['j']['index']]['year']; ?>
 - <?php echo smarty_function_math(array('equation' => "x + y",'x' => $this->_tpl_vars['years'][$this->_sections['j']['index']]['year'],'y' => 1), $this);?>
</a> <br />
    
    	<?php endif; ?>
    	
    <?php endfor; endif; ?>
    
    <br />
    
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
