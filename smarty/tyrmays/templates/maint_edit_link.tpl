
{ include file="maint_header.tpl" header="Links insertion" }

<h1>Edit Link</h1>

{section name="i" loop=$link}

<form id="editLinkForm" action="index.php" method="post">

<p>
<input type="hidden" name="action" value="edit_link" />
<input type="hidden" name="linkid" value="{$link[i].linkid}" />
</p>

<table>

<tr>
<td>URL</td>
<td><input type="text" name="url" size="80" maxlength="300" value="{$link[i].url}" /></td>
</tr>

<tr>
<td>Description in English</td>
<td><input type="text" name="linkDescEn" size="80" maxlength="300" value="{$link[i].linktexten}" /></td>
</tr>

<tr>
<td>Description in Finnish</td>
<td><input type="text" name="linkDescFi" size="80" maxlength="300" value="{$link[i].linktextfi}" /></td>
</tr>

<tr>
<td>
Select link group
</td>
<td>
<select name="linkgroup">
	{section name="j" loop=$linkgroup}
		<option value="{$linkgroup[j].groupid}" {if $linkgroup[j].groupid eq $link[i].groupid}selected="selected"{/if} >{$linkgroup[j].groupdescriptionen}</option>
	{/section}
</select>
</td>
</tr>

</table>

<p><input type="submit" value="Store" /></p>

</form>


    {sectionelse}

         <p>Link not found</p>
    
    {/section}

<form action="index.php" method="post">
	<p>
	<input type="hidden" name="action" value="links" />
	<input type="submit" value="Back to links listing" />
	</p>
</form>


{ include file="maint_footer.tpl"}
