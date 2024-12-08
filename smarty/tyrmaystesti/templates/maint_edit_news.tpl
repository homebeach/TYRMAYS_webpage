

{ include file="maint_header.tpl" header="News insertion" }

<h1>Edit news</h1>


{section name="i" loop=$news}

<form name="newsForm" action="index.php" method="post">

<table cellpadding="5">
<input type="hidden" name="newsid" value="{$news[i].newsid}">
<input type="hidden" name="studentnumber" value="{$studentnumber}">

<tr>
<td>Heading in English</td>
<td><input type="text" name="newsHeadingEn" size="80" maxlength="300" value="{$news[i].newsheadingen}"></td>
</tr>

<tr>
<td>Heading in Finnish</td>
<td><input type="text" name="newsHeadingFi" size="80" maxlength="300" value="{$news[i].newsheadingfi}"></td>
</tr>

<tr>
<td>Description in English</td>
<td><textarea name="newsDescEn"  rows="15" cols="61">{$news[i].newsdescen}</textarea></td>
</tr>

<tr>
<td>Description in Finnish</td>
<td><textarea name="newsDescFi"  rows="15" cols="61">{$news[i].newsdescfi}</textarea></td>
</tr>


<tr>
<td>

<input type="hidden" name="action" value="edit_news">
<input type="submit" value="Store">
<td>
</tr>
</form>


<td>
<form action="index.php" method="post">
<input type="hidden" name="action" value="news">
<input type="submit" value="Back to news listing">
</form>
<td>
</tr>

    {sectionelse}
        <tr>
            <td colspan="3">News not found</td>
        </tr>
{/section}
</table>


{ include file="footer.tpl"}
