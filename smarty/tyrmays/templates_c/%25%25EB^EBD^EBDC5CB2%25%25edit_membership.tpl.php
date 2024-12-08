<?php /* Smarty version 2.6.26, created on 2010-05-04 16:50:50
         compiled from edit_membership.tpl */ ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="heading"><a> <?php echo $this->_config[0]['vars']['editmember']; ?>
 </a>  </div>

<?php if ($this->_tpl_vars['studentnumber'] != ""): ?>

<?php if ($this->_tpl_vars['lang'] == fi): ?>

	<p>
	Jäsentiedoista pidettävän rekisterin <a href="http://www.tyrmays.net/rekisteriseloste.txt">rekisteriseloste</a>.
	</p>
	
	<p>
	Tähdellä merkityt kentät ovat pakollisia.
	</p>
	
	<p>
	Jos havaitset ongelmia lomakkeen toiminnassa, ota yhteyttä: web-developer( at )tyrmays.net.
	</p>

	<form action="index.php" method="post">
	<p>
	<input type="hidden" name="action" value="changepassword"/>
	<input type="submit" value="Vaihda salasana"/>
	</p>
	</form>


<?php else: ?>

	<p>
	The fields marked with asterisk are compulsory.
	</p>
	
	<p>
	If you are having problems with this form, take contact: web-developer( at )tyrmays.net.
	</p>

	<form action="index.php" method="post">
	<p>
	<input type="hidden" name="action" value="changepassword"/>
	<input type="submit" value="Change password"/>
	</p>
	</form>
	
<?php endif; ?>
	
	
<?php if ($this->_tpl_vars['result'] == success): ?>
<span id="success"><p><?php echo $this->_config[0]['vars']['editsuccess']; ?>
</p></span> 
<br />
<?php endif; ?>
	
<?php if ($this->_tpl_vars['result'] == failure): ?>
<span id="error"><p><?php echo $this->_config[0]['vars']['editfail']; ?>
</p></span> 
<br />
<?php endif; ?>




<form action="index.php" method="post">
<p><input type="hidden" name="action" value="editmember_request" /></p>


<p><?php echo $this->_config[0]['vars']['firstname']; ?>
<br /> 
<input type="text" name="firstname" value="<?php echo $this->_tpl_vars['member'][0]['first_name']; ?>
" maxlength="40" />   <span <?php if ($this->_tpl_vars['firstname'] == error): ?> id="error" <?php endif; ?>>*</span> 
<br /> 
<?php echo $this->_config[0]['vars']['surname']; ?>
<br />
<input type="text" name="surname" value="<?php echo $this->_tpl_vars['member'][0]['surname']; ?>
" maxlength="50" /> <span <?php if ($this->_tpl_vars['surname'] == error): ?> id="error" <?php endif; ?>>*</span>
<br /> 
<?php echo $this->_config[0]['vars']['othernames']; ?>
<br />
<input type="text" name="othernames" value="<?php echo $this->_tpl_vars['member'][0]['other_names']; ?>
" maxlength="50" />
<br /> 
<?php echo $this->_config[0]['vars']['phone']; ?>
<br />
<input type="text" name="phone" value="<?php echo $this->_tpl_vars['member'][0]['phone']; ?>
" maxlength="15" /> <span <?php if ($this->_tpl_vars['phone'] == error): ?> id="error" <?php endif; ?>>*</span>
<br /> 
<?php echo $this->_config[0]['vars']['email']; ?>
<br />
<input type="text" name="email" value="<?php echo $this->_tpl_vars['member'][0]['email']; ?>
" maxlength="60" />  <span <?php if ($this->_tpl_vars['email'] == error): ?> id="error" <?php endif; ?>>*</span>
</p>


		<p>
 		<br />
		<?php echo $this->_config[0]['vars']['major']; ?>

		<br />
		<?php if ($this->_tpl_vars['lang'] == fi): ?>
		
    		<select name="majorid">
    				<option value="0"></option>
				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['majors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value="<?php echo $this->_tpl_vars['majors'][$this->_sections['i']['index']]['majorid']; ?>
" <?php if ($this->_tpl_vars['majors'][$this->_sections['i']['index']]['majorid'] == $this->_tpl_vars['member'][0]['majorid']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['majors'][$this->_sections['i']['index']]['majorfi']; ?>
</option>
				<?php endfor; endif; ?>
			</select>
			
		<?php else: ?>

			<select name="majorid">
					<option value="0"></option>
				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['majors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value="<?php echo $this->_tpl_vars['majors'][$this->_sections['i']['index']]['majorid']; ?>
" <?php if ($this->_tpl_vars['majors'][$this->_sections['i']['index']]['majorid'] == $this->_tpl_vars['member'][0]['majorid']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['majors'][$this->_sections['i']['index']]['majoren']; ?>
</option>
				<?php endfor; endif; ?>
			</select>
	
		<?php endif; ?>
		<span <?php if ($this->_tpl_vars['majorid'] == error): ?> id="error" <?php endif; ?>>*</span>
		
		</p>

		
<p>
<?php echo $this->_config[0]['vars']['ircnick']; ?>
<br />	
<input type="text" name="ircnick" value="<?php echo $this->_tpl_vars['member'][0]['ircnick']; ?>
" maxlength="20" /><br />
<?php echo $this->_config[0]['vars']['msn_messenger']; ?>
<br />
<input type="text" name="msn_messenger" value="<?php echo $this->_tpl_vars['member'][0]['msn_messenger']; ?>
" maxlength="20" /><br />
<?php echo $this->_config[0]['vars']['other_ims']; ?>
<br />
<input type="text" name="otherims" value="<?php echo $this->_tpl_vars['member'][0]['other_ims']; ?>
" maxlength="20" /></p>

<p><?php echo $this->_config[0]['vars']['commentsfi']; ?>

<br />
<textarea name="commentsfi" rows="15" cols="61" ><?php echo $this->_tpl_vars['member'][0]['commentsfi']; ?>
</textarea>
<br />
<?php echo $this->_config[0]['vars']['commentsen']; ?>

<textarea name="commentsen" rows="15" cols="61" ><?php echo $this->_tpl_vars['member'][0]['commentsen']; ?>
</textarea>


<br />
<br />
<input type="submit" value="Lähetä" />
</p>
</form>


 <?php else: ?>
 
		<p><?php echo $this->_config[0]['vars']['membersonly']; ?>
</p>

 <?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
