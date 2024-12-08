

{ include file="maint_header.tpl" header="Links insertion" }

<h1>Insert Link</h1>


<form name="linksForm" action="index.php" method="post">
<input type="hidden" name="action" value="add_link">
<table cellpadding="5">

<tr>
<td>URL</td>
<td><input type="text" name="url" size="80" maxlength="300"></td>
</tr>

<tr>
<td>Description in English</td>
<td><input type="text" name="linkDescEn" size="80" maxlength="300"> </td>
</tr>

<tr>
<td>Description in Finnish</td>
<td><input type="text" name="linkDescFi" size="80" maxlength="300"> </td>
</tr>

<tr><td>
Select link group
</td><td>
<SELECT NAME="linkgroup">
{section name="i" loop=$linkgroup}
<OPTION VALUE="{$linkgroup[i].groupid}">{$linkgroup[i].groupdescriptionen}
{/section}
</SELECT>
</td></tr>

<tr>
<td></td>
<td><input type="hidden" name="groupdescription" size="80" maxlength="300"> </td>
</tr>


<tr>
<td>
<input type="submit" value="Store">
<td>
</form>

<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="links">
<input type="submit" value="Back to links listing">
</form>
<td>
</tr>
</table>


{ include file="footer.tpl"}
