

{ include file="maint_header.tpl" header="TYRMÄYS Maintenance Login"}

<p>
Please select:
</p>
<table>
<tr>
<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="news"/>
<input type="submit" value="News"/>
</form>
</td>
<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="events"/>
<input type="submit" value="Events"/>
</form>
</td>
<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="members"/>
<input type="submit" value="Members"/>
</form>
</td>
<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="links"/>
<input type="submit" value="Links"/>
</form>
</td>
<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="minutes"/>
<input type="submit" value="Minutes"/>
</form>
</td>
<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="logout"/>
<input type="submit" value="Log out"/>
</form>
</td>
</tr>
</table>

{ include file="maint_footer.tpl"}

