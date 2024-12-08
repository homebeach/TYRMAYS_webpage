<?php /* Smarty version 2.6.16, created on 2009-07-23 22:33:26
         compiled from membership.tpl */ ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['studentnumber'] == ""): ?>

<?php if ($this->_tpl_vars['lang'] == fi): ?>

<p>Kerhon j‰seneksi p‰‰set l‰hett‰m‰ll‰ hakemuksen alla olevalla lomakkeella. Kerhon vuosij‰senyys maksaa 5 euroa ja se maksetaan jollekin hallituksen j‰senelle tai pankkitilillemme. Saat tilinumeron ja viitteen, kun olet l‰hett‰nyt lomakkeen.
Jos olet opiskelija, sinun tulee antaa opiskelijanumerosi, muussa tapauksessa kent‰n voi j‰tt‰‰ tyhj‰ksi.
</p>

<p>
J‰sentiedoista pidett‰v‰n rekisterin <a href="http://www.tyrmays.net/rekisteriseloste.txt">rekisteriseloste</a>.
</p>

<p>
T‰hdell‰ merkityt kent‰t ovat pakollisia.
</p>

<p>
Jos havaitset ongelmia lomakkeen toiminnassa, ota yhteytt‰: web-developer( at )tyrmays.net.
</p>
<?php else: ?>

<p>
You can acquire membership by sending your information with the form below. Membership price is 5 euros and it can be paid to some of the board members or directly to our bank account. You will get the account number and the reference number to your email after you have sent this form. 
If you are student you need to give your studentnumber.
</p>

<p>
The fields marked with asterisk are compulsory.
</p>

<p>
If you are having problems with this form, take contact: web-developer( at )tyrmays.net.
</p>

<?php endif; ?>


<?php if ($this->_tpl_vars['result'] == success): ?>
<span id="success"><p><?php echo $this->_config[0]['vars']['joinsuccess']; ?>
</p></span> 
<br />
<?php endif; ?>

<?php if ($this->_tpl_vars['result'] == failure): ?>
<span id="error"><p><?php echo $this->_config[0]['vars']['joinfail']; ?>
</p></span> 
<br />
<?php endif; ?>


<form action="index.php" method="post">
<p><input type="hidden" name="action" value="membership_request" /></p>
<p><input type="hidden" name="lang" value="<?php echo $this->_tpl_vars['lang']; ?>
" /></p>


<p><?php echo $this->_config[0]['vars']['firstname']; ?>
<br /> 
<input type="text" name="firstname" value="<?php echo $this->_tpl_vars['member']['firstname']; ?>
" maxlength="40" />   <span <?php if ($this->_tpl_vars['firstname'] == error): ?> id="error" <?php endif; ?>>*</span> 
<br /> 
<?php echo $this->_config[0]['vars']['surname']; ?>
<br />
<input type="text" name="surname" value="<?php echo $this->_tpl_vars['member']['surname']; ?>
" maxlength="50" /> <span <?php if ($this->_tpl_vars['surname'] == error): ?> id="error" <?php endif; ?>>*</span>
<br /> 
<?php echo $this->_config[0]['vars']['othernames']; ?>
<br />
<input type="text" name="othernames" value="<?php echo $this->_tpl_vars['member']['othernames']; ?>
" maxlength="50" />
<br /> 
<?php echo $this->_config[0]['vars']['phone']; ?>
<br />
<input type="text" name="phone" value="<?php echo $this->_tpl_vars['member']['phone']; ?>
" maxlength="15" /> <span <?php if ($this->_tpl_vars['phone'] == error): ?> id="error" <?php endif; ?>>*</span>
<br /> 
<?php echo $this->_config[0]['vars']['email']; ?>
<br />
<input type="text" name="email" value="<?php echo $this->_tpl_vars['member']['email']; ?>
" maxlength="60" />  <span <?php if ($this->_tpl_vars['email'] == error): ?> id="error" <?php endif; ?>>*</span>
</p>
<p>
<input type="checkbox" name="maillist" /> <?php echo $this->_config[0]['vars']['maillist']; ?>

</p>
<p>
<input type="radio" name="membershiptype" value="notstudent" /><?php echo $this->_config[0]['vars']['notstudent']; ?>
<br />
<input type="radio" name="membershiptype" value="former"  /><?php echo $this->_config[0]['vars']['former']; ?>
<br />
<input type="radio" name="membershiptype" value="student" checked="checked" /><?php echo $this->_config[0]['vars']['student']; ?>

</p>


<table>
	<tr>
			<td >
				<img src ="images/nuolet.png" alt="Nuolet" />
			</td>
		<td>
 		<p><?php echo $this->_config[0]['vars']['studentnumber']; ?>
<input type="text" name="studentnumber" value="<?php echo $this->_tpl_vars['member']['studentnumber']; ?>
" maxlength="20" /> <span <?php if ($this->_tpl_vars['studentnumber'] == error): ?> id="error" <?php endif; ?>>*</span>
		<br /><br />
		<?php echo $this->_config[0]['vars']['major']; ?>


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
" ><?php echo $this->_tpl_vars['majors'][$this->_sections['i']['index']]['majorfi']; ?>
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
"><?php echo $this->_tpl_vars['majors'][$this->_sections['i']['index']]['majoren']; ?>
</option>
				<?php endfor; endif; ?>
			</select>
	
		<?php endif; ?>
		<span <?php if ($this->_tpl_vars['majorid'] == error): ?> id="error" <?php endif; ?>>*</span>
		
		</p>
		</td>
	</tr>
</table>	
	
	
<p>
<?php echo $this->_config[0]['vars']['password']; ?>
<br />	
<input type="password" name="password" value="" maxlength="20" /><span <?php if ($this->_tpl_vars['password'] == error): ?> id="error" <?php endif; ?>><?php if ($this->_tpl_vars['passwordsdonotmatch'] == error):  echo $this->_config[0]['vars']['passwordsdonotmatch']; ?>
 <?php else: ?> <?php endif; ?>*</span><br />
<?php echo $this->_config[0]['vars']['passwordagain']; ?>
<br />
<input type="password" name="password2" value="" maxlength="20" /><span <?php if ($this->_tpl_vars['password'] == error): ?> id="error" <?php endif; ?>><?php if ($this->_tpl_vars['passwordsdonotmatch'] == error):  echo $this->_config[0]['vars']['passwordsdonotmatch']; ?>
 <?php else: ?> <?php endif; ?>*</span><br />
<br />
<?php echo $this->_config[0]['vars']['ircnick']; ?>
<br />	
<input type="text" name="ircnick" value="<?php echo $this->_tpl_vars['member']['ircnick']; ?>
" maxlength="20" /><br />
<?php echo $this->_config[0]['vars']['msn_messenger']; ?>
<br />
<input type="text" name="msn_messenger" value="<?php echo $this->_tpl_vars['member']['msn_messenger']; ?>
" maxlength="20" /></p>

<p><?php echo $this->_config[0]['vars']['comments']; ?>

<br />
<?php if ($this->_tpl_vars['lang'] == fi): ?>
<textarea name="commentsfi" rows="15" cols="61" ><?php echo $this->_tpl_vars['member']['commentsfi']; ?>
</textarea>
<?php else: ?>
<textarea name="commentsen" rows="15" cols="61" ><?php echo $this->_tpl_vars['member']['commentsen']; ?>
</textarea>
<?php endif; ?>
<br /> 
<?php echo $this->_config[0]['vars']['bot']; ?>
<br />
<input type="text" name="bot" value="" maxlength="60" />  <span <?php if ($this->_tpl_vars['bot'] == error): ?> id="error" <?php endif; ?>>*</span>
<br />
<br />
<input type="submit" value="L‰het‰" />
</p>
</form>

 <?php else: ?>

		<p><?php echo $this->_config[0]['vars']['memberalready']; ?>
</p>

 <?php endif; ?>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
