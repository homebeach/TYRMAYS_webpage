
{ include file="maint_header.tpl" header="Links insertion" }

<h1>Insert Link</h1>


<form id="insertLinkForm" action="index.php" method="post">
<p><input type="hidden" name="action" value="add_link" /></p>

<table>

<tr>
<td>URL</td>
<td><input type="text" name="url" size="80" maxlength="300" /></td>
</tr>

<tr>
<td>Description in English</td>
<td><input type="text" name="linkDescEn" size="80" maxlength="300" /></td>
</tr>

<tr>
<td>Description in Finnish</td>
<td><input type="text" name="linkDescFi" size="80" maxlength="300" /></td>
</tr>

<tr>
	<td>
		Select link group
	</td>
	<td>
		<select name="linkgroup">
		{section name="i" loop=$linkgroup}
			<option value="{$linkgroup[i].groupid}">{$linkgroup[i].groupdescriptionen}</option>
		{/section}
		</select>
	</td>
</tr>

<tr>
<td></td>
<td><input type="hidden" name="groupdescription" size="80" maxlength="300" /></td>
</tr>

</table>

<p><input type="submit" value="Store" /></p>

</form>


<form action="index.php" method="post">
	<p>
	<input type="hidden" name="action" value="links" />
	<input type="submit" value="Back to links listing" />
	</p>
</form>




{ include file="maint_footer.tpl"}
