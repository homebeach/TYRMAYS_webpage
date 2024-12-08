<?php /* Smarty version 2.6.16, created on 2009-07-23 22:25:46
         compiled from board.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'board.tpl', 4, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h2><?php echo $this->_config[0]['vars']['board']; ?>
 <?php echo $this->_tpl_vars['year']; ?>
 - <?php echo smarty_function_math(array('equation' => "x + y",'x' => $this->_tpl_vars['year'],'y' => 1), $this);?>
 </h2>

<table>
	


    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['board']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    	<td><img src="images/<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['picture']; ?>
" alt="<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['first_name']; ?>
 <?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['surname']; ?>
"/></td>

    	<td>
    		<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['first_name']; ?>
 <?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['surname']; ?>
<br />
    	<?php if ($this->_tpl_vars['lang'] == fi): ?>
			<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['statusfi']; ?>
<br />
    	<?php else: ?>
			<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['statusen']; ?>
<br />
    	<?php endif; ?>
			<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['phone']; ?>
<br />
			<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['email']; ?>
<br />
			IRC-nick: <?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['ircnick']; ?>
<br />
    	</td>
    	<td>
			<br />
    		<?php if ($this->_tpl_vars['lang'] == fi): ?>
				<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['commentsfi']; ?>
<br />
    		<?php else: ?>
				<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['commentsen']; ?>
<br />
			<?php endif; ?>
    	</td>
    </tr>
    
     
    <?php endfor; else: ?>
        <tr>
            <td colspan="3"><?php echo $this->_config[0]['vars']['noboard']; ?>
</td>
        </tr>
    <?php endif; ?>
</table>

<br />
<h2><?php echo $this->_config[0]['vars']['officials']; ?>
 <?php echo $this->_tpl_vars['year']; ?>
 - <?php echo smarty_function_math(array('equation' => "x + y",'x' => $this->_tpl_vars['year'],'y' => 1), $this);?>
 </h2>

<table>

    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['officials']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

    <tr>
    	<td><img src="images/<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['picture']; ?>
" alt="<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['first_name']; ?>
 <?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['surname']; ?>
" /></td>

    	<td>
    		<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['first_name']; ?>
 <?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['surname']; ?>
<br />
    	<?php if ($this->_tpl_vars['lang'] == fi): ?>
			<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['statusfi']; ?>
<br />
    	<?php else: ?>
			<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['statusen']; ?>
<br />
    	<?php endif; ?>
			<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['phone']; ?>
<br />
			<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['email']; ?>
<br />
		<?php if ($this->_tpl_vars['officials'][$this->_sections['i']['index']]['ircnick']): ?>
			IRC-nick: <?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['ircnick']; ?>
<br />
		<?php endif; ?>
    	</td>
    	<td>

			<br />
    		<?php if ($this->_tpl_vars['lang'] == fi): ?>
				<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['commentsfi']; ?>
<br />
    		<?php else: ?>
				<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['commentsen']; ?>
<br />
			<?php endif; ?>
    	</td>
    </tr>

    <?php endfor; else: ?>
        <tr>
            <td colspan="3"><?php echo $this->_config[0]['vars']['noofficials']; ?>
</td>
        </tr>
    <?php endif; ?>



	</table>
	
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
