<?php /* Smarty version 2.6.26, created on 2010-05-05 13:32:55
         compiled from getpassword.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="heading"><a> <?php echo $this->_config[0]['vars']['registeredemail']; ?>
 </a></div>
	
	<p><?php echo $this->_tpl_vars['message']; ?>
</p>

	<form action="index.php" method="post">
	<p><?php echo $this->_config[0]['vars']['email']; ?>
: <input type="text" name="email" id="email" size="15" />
	<input type="hidden" name="action" value="sendpassword" />
	<input type="submit" value="Submit"/>
	</p>
	</form>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
