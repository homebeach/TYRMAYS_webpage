<?php /* Smarty version 2.6.26, created on 2010-05-04 14:38:00
         compiled from maint_main.tpl */ ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "maint_header.tpl", 'smarty_include_vars' => array('header' => "TYRMÄYS Maintenance Login")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<p>
Please select:
</p>
<table>
<tr>
<td>
<form action="index.php" method="post">
<p><input type="hidden" name="action" value="news"/>
<input type="submit" value="News"/></p>
</form>
</td>
<td>
<form action="index.php" method="post">
<p><input type="hidden" name="action" value="events"/>
<input type="submit" value="Events"/></p>
</form>
</td>
<td>
<form action="index.php" method="post">
<p><input type="hidden" name="action" value="members"/>
<input type="submit" value="Members"/></p>
</form>
</td>
<td>
<form action="index.php" method="post">
<p><input type="hidden" name="action" value="links"/>
<input type="submit" value="Links"/></p>
</form>
</td>
<td>
<form action="index.php" method="post">
<p><input type="hidden" name="action" value="minutes"/>
<input type="submit" value="Minutes"/></p>
</form>
</td>
<td>
<form action="index.php" method="post">
<p><input type="hidden" name="action" value="logout"/>
<input type="submit" value="Log out"/></p>
</form>
</td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "maint_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
