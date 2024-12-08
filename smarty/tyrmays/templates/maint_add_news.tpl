

{ include file="maint_header.tpl" header="News insertion" }

<h1>Insert news</h1>


<form action="index.php" method="post">
<p><input type="hidden" name="action" value="add_news" />
<input type="hidden" name="studentnumber" value="{$studentnumber}" /></p>
<table>

<tr>
<td>Heading in English</td>
<td><input type="text" name="newsHeadingEn" size="80" maxlength="300" /></td>
</tr>

<tr>
<td>Heading in Finnish</td>
<td><input type="text" name="newsHeadingFi" size="80" maxlength="300" /></td>
</tr>

<tr>
<td>Description in English</td>
<td><textarea name="newsDescEn" rows="15" cols="61"></textarea></td>
</tr>

<tr>
<td>Description in Finnish</td>
<td><textarea name="newsDescFi" rows="15" cols="61"></textarea></td>
</tr>

<tr>
<td>
<input type="submit" value="Store" />
</td>
</tr>
</table>
</form>


<form action="index.php" method="post">
<p><input type="hidden" name="action" value="news" />
<input type="submit" value="Back to news listing" /></p>
</form>



{ include file="maint_footer.tpl"}
