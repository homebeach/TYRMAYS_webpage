<?php /* Smarty version 2.6.26, created on 2010-05-04 14:37:57
         compiled from maint_login_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'maint_login_form.tpl', 5, false),)), $this); ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "maint_header.tpl", 'smarty_include_vars' => array('header' => "TYRMÄYS Data Maintenance Login")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<p><?php echo ((is_array($_tmp=@$this->_tpl_vars['message'])) ? $this->_run_mod_handler('default', true, $_tmp, "Welcome to the TYRMÄYS data maintenance facility.") : smarty_modifier_default($_tmp, "Welcome to the TYRMÄYS data maintenance facility.")); ?>
</p>
<p>
Please log in.
</p>
<form action="index.php" method="post">
<p>Student number: <input type="text" name="studentnumber"/></p>
<p>Password: <input type="password" name="password"/></p>
<p><input type="hidden" name="action" value="login"/></p>
<p><input type="submit" value="Log in"/></p>
</form>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "maint_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
