

{ include file="maint_header.tpl" header="TYRMÄYS Maintenance Login"}

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

{ include file="maint_footer.tpl"}

