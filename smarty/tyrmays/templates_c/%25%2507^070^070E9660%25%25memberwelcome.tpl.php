<?php /* Smarty version 2.6.26, created on 2010-08-31 14:14:56
         compiled from memberwelcome.tpl */ ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


	<?php if ($this->_tpl_vars['lang'] === 'fi'): ?>		
		<p>Tervetuloa TYRMÄYS ry:n jäseneksi! Jäsenmaksu olisi 5 euroa ja sen voi maksaa tilille 573008-2361224 (TSOP) viitteellä <?php echo $this->_tpl_vars['referencenumber']; ?>
 tai jollekin hallituksen jäsenelle tapahtumissamme.</p>
		<p>Tunnuksesi sivuille on <?php echo $this->_tpl_vars['username']; ?>
</p>
	<?php else: ?> 
		<p>Welcome to TYRMÄYS ry! Price for our membership is 5 euros and it can be paid to our account: 573008-2361224 (TSOP) with referencenumber <?php echo $this->_tpl_vars['referencenumber']; ?>
 or to some of our board members in our events.</p>
		<p>Your username to this site is <?php echo $this->_tpl_vars['username']; ?>
</p>
	<?php endif; ?>	

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>