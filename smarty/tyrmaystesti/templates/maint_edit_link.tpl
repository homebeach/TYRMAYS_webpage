

{ include file="maint_header.tpl" header="Links insertion" }

<h1>Edit Link</h1>

{section name="i" loop=$link}

<form name="linksForm" action="index.php" method="post">
<input type="hidden" name="action" value="edit_link">
<input type="hidden" name="linkid" value="{$link[i].linkid}">
<table cellpadding="5">

<tr>
<td>URL</td>
<td><input type="text" name="url" size="80" maxlength="300" value="{$link[i].url}"></td>
</tr>

<tr>
<td>Description in English</td>
<td><input type="text" name="linkDescEn" size="80" maxlength="300" value="{$link[i].linktexten}"> </td>
</tr>

<tr>
<td>Description in Finnish</td>
<td><input type="text" name="linkDescFi" size="80" maxlength="300" value="{$link[i].linktextfi}"> </td>
</tr>

<tr><td>
Select link group
</td><td>
<SELECT NAME="linkgroup">
{section name="j" loop=$linkgroup}
<OPTION {if $linkgroup[j].groupid eq $link[i].groupid}SELECTED{/if} VALUE="{$linkgroup[j].groupid}">{$linkgroup[j].groupdescriptionen}
{/section}
</SELECT>
</td></tr>

<tr>
<td></td>
<td><input type="hidden" name="groupdescription" size="80" maxlength="300" }" /></td>
</tr>


<tr>
<td>
<input type="submit" value="Store">
<td>
</form>


    {sectionelse}
        <tr>
            <td colspan="3">Link not found</td>
        </tr>
    {/section}

<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="links">
<input type="submit" value="Back to links listing">
</form>
<td>
</tr>
</table>


{ include file="footer.tpl"}
