<?php /* Smarty version 2.6.26, created on 2010-09-23 15:10:49
         compiled from maint_edit_member.tpl */ ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "maint_header.tpl", 'smarty_include_vars' => array('header' => 'Edit member')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>Edit member</h1>

<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['member']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

<form id="editMemberForm" action="index.php" method="post">
<p><input type="hidden" name="action" value="edit_member" /></p>
<p><input type="hidden" name="studentnumber" size="40" maxlength="40" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['studentnumber']; ?>
" /></p>

<table>

<tr>
<td>First name</td>
<td><input type="text" name="firstname" size="40" maxlength="40" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['first_name']; ?>
" /></td>
</tr>

<tr>
<td>Surname</td>
<td><input type="text" name="surname" size="40" maxlength="50" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['surname']; ?>
" /></td>
</tr>

<tr>
<td>Other names</td>
<td><input type="text" name="othernames" size="40" maxlength="50" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['other_names']; ?>
" /></td>
</tr>

<tr>
<td>Phone</td>
<td><input type="text" name="phone" size="40" maxlength="40" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['phone']; ?>
" /></td>
</tr>

<tr>
<td>E-Mail</td>
<td><input type="text" name="email" size="40" maxlength="40" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['email']; ?>
" /></td>
</tr>

<tr>
<td>Major</td>
<td>
<select name="majorid">
<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['majors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<option value="<?php echo $this->_tpl_vars['majors'][$this->_sections['j']['index']]['majorid']; ?>
" <?php if ($this->_tpl_vars['majors'][$this->_sections['j']['index']]['majorid'] == $this->_tpl_vars['member'][$this->_sections['i']['index']]['majorid']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['majors'][$this->_sections['j']['index']]['majorfi']; ?>
</option>
<?php endfor; endif; ?>
</select>
</td>
</tr>

<tr>
<td>Membership request date </td>
<td>
<select name="requestday" size="1">
	<?php unset($this->_sections['dayloop']);
$this->_sections['dayloop']['name'] = 'dayloop';
$this->_sections['dayloop']['start'] = (int)1;
$this->_sections['dayloop']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dayloop']['show'] = true;
$this->_sections['dayloop']['max'] = $this->_sections['dayloop']['loop'];
$this->_sections['dayloop']['step'] = 1;
if ($this->_sections['dayloop']['start'] < 0)
    $this->_sections['dayloop']['start'] = max($this->_sections['dayloop']['step'] > 0 ? 0 : -1, $this->_sections['dayloop']['loop'] + $this->_sections['dayloop']['start']);
else
    $this->_sections['dayloop']['start'] = min($this->_sections['dayloop']['start'], $this->_sections['dayloop']['step'] > 0 ? $this->_sections['dayloop']['loop'] : $this->_sections['dayloop']['loop']-1);
if ($this->_sections['dayloop']['show']) {
    $this->_sections['dayloop']['total'] = min(ceil(($this->_sections['dayloop']['step'] > 0 ? $this->_sections['dayloop']['loop'] - $this->_sections['dayloop']['start'] : $this->_sections['dayloop']['start']+1)/abs($this->_sections['dayloop']['step'])), $this->_sections['dayloop']['max']);
    if ($this->_sections['dayloop']['total'] == 0)
        $this->_sections['dayloop']['show'] = false;
} else
    $this->_sections['dayloop']['total'] = 0;
if ($this->_sections['dayloop']['show']):

            for ($this->_sections['dayloop']['index'] = $this->_sections['dayloop']['start'], $this->_sections['dayloop']['iteration'] = 1;
                 $this->_sections['dayloop']['iteration'] <= $this->_sections['dayloop']['total'];
                 $this->_sections['dayloop']['index'] += $this->_sections['dayloop']['step'], $this->_sections['dayloop']['iteration']++):
$this->_sections['dayloop']['rownum'] = $this->_sections['dayloop']['iteration'];
$this->_sections['dayloop']['index_prev'] = $this->_sections['dayloop']['index'] - $this->_sections['dayloop']['step'];
$this->_sections['dayloop']['index_next'] = $this->_sections['dayloop']['index'] + $this->_sections['dayloop']['step'];
$this->_sections['dayloop']['first']      = ($this->_sections['dayloop']['iteration'] == 1);
$this->_sections['dayloop']['last']       = ($this->_sections['dayloop']['iteration'] == $this->_sections['dayloop']['total']);
?>

 		<option value="<?php echo $this->_sections['dayloop']['index']; ?>
" <?php if ($this->_sections['dayloop']['index'] == $this->_tpl_vars['membership_requestedday']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['dayloop']['index']; ?>
</option>

	<?php endfor; endif; ?>
</select>

<select name="requestmonth" size="1">
	<?php unset($this->_sections['monthloop']);
$this->_sections['monthloop']['name'] = 'monthloop';
$this->_sections['monthloop']['start'] = (int)1;
$this->_sections['monthloop']['loop'] = is_array($_loop=13) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['monthloop']['show'] = true;
$this->_sections['monthloop']['max'] = $this->_sections['monthloop']['loop'];
$this->_sections['monthloop']['step'] = 1;
if ($this->_sections['monthloop']['start'] < 0)
    $this->_sections['monthloop']['start'] = max($this->_sections['monthloop']['step'] > 0 ? 0 : -1, $this->_sections['monthloop']['loop'] + $this->_sections['monthloop']['start']);
else
    $this->_sections['monthloop']['start'] = min($this->_sections['monthloop']['start'], $this->_sections['monthloop']['step'] > 0 ? $this->_sections['monthloop']['loop'] : $this->_sections['monthloop']['loop']-1);
if ($this->_sections['monthloop']['show']) {
    $this->_sections['monthloop']['total'] = min(ceil(($this->_sections['monthloop']['step'] > 0 ? $this->_sections['monthloop']['loop'] - $this->_sections['monthloop']['start'] : $this->_sections['monthloop']['start']+1)/abs($this->_sections['monthloop']['step'])), $this->_sections['monthloop']['max']);
    if ($this->_sections['monthloop']['total'] == 0)
        $this->_sections['monthloop']['show'] = false;
} else
    $this->_sections['monthloop']['total'] = 0;
if ($this->_sections['monthloop']['show']):

            for ($this->_sections['monthloop']['index'] = $this->_sections['monthloop']['start'], $this->_sections['monthloop']['iteration'] = 1;
                 $this->_sections['monthloop']['iteration'] <= $this->_sections['monthloop']['total'];
                 $this->_sections['monthloop']['index'] += $this->_sections['monthloop']['step'], $this->_sections['monthloop']['iteration']++):
$this->_sections['monthloop']['rownum'] = $this->_sections['monthloop']['iteration'];
$this->_sections['monthloop']['index_prev'] = $this->_sections['monthloop']['index'] - $this->_sections['monthloop']['step'];
$this->_sections['monthloop']['index_next'] = $this->_sections['monthloop']['index'] + $this->_sections['monthloop']['step'];
$this->_sections['monthloop']['first']      = ($this->_sections['monthloop']['iteration'] == 1);
$this->_sections['monthloop']['last']       = ($this->_sections['monthloop']['iteration'] == $this->_sections['monthloop']['total']);
?>

 		<option value="<?php echo $this->_sections['monthloop']['index']; ?>
" <?php if ($this->_sections['monthloop']['index'] == $this->_tpl_vars['membership_requestedmonth']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['monthloop']['index']; ?>
</option>

	<?php endfor; endif; ?>
</select>

<select name="requestyear" size="1">
	<?php unset($this->_sections['yearloop']);
$this->_sections['yearloop']['name'] = 'yearloop';
$this->_sections['yearloop']['start'] = (int)2007;
$this->_sections['yearloop']['loop'] = is_array($_loop=2011) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['yearloop']['show'] = true;
$this->_sections['yearloop']['max'] = $this->_sections['yearloop']['loop'];
$this->_sections['yearloop']['step'] = 1;
if ($this->_sections['yearloop']['start'] < 0)
    $this->_sections['yearloop']['start'] = max($this->_sections['yearloop']['step'] > 0 ? 0 : -1, $this->_sections['yearloop']['loop'] + $this->_sections['yearloop']['start']);
else
    $this->_sections['yearloop']['start'] = min($this->_sections['yearloop']['start'], $this->_sections['yearloop']['step'] > 0 ? $this->_sections['yearloop']['loop'] : $this->_sections['yearloop']['loop']-1);
if ($this->_sections['yearloop']['show']) {
    $this->_sections['yearloop']['total'] = min(ceil(($this->_sections['yearloop']['step'] > 0 ? $this->_sections['yearloop']['loop'] - $this->_sections['yearloop']['start'] : $this->_sections['yearloop']['start']+1)/abs($this->_sections['yearloop']['step'])), $this->_sections['yearloop']['max']);
    if ($this->_sections['yearloop']['total'] == 0)
        $this->_sections['yearloop']['show'] = false;
} else
    $this->_sections['yearloop']['total'] = 0;
if ($this->_sections['yearloop']['show']):

            for ($this->_sections['yearloop']['index'] = $this->_sections['yearloop']['start'], $this->_sections['yearloop']['iteration'] = 1;
                 $this->_sections['yearloop']['iteration'] <= $this->_sections['yearloop']['total'];
                 $this->_sections['yearloop']['index'] += $this->_sections['yearloop']['step'], $this->_sections['yearloop']['iteration']++):
$this->_sections['yearloop']['rownum'] = $this->_sections['yearloop']['iteration'];
$this->_sections['yearloop']['index_prev'] = $this->_sections['yearloop']['index'] - $this->_sections['yearloop']['step'];
$this->_sections['yearloop']['index_next'] = $this->_sections['yearloop']['index'] + $this->_sections['yearloop']['step'];
$this->_sections['yearloop']['first']      = ($this->_sections['yearloop']['iteration'] == 1);
$this->_sections['yearloop']['last']       = ($this->_sections['yearloop']['iteration'] == $this->_sections['yearloop']['total']);
?>

 		<option value="<?php echo $this->_sections['yearloop']['index']; ?>
" <?php if ($this->_sections['yearloop']['index'] == $this->_tpl_vars['membership_requestedyear']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['yearloop']['index']; ?>
</option>

	<?php endfor; endif; ?>
</select>

</td>
</tr>

<tr>
<td>Membership request time</td>
<td>

<select name="requesthour" size="1">
	<?php unset($this->_sections['hourloop']);
$this->_sections['hourloop']['name'] = 'hourloop';
$this->_sections['hourloop']['start'] = (int)00;
$this->_sections['hourloop']['loop'] = is_array($_loop=24) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hourloop']['show'] = true;
$this->_sections['hourloop']['max'] = $this->_sections['hourloop']['loop'];
$this->_sections['hourloop']['step'] = 1;
if ($this->_sections['hourloop']['start'] < 0)
    $this->_sections['hourloop']['start'] = max($this->_sections['hourloop']['step'] > 0 ? 0 : -1, $this->_sections['hourloop']['loop'] + $this->_sections['hourloop']['start']);
else
    $this->_sections['hourloop']['start'] = min($this->_sections['hourloop']['start'], $this->_sections['hourloop']['step'] > 0 ? $this->_sections['hourloop']['loop'] : $this->_sections['hourloop']['loop']-1);
if ($this->_sections['hourloop']['show']) {
    $this->_sections['hourloop']['total'] = min(ceil(($this->_sections['hourloop']['step'] > 0 ? $this->_sections['hourloop']['loop'] - $this->_sections['hourloop']['start'] : $this->_sections['hourloop']['start']+1)/abs($this->_sections['hourloop']['step'])), $this->_sections['hourloop']['max']);
    if ($this->_sections['hourloop']['total'] == 0)
        $this->_sections['hourloop']['show'] = false;
} else
    $this->_sections['hourloop']['total'] = 0;
if ($this->_sections['hourloop']['show']):

            for ($this->_sections['hourloop']['index'] = $this->_sections['hourloop']['start'], $this->_sections['hourloop']['iteration'] = 1;
                 $this->_sections['hourloop']['iteration'] <= $this->_sections['hourloop']['total'];
                 $this->_sections['hourloop']['index'] += $this->_sections['hourloop']['step'], $this->_sections['hourloop']['iteration']++):
$this->_sections['hourloop']['rownum'] = $this->_sections['hourloop']['iteration'];
$this->_sections['hourloop']['index_prev'] = $this->_sections['hourloop']['index'] - $this->_sections['hourloop']['step'];
$this->_sections['hourloop']['index_next'] = $this->_sections['hourloop']['index'] + $this->_sections['hourloop']['step'];
$this->_sections['hourloop']['first']      = ($this->_sections['hourloop']['iteration'] == 1);
$this->_sections['hourloop']['last']       = ($this->_sections['hourloop']['iteration'] == $this->_sections['hourloop']['total']);
?>

 		<option value="<?php echo $this->_sections['hourloop']['index']; ?>
" <?php if ($this->_sections['hourloop']['index'] == $this->_tpl_vars['membership_requestedhour']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['hourloop']['index']; ?>
</option>

	<?php endfor; endif; ?>
</select>

<select name="requestminute" size="1">
	<?php unset($this->_sections['minuteloop']);
$this->_sections['minuteloop']['name'] = 'minuteloop';
$this->_sections['minuteloop']['start'] = (int)00;
$this->_sections['minuteloop']['loop'] = is_array($_loop=60) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['minuteloop']['show'] = true;
$this->_sections['minuteloop']['max'] = $this->_sections['minuteloop']['loop'];
$this->_sections['minuteloop']['step'] = 1;
if ($this->_sections['minuteloop']['start'] < 0)
    $this->_sections['minuteloop']['start'] = max($this->_sections['minuteloop']['step'] > 0 ? 0 : -1, $this->_sections['minuteloop']['loop'] + $this->_sections['minuteloop']['start']);
else
    $this->_sections['minuteloop']['start'] = min($this->_sections['minuteloop']['start'], $this->_sections['minuteloop']['step'] > 0 ? $this->_sections['minuteloop']['loop'] : $this->_sections['minuteloop']['loop']-1);
if ($this->_sections['minuteloop']['show']) {
    $this->_sections['minuteloop']['total'] = min(ceil(($this->_sections['minuteloop']['step'] > 0 ? $this->_sections['minuteloop']['loop'] - $this->_sections['minuteloop']['start'] : $this->_sections['minuteloop']['start']+1)/abs($this->_sections['minuteloop']['step'])), $this->_sections['minuteloop']['max']);
    if ($this->_sections['minuteloop']['total'] == 0)
        $this->_sections['minuteloop']['show'] = false;
} else
    $this->_sections['minuteloop']['total'] = 0;
if ($this->_sections['minuteloop']['show']):

            for ($this->_sections['minuteloop']['index'] = $this->_sections['minuteloop']['start'], $this->_sections['minuteloop']['iteration'] = 1;
                 $this->_sections['minuteloop']['iteration'] <= $this->_sections['minuteloop']['total'];
                 $this->_sections['minuteloop']['index'] += $this->_sections['minuteloop']['step'], $this->_sections['minuteloop']['iteration']++):
$this->_sections['minuteloop']['rownum'] = $this->_sections['minuteloop']['iteration'];
$this->_sections['minuteloop']['index_prev'] = $this->_sections['minuteloop']['index'] - $this->_sections['minuteloop']['step'];
$this->_sections['minuteloop']['index_next'] = $this->_sections['minuteloop']['index'] + $this->_sections['minuteloop']['step'];
$this->_sections['minuteloop']['first']      = ($this->_sections['minuteloop']['iteration'] == 1);
$this->_sections['minuteloop']['last']       = ($this->_sections['minuteloop']['iteration'] == $this->_sections['minuteloop']['total']);
?>

 		<option value="<?php echo $this->_sections['minuteloop']['index']; ?>
" <?php if ($this->_sections['minuteloop']['index'] == $this->_tpl_vars['membership_requestedminute']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['minuteloop']['index']; ?>
</option>

	<?php endfor; endif; ?>
</select>

</td>
</tr>

<tr>
<td>Membership last paid date</td>
<td>
<select name="payday" size="1">
	<?php unset($this->_sections['dayloop']);
$this->_sections['dayloop']['name'] = 'dayloop';
$this->_sections['dayloop']['start'] = (int)1;
$this->_sections['dayloop']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dayloop']['show'] = true;
$this->_sections['dayloop']['max'] = $this->_sections['dayloop']['loop'];
$this->_sections['dayloop']['step'] = 1;
if ($this->_sections['dayloop']['start'] < 0)
    $this->_sections['dayloop']['start'] = max($this->_sections['dayloop']['step'] > 0 ? 0 : -1, $this->_sections['dayloop']['loop'] + $this->_sections['dayloop']['start']);
else
    $this->_sections['dayloop']['start'] = min($this->_sections['dayloop']['start'], $this->_sections['dayloop']['step'] > 0 ? $this->_sections['dayloop']['loop'] : $this->_sections['dayloop']['loop']-1);
if ($this->_sections['dayloop']['show']) {
    $this->_sections['dayloop']['total'] = min(ceil(($this->_sections['dayloop']['step'] > 0 ? $this->_sections['dayloop']['loop'] - $this->_sections['dayloop']['start'] : $this->_sections['dayloop']['start']+1)/abs($this->_sections['dayloop']['step'])), $this->_sections['dayloop']['max']);
    if ($this->_sections['dayloop']['total'] == 0)
        $this->_sections['dayloop']['show'] = false;
} else
    $this->_sections['dayloop']['total'] = 0;
if ($this->_sections['dayloop']['show']):

            for ($this->_sections['dayloop']['index'] = $this->_sections['dayloop']['start'], $this->_sections['dayloop']['iteration'] = 1;
                 $this->_sections['dayloop']['iteration'] <= $this->_sections['dayloop']['total'];
                 $this->_sections['dayloop']['index'] += $this->_sections['dayloop']['step'], $this->_sections['dayloop']['iteration']++):
$this->_sections['dayloop']['rownum'] = $this->_sections['dayloop']['iteration'];
$this->_sections['dayloop']['index_prev'] = $this->_sections['dayloop']['index'] - $this->_sections['dayloop']['step'];
$this->_sections['dayloop']['index_next'] = $this->_sections['dayloop']['index'] + $this->_sections['dayloop']['step'];
$this->_sections['dayloop']['first']      = ($this->_sections['dayloop']['iteration'] == 1);
$this->_sections['dayloop']['last']       = ($this->_sections['dayloop']['iteration'] == $this->_sections['dayloop']['total']);
?>

 		<option value="<?php echo $this->_sections['dayloop']['index']; ?>
" <?php if ($this->_sections['dayloop']['index'] == $this->_tpl_vars['membership_last_paidday']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['dayloop']['index']; ?>
</option>

	<?php endfor; endif; ?>
</select>

<select name="paymonth" size="1">
	<?php unset($this->_sections['monthloop']);
$this->_sections['monthloop']['name'] = 'monthloop';
$this->_sections['monthloop']['start'] = (int)1;
$this->_sections['monthloop']['loop'] = is_array($_loop=13) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['monthloop']['show'] = true;
$this->_sections['monthloop']['max'] = $this->_sections['monthloop']['loop'];
$this->_sections['monthloop']['step'] = 1;
if ($this->_sections['monthloop']['start'] < 0)
    $this->_sections['monthloop']['start'] = max($this->_sections['monthloop']['step'] > 0 ? 0 : -1, $this->_sections['monthloop']['loop'] + $this->_sections['monthloop']['start']);
else
    $this->_sections['monthloop']['start'] = min($this->_sections['monthloop']['start'], $this->_sections['monthloop']['step'] > 0 ? $this->_sections['monthloop']['loop'] : $this->_sections['monthloop']['loop']-1);
if ($this->_sections['monthloop']['show']) {
    $this->_sections['monthloop']['total'] = min(ceil(($this->_sections['monthloop']['step'] > 0 ? $this->_sections['monthloop']['loop'] - $this->_sections['monthloop']['start'] : $this->_sections['monthloop']['start']+1)/abs($this->_sections['monthloop']['step'])), $this->_sections['monthloop']['max']);
    if ($this->_sections['monthloop']['total'] == 0)
        $this->_sections['monthloop']['show'] = false;
} else
    $this->_sections['monthloop']['total'] = 0;
if ($this->_sections['monthloop']['show']):

            for ($this->_sections['monthloop']['index'] = $this->_sections['monthloop']['start'], $this->_sections['monthloop']['iteration'] = 1;
                 $this->_sections['monthloop']['iteration'] <= $this->_sections['monthloop']['total'];
                 $this->_sections['monthloop']['index'] += $this->_sections['monthloop']['step'], $this->_sections['monthloop']['iteration']++):
$this->_sections['monthloop']['rownum'] = $this->_sections['monthloop']['iteration'];
$this->_sections['monthloop']['index_prev'] = $this->_sections['monthloop']['index'] - $this->_sections['monthloop']['step'];
$this->_sections['monthloop']['index_next'] = $this->_sections['monthloop']['index'] + $this->_sections['monthloop']['step'];
$this->_sections['monthloop']['first']      = ($this->_sections['monthloop']['iteration'] == 1);
$this->_sections['monthloop']['last']       = ($this->_sections['monthloop']['iteration'] == $this->_sections['monthloop']['total']);
?>

 		<option value="<?php echo $this->_sections['monthloop']['index']; ?>
" <?php if ($this->_sections['monthloop']['index'] == $this->_tpl_vars['membership_last_paidmonth']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['monthloop']['index']; ?>
</option>

	<?php endfor; endif; ?>
</select>

<select name="payyear" size="1">
	<?php unset($this->_sections['yearloop']);
$this->_sections['yearloop']['name'] = 'yearloop';
$this->_sections['yearloop']['start'] = (int)2007;
$this->_sections['yearloop']['loop'] = is_array($_loop=2011) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['yearloop']['show'] = true;
$this->_sections['yearloop']['max'] = $this->_sections['yearloop']['loop'];
$this->_sections['yearloop']['step'] = 1;
if ($this->_sections['yearloop']['start'] < 0)
    $this->_sections['yearloop']['start'] = max($this->_sections['yearloop']['step'] > 0 ? 0 : -1, $this->_sections['yearloop']['loop'] + $this->_sections['yearloop']['start']);
else
    $this->_sections['yearloop']['start'] = min($this->_sections['yearloop']['start'], $this->_sections['yearloop']['step'] > 0 ? $this->_sections['yearloop']['loop'] : $this->_sections['yearloop']['loop']-1);
if ($this->_sections['yearloop']['show']) {
    $this->_sections['yearloop']['total'] = min(ceil(($this->_sections['yearloop']['step'] > 0 ? $this->_sections['yearloop']['loop'] - $this->_sections['yearloop']['start'] : $this->_sections['yearloop']['start']+1)/abs($this->_sections['yearloop']['step'])), $this->_sections['yearloop']['max']);
    if ($this->_sections['yearloop']['total'] == 0)
        $this->_sections['yearloop']['show'] = false;
} else
    $this->_sections['yearloop']['total'] = 0;
if ($this->_sections['yearloop']['show']):

            for ($this->_sections['yearloop']['index'] = $this->_sections['yearloop']['start'], $this->_sections['yearloop']['iteration'] = 1;
                 $this->_sections['yearloop']['iteration'] <= $this->_sections['yearloop']['total'];
                 $this->_sections['yearloop']['index'] += $this->_sections['yearloop']['step'], $this->_sections['yearloop']['iteration']++):
$this->_sections['yearloop']['rownum'] = $this->_sections['yearloop']['iteration'];
$this->_sections['yearloop']['index_prev'] = $this->_sections['yearloop']['index'] - $this->_sections['yearloop']['step'];
$this->_sections['yearloop']['index_next'] = $this->_sections['yearloop']['index'] + $this->_sections['yearloop']['step'];
$this->_sections['yearloop']['first']      = ($this->_sections['yearloop']['iteration'] == 1);
$this->_sections['yearloop']['last']       = ($this->_sections['yearloop']['iteration'] == $this->_sections['yearloop']['total']);
?>

 		<option value="<?php echo $this->_sections['yearloop']['index']; ?>
" <?php if ($this->_sections['yearloop']['index'] == $this->_tpl_vars['membership_last_paidyear']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['yearloop']['index']; ?>
</option>

	<?php endfor; endif; ?>
</select>

</td>
</tr>

<tr>
<td>Membership last paid time</td>
<td>

<select name="payhour" size="1">
	<?php unset($this->_sections['hourloop']);
$this->_sections['hourloop']['name'] = 'hourloop';
$this->_sections['hourloop']['start'] = (int)00;
$this->_sections['hourloop']['loop'] = is_array($_loop=24) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hourloop']['show'] = true;
$this->_sections['hourloop']['max'] = $this->_sections['hourloop']['loop'];
$this->_sections['hourloop']['step'] = 1;
if ($this->_sections['hourloop']['start'] < 0)
    $this->_sections['hourloop']['start'] = max($this->_sections['hourloop']['step'] > 0 ? 0 : -1, $this->_sections['hourloop']['loop'] + $this->_sections['hourloop']['start']);
else
    $this->_sections['hourloop']['start'] = min($this->_sections['hourloop']['start'], $this->_sections['hourloop']['step'] > 0 ? $this->_sections['hourloop']['loop'] : $this->_sections['hourloop']['loop']-1);
if ($this->_sections['hourloop']['show']) {
    $this->_sections['hourloop']['total'] = min(ceil(($this->_sections['hourloop']['step'] > 0 ? $this->_sections['hourloop']['loop'] - $this->_sections['hourloop']['start'] : $this->_sections['hourloop']['start']+1)/abs($this->_sections['hourloop']['step'])), $this->_sections['hourloop']['max']);
    if ($this->_sections['hourloop']['total'] == 0)
        $this->_sections['hourloop']['show'] = false;
} else
    $this->_sections['hourloop']['total'] = 0;
if ($this->_sections['hourloop']['show']):

            for ($this->_sections['hourloop']['index'] = $this->_sections['hourloop']['start'], $this->_sections['hourloop']['iteration'] = 1;
                 $this->_sections['hourloop']['iteration'] <= $this->_sections['hourloop']['total'];
                 $this->_sections['hourloop']['index'] += $this->_sections['hourloop']['step'], $this->_sections['hourloop']['iteration']++):
$this->_sections['hourloop']['rownum'] = $this->_sections['hourloop']['iteration'];
$this->_sections['hourloop']['index_prev'] = $this->_sections['hourloop']['index'] - $this->_sections['hourloop']['step'];
$this->_sections['hourloop']['index_next'] = $this->_sections['hourloop']['index'] + $this->_sections['hourloop']['step'];
$this->_sections['hourloop']['first']      = ($this->_sections['hourloop']['iteration'] == 1);
$this->_sections['hourloop']['last']       = ($this->_sections['hourloop']['iteration'] == $this->_sections['hourloop']['total']);
?>

 		<option value="<?php echo $this->_sections['hourloop']['index']; ?>
" <?php if ($this->_sections['hourloop']['index'] == $this->_tpl_vars['membership_last_paidhour']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['hourloop']['index']; ?>
</option>

	<?php endfor; endif; ?>
</select>

<select name="payminute" size="1">
	<?php unset($this->_sections['minuteloop']);
$this->_sections['minuteloop']['name'] = 'minuteloop';
$this->_sections['minuteloop']['start'] = (int)00;
$this->_sections['minuteloop']['loop'] = is_array($_loop=60) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['minuteloop']['show'] = true;
$this->_sections['minuteloop']['max'] = $this->_sections['minuteloop']['loop'];
$this->_sections['minuteloop']['step'] = 1;
if ($this->_sections['minuteloop']['start'] < 0)
    $this->_sections['minuteloop']['start'] = max($this->_sections['minuteloop']['step'] > 0 ? 0 : -1, $this->_sections['minuteloop']['loop'] + $this->_sections['minuteloop']['start']);
else
    $this->_sections['minuteloop']['start'] = min($this->_sections['minuteloop']['start'], $this->_sections['minuteloop']['step'] > 0 ? $this->_sections['minuteloop']['loop'] : $this->_sections['minuteloop']['loop']-1);
if ($this->_sections['minuteloop']['show']) {
    $this->_sections['minuteloop']['total'] = min(ceil(($this->_sections['minuteloop']['step'] > 0 ? $this->_sections['minuteloop']['loop'] - $this->_sections['minuteloop']['start'] : $this->_sections['minuteloop']['start']+1)/abs($this->_sections['minuteloop']['step'])), $this->_sections['minuteloop']['max']);
    if ($this->_sections['minuteloop']['total'] == 0)
        $this->_sections['minuteloop']['show'] = false;
} else
    $this->_sections['minuteloop']['total'] = 0;
if ($this->_sections['minuteloop']['show']):

            for ($this->_sections['minuteloop']['index'] = $this->_sections['minuteloop']['start'], $this->_sections['minuteloop']['iteration'] = 1;
                 $this->_sections['minuteloop']['iteration'] <= $this->_sections['minuteloop']['total'];
                 $this->_sections['minuteloop']['index'] += $this->_sections['minuteloop']['step'], $this->_sections['minuteloop']['iteration']++):
$this->_sections['minuteloop']['rownum'] = $this->_sections['minuteloop']['iteration'];
$this->_sections['minuteloop']['index_prev'] = $this->_sections['minuteloop']['index'] - $this->_sections['minuteloop']['step'];
$this->_sections['minuteloop']['index_next'] = $this->_sections['minuteloop']['index'] + $this->_sections['minuteloop']['step'];
$this->_sections['minuteloop']['first']      = ($this->_sections['minuteloop']['iteration'] == 1);
$this->_sections['minuteloop']['last']       = ($this->_sections['minuteloop']['iteration'] == $this->_sections['minuteloop']['total']);
?>

 		<option value="<?php echo $this->_sections['minuteloop']['index']; ?>
" <?php if ($this->_sections['minuteloop']['index'] == $this->_tpl_vars['membership_last_paidminute']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['minuteloop']['index']; ?>
</option>

	<?php endfor; endif; ?>
</select>

</td>
</tr>

<tr>
<td>Membership paid</td>
<td>
<select name="membership_paid">
<option <?php if (( $this->_tpl_vars['member'][$this->_sections['i']['index']]['membership_paid'] == 1 )): ?>selected="selected"<?php endif; ?> value="1">Yes</option>
<option <?php if (( $this->_tpl_vars['member'][$this->_sections['i']['index']]['membership_paid'] == 0 )): ?>selected="selected"<?php endif; ?> value="0">No</option>
</select>
</td>
</tr>

<tr>
<td>Favourite band 1</td>
<td><input type="text" name="band1" size="40" maxlength="40" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['band1']; ?>
" /></td>
</tr>

<tr>
<td>Favourite band 2</td>
<td><input type="text" name="band2" size="40" maxlength="40" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['band2']; ?>
" /></td>
</tr>

<tr>
<td>Favourite band 3</td>
<td><input type="text" name="band3" size="40" maxlength="40" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['band3']; ?>
" /></td>
</tr>

<tr>
<td>IRC-nick</td>
<td><input type="text" name="ircnick" size="20" maxlength="20" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['ircnick']; ?>
" /></td>
</tr>

<tr>
<td>MSN Messenger</td>
<td><input type="text" name="msnmessenger" size="40" maxlength="40" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['msn_messenger']; ?>
" /></td>
</tr>

<tr>
<td>Other Instant Messengers</td>
<td><input type="text" name="otherims" size="40" maxlength="100" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['other_ims']; ?>
" /></td>
</tr>

<tr>
<td>Picture</td>
<td><input type="text" name="picture" size="40" maxlength="40" value="<?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['picture']; ?>
" /></td>
</tr>

<tr>
<td>Free comments in English</td>
<td><textarea name="commentsen" rows="15" cols="61"><?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['commentsen']; ?>
</textarea></td>
</tr>

<tr>
<td>Free comments in Finnish</td>
<td><textarea name="commentsfi" rows="15" cols="61"><?php echo $this->_tpl_vars['member'][$this->_sections['i']['index']]['commentsfi']; ?>
</textarea></td>
</tr>
</table>

<p><input type="submit" value="Store" /></p>

</form>

<?php endfor; else: ?>

    <p>Member not found</p>

<?php endif; ?>

<form action="index.php" method="post">
<p>
<input type="hidden" name="action" value="members" />
<input type="submit" value="Back to members listing" />
</p>
</form>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "maint_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>