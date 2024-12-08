<?php /* Smarty version 2.6.26, created on 2010-08-29 14:48:40
         compiled from maint_members.tpl */ ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "maint_header.tpl", 'smarty_include_vars' => array('header' => 'Event maintenance')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>TYRMÄYS Members</h1>

<h2><?php echo $this->_tpl_vars['message']; ?>
</h2>

<form action="index.php" method="post">
<p><input type="hidden" name="action" value="add_member_form"/>
<input type="submit" value="Add Member"/></p>
</form>

	<?php if ($this->_tpl_vars['iswebmaster'] == 'false'): ?>
	
	<td>
	    <form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="passwd"/>
	    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
	    	<input type="submit" value="Edit password"/></p>
	    </form>
	</td>
	
	<?php endif; ?>

<h1>Membership not yet paid:</h1>

<table class="sortable" id="nonmembers" border="1">
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['nonmembers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <tr>
    	<th></th>
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		<th></th>
    	<th></th>
     	<th></th>
     	<?php endif; ?>
     	<th></th>	    	    	    	
     	<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Student number</th>
		<th>Major subject en</th>
		<th>Major subject fi</th>
		<th>Membership requested</th>
		<th>Membership last paid</th>
		<th>Membership paid</th>
		
		<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		
		<th>Ircnick</th>
		<th>MSN Messenger</th>
		<th>Other ims</th>
		<th>Picture</th>
		<th>Last logon</th>
		
		<?php endif; ?>
		
    </tr>	
    <?php endif; ?>
    
    <?php if ($this->_tpl_vars['lastlogon'] < $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['membership_requested']): ?>
    
    	<tr style="background-color: #00FF00;">
    
    <?php else: ?>
		
        <tr>
    	
    <?php endif; ?>
    	<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="edit_member_form"/>
		    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
		    	<input type="submit" value="Edit"/></p>
		    </form>
		</td>	
	
	    <?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		
		<td>
		    <form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="passwd"/>
		    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
		    	<input type="submit" value="Edit password"/></p>
		    </form>
		</td>
	
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="add_to_board_form"/>
		    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
		    	<input type="submit" value="Add to board"/></p>
		    </form>
		</td>
			
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="add_to_officials_form"/>
		    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
		    	<input type="submit" value="Add to officials"/></p>
		    </form>
		</td>
	
		<?php endif; ?>
	
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="delete_member"/>
		    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
		    	<input type="submit" onclick="return confirm('Really delete?');" value="Delete"/></p>
		    </form>
		</td>
    
	


		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['first_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['surname']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['other_names']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['phone']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['studentnumber']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['majoren']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['majorfi']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['membership_requested']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['membership_last_paid']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['membership_paid']; ?>
</td>
		
		<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['ircnick']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['msn_messenger']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['other_ims']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['picture']; ?>
</td>
		<td><?php echo $this->_tpl_vars['nonmembers'][$this->_sections['i']['index']]['lastlogon']; ?>
</td>
		
		<?php endif; ?>
	
    	</tr>
    


    
    <?php endfor; else: ?>
        <tr>
            <td colspan="3">No members</td>
        </tr>
    <?php endif; ?>
</table>


<h1>Outdated memberships</h1>

<table class="sortable" id="obsoletemembers" border="1">
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['obsoletemembers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <tr>
    	<th></th>
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		<th></th>
    	<th></th>
     	<th></th>
     	<?php endif; ?>
     	<th></th>	    	    	    	
     	<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Student number</th>
		<th>Major subject en</th>
		<th>Major subject fi</th>
		<th>Membership requested</th>
		<th>Membership last paid</th>
		<th>Membership paid</th>
		
		<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		
		<th>Ircnick</th>
		<th>MSN Messenger</th>
		<th>Other ims</th>
		<th>Picture</th>
		<th>Last logon</th>
		
		<?php endif; ?>
    </tr>	
    <?php endif; ?>
    
    <?php if ($this->_tpl_vars['lastlogon'] < $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['membership_requested']): ?>
    
    	<tr style="background-color: #00FF00;">
    
    <?php else: ?>
		
        <tr>
    	
    <?php endif; ?>
    	<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="edit_member_form"/>
		    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
		    	<input type="submit" value="Edit"/></p>
		    </form>
		</td>	
	
	    <?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		
		<td>
		    <form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="passwd"/>
		    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
		    	<input type="submit" value="Edit password"/></p>
		    </form>
		</td>
	
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="add_to_board_form"/>
		    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
		    	<input type="submit" value="Add to board"/></p>
		    </form>
		</td>
			
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="add_to_officials_form"/>
		    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
		    	<input type="submit" value="Add to officials"/></p>
		    </form>
		</td>
	
		<?php endif; ?>
	
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="delete_member"/>
		    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
		    	<input type="submit" onclick="return confirm('Really delete?');" value="Delete"/></p>
		    </form>
		</td>
    

		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['first_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['surname']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['other_names']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['phone']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['studentnumber']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['majoren']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['majorfi']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['membership_requested']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['membership_last_paid']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['membership_paid']; ?>
</td>
		
		<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['ircnick']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['msn_messenger']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['other_ims']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['picture']; ?>
</td>
		<td><?php echo $this->_tpl_vars['obsoletemembers'][$this->_sections['i']['index']]['lastlogon']; ?>
</td>
		
		<?php endif; ?>
	
    	</tr>
    
    	
    <?php endfor; else: ?>
        <tr>
            <td colspan="3">No members</td>
        </tr>
    <?php endif; ?>
</table>
	
<h1>Members</h1>

<table class="sortable" id="members"  border="1">
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['members']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <tr>
    	<th></th>
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		<th></th>
    	<th></th>
     	<th></th>
     	<?php endif; ?>
     	<th></th>	    	    	    	
     	<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Student number</th>
		<th>Major subject en</th>
		<th>Major subject fi</th>
		<th>Membership requested</th>
		<th>Membership last paid</th>
		<th>Membership paid</th>
		
		<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		
		<th>Ircnick</th>
		<th>MSN Messenger</th>
		<th>Other ims</th>
		<th>Picture</th>
		<th>Last logon</th>
		
		<?php endif; ?>
		
    </tr>	
    <?php endif; ?>
    <tr>
    
    <td>
		<form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="edit_member_form"/>
	    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
	    	<input type="submit" value="Edit"/></p>
	    </form>
	</td>	

    <?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
	
	<td>
	    <form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="passwd"/>
	    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
	    	<input type="submit" value="Edit password"/></p>
	    </form>
	</td>
	
	<td>
		<form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="add_to_board_form"/>
	    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
	    	<input type="submit" value="Add to board"/></p>
	    </form>
	</td>
		
	<td>
		<form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="add_to_officials_form"/>
	    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
	    	<input type="submit" value="Add to officials"/></p>
	    </form>
	</td>
	
	<?php endif; ?>

	<td>
		<form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="delete_member"/>
	    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
	    	<input type="submit" onclick="return confirm('Really delete?');" value="Delete"/></p>
	    </form>
	</td>
    
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['first_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['surname']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['other_names']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['phone']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['studentnumber']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['majoren']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['majorfi']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['membership_requested']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['membership_last_paid']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['membership_paid']; ?>
</td>
		
		<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
		
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['ircnick']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['msn_messenger']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['other_ims']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['picture']; ?>
</td>
		<td><?php echo $this->_tpl_vars['members'][$this->_sections['i']['index']]['lastlogon']; ?>
</td>
		
		<?php endif; ?>
	
    </tr>
    <?php endfor; else: ?>
        <tr>
            <td colspan="3">No members</td>
        </tr>
    <?php endif; ?>
</table>

<h1>Current Board members</h1>

<table class="sortable" id="boardmembers" border="1">
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
    <tr>
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
    	<th></th>
    	<?php endif; ?>
		<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Status EN</th>
		<th>Status FI</th>
		<th>Year</th>
    </tr>
    <?php endif; ?>
    <tr>
    
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
    	
    	<td>
			<form action="index.php" method="post">
	    	<p>
	    	<input type="hidden" name="action" value="delete_member_from_board"/>
	    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
	    	<input type="hidden" name="year" value="<?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['year']; ?>
"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from board"/>
	    	</p>
	    	</form>
		</td>
		
    	<?php endif; ?>
		
		<td><?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['first_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['surname']; ?>
</td>
		<td><?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['other_names']; ?>
</td>
		<td><?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['statusen']; ?>
</td>
		<td><?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['statusfi']; ?>
</td>
		<td><?php echo $this->_tpl_vars['board'][$this->_sections['i']['index']]['year']; ?>
</td>
	

    </tr>
    <?php endfor; else: ?>
        <tr>
            <td colspan="3">No current board.</td>
        </tr>
    <?php endif; ?>
</table>

<h1>Past board members</h1>

<table class="sortable" id="pastboardmembers" border="1">
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['oldboard']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <tr>
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
        <th></th>
        <?php endif; ?>
		<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Status EN</th>
		<th>Status FI</th>
		<th>Year</th>
    </tr>	
    <?php endif; ?>
    <tr>
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
    	
    	<td>
			<form action="index.php" method="post">
			<p>
	    	<input type="hidden" name="action" value="delete_member_from_board"/>
	    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['oldboard'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
	    	<input type="hidden" name="year" value="<?php echo $this->_tpl_vars['oldboard'][$this->_sections['i']['index']]['year']; ?>
"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from board"/>
	    	</p>
	    	</form>
		</td>
		
    	<?php endif; ?>
    	
		<td><?php echo $this->_tpl_vars['oldboard'][$this->_sections['i']['index']]['first_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldboard'][$this->_sections['i']['index']]['surname']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldboard'][$this->_sections['i']['index']]['other_names']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldboard'][$this->_sections['i']['index']]['statusen']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldboard'][$this->_sections['i']['index']]['statusfi']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldboard'][$this->_sections['i']['index']]['year']; ?>
</td>
	

    </tr>
    <?php endfor; else: ?>
        <tr>
            <td colspan="3">No board members in the past.</td>
        </tr>
    <?php endif; ?>
</table>

<h1>Current Officials</h1>

<table class="sortable" id="currentofficials" border="1">
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
    <?php if ($this->_sections['i']['first']): ?>
    <tr>
    
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
        <td></td>
        <?php endif; ?>
        	
		<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Status EN</th>
		<th>Status FI</th>
		<th>Year</th>
    </tr>	
    <?php endif; ?>
    <tr>
    
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
    	<td>
			<form action="index.php" method="post">
			<p>
	    	<input type="hidden" name="action" value="delete_member_from_officials"/>
	    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
	    	<input type="hidden" name="year" value="<?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['year']; ?>
"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from officials"/>
	    	</p>
	    	</form>
		</td>
    	<?php endif; ?>
    	
		<td><?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['first_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['surname']; ?>
</td>
		<td><?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['other_names']; ?>
</td>
		<td><?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['statusen']; ?>
</td>
		<td><?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['statusfi']; ?>
</td>
		<td><?php echo $this->_tpl_vars['officials'][$this->_sections['i']['index']]['year']; ?>
</td>
	

    </tr>
    <?php endfor; else: ?>
        <tr>
            <td colspan="3">No officials currently.</td>
        </tr>
    <?php endif; ?>
</table>

<h1>Past Officials</h1>

<table class="sortable" id="pastofficials" border="1">
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['oldofficials']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <tr>
    
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
        <th></th>
        <?php endif; ?>
        
		<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Student number</th>
		<th>Ircnick</th>
		<th>Status EN</th>
		<th>Status FI</th>
		<th>Picture</th>
		<th>Comments EN</th>
		<th>Comments FI</th>
		<th>Year</th>
    </tr>	
    <?php endif; ?>
    <tr>
    
    	<?php if ($this->_tpl_vars['iswebmaster'] == 'true'): ?>
    	<td>
			<form action="index.php" method="post">
			<p>
	    	<input type="hidden" name="action" value="delete_member_from_officials"/>
	    	<input type="hidden" name="studentnumber" value="<?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['studentnumber']; ?>
"/>
	    	<input type="hidden" name="year" value="<?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['year']; ?>
"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from officials"/>
	    	</p>
	    	</form>
		</td>
    	<?php endif; ?>
    	
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['first_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['surname']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['other_names']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['phone']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['studentnumber']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['ircnick']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['statusen']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['statusfi']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['picture']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['commentsen']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['commentsfi']; ?>
</td>
		<td><?php echo $this->_tpl_vars['oldofficials'][$this->_sections['i']['index']]['year']; ?>
</td>
	
    </tr>
    <?php endfor; else: ?>
        <tr>
            <td colspan="3">No officials in the past.</td>
        </tr>
    <?php endif; ?>
</table>

<form action="index.php" method="post">
<p>
<input type="hidden" name="action" value="main"/>
<input type="submit" value="Back to main menu"/>
</p>
</form>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "maint_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
