

{ include file="maint_header.tpl" header="News maintenance" }

<h1>TYRMÄYS News</h1>
<form action="index.php" method="post">
<p><input type="hidden" name="action" value="add_news_form"/>
<input type="submit" value="Add News"/></p>
</form>

<table border="1">
    {section name="i" loop=$news}	
    {if $smarty.section.i.first}
    <tr>
		<th>News id</th><th>News heading english</th><th>News heading finnish</th><th>News description english</th>
		<th>News description finnish</th><th>News inserted date and time</th><th>News inserted by</th><th>News edited date and time</th><th>News edited by</th><th></th><th></th>
    </tr>	
    {/if}
    <tr>
		<td>{$news[i].newsid}</td>
		<td>{$news[i].newsheadingen}</td>
		<td>{$news[i].newsheadingfi}</td>
		<td>{$news[i].newsdescen}</td>
		<td>{$news[i].newsdescfi}</td>
		<td>{$news[i].newsinserteddatetime|date_format:"%d/%m/%Y"}</td>
		<td>{$news[i].studentnumber_insert}</td>
		<td>{$news[i].newsediteddatetime|date_format:"%d/%m/%Y"}</td>
		<td>{$news[i].studentnumber_edit}</td>
	<td><form action="index.php" method="post">
	    <p><input type="hidden" name="action" value="edit_news_form"/>
	    <input type="hidden" name="newsid" value="{$news[i].newsid}"/>
	    <input type="submit" value="Edit"/></p>
	    </form>
	</td>
	<td><form action="index.php" method="post">
	    <p><input type="hidden" name="action" value="delete_news"/>
	    <input type="hidden" name="newsid" value="{$news[i].newsid}"/>
	    <input type="submit" onclick="return confirm('Really remove?');" value="Delete"/></p>
	    </form>
	</td>
    </tr>
    {sectionelse}
        <tr>
            <td colspan="3">No news</td>
        </tr>
    {/section}
</table>

<form action="index.php" method="post">
<p><input type="hidden" name="action" value="main"/>
<input type="submit" value="Back to main menu"/></p>
</form>


{ include file="maint_footer.tpl"}

