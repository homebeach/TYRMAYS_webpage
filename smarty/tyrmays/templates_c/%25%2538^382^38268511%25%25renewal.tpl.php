<?php /* Smarty version 2.6.26, created on 2010-05-04 16:00:29
         compiled from renewal.tpl */ ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="heading"><a> <?php echo $this->_config[0]['vars']['renewal']; ?>
 </a>  </div>

<?php if ($this->_tpl_vars['studentnumber'] != ""): ?>

	<?php if ($this->_tpl_vars['lang'] == fi): ?>
	
		<?php if ($this->_tpl_vars['referencenumber'] != ''): ?>		
			<p>J‰senyyden voi uusia maksamalla 5 euroa tilille 573008-2361224 (TSOP) viitteell‰ <?php echo $this->_tpl_vars['referencenumber']; ?>
.</p>
		<?php else: ?> 
			<p>Sinulla ei ole viel‰ maksuviitett‰, mink‰ avulla voit uusia j‰senyytesi.</p>
			
			<form action="index.php" method="post">
			<p>
			<input type="hidden" name="action" value="getreferencenumber"/>
			<input type="submit" value="Hae maksuviite"/>
			</p>
			</form>
		<?php endif; ?>
	
	<?php else: ?>
	
		<p>
		The fields marked with asterisk are compulsory.
		</p>
		
		<p>
		If you are having problems with this form, take contact: web-developer( at )tyrmays.net.
		</p>
		
			<?php if ($this->_tpl_vars['referencenumber'] != ''): ?>		
				<p>You can renew your membership by paying 5 euros to our account 573008-2361224 (TSOP) with referencenumber <?php echo $this->_tpl_vars['referencenumber']; ?>
.</p>
			<?php else: ?> 
				<p>You don't have referencenumber yet to renew membership.</p>
				
				<form action="index.php" method="post">
				<p>
				<input type="hidden" name="action" value="getreferencenumber"/>
				<input type="submit" value="Get referencenumber"/>
				</p>
				</form>
			<?php endif; ?>	


	<?php endif; ?>
	
 <?php else: ?>

	<?php if ($this->_tpl_vars['lang'] == fi): ?>
	
		<p>Kirjaudu sis‰‰n n‰hd‰ksesi viitenumerosi. J‰senyyden voi uusia maksamalla 5 euroa tilille 573008-2361224 viitteell‰si.</p>
	
	<?php else: ?>
		
		<p>Log in to see your referencenumber. You can renew your membership by paying 5 euros to our account 573008-2361224 with your reference number.</p>
		
	<?php endif; ?>

 <?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
