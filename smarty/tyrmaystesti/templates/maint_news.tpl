

{ include file="maint_header.tpl" header="News maintenance" }

<h1>TYRMÄYS News</h1>
<form action="index.php" method="post">
<input type="hidden" name="action" value="add_news_form"/>
<input type="submit" value="Add News"/>
</form>

<table border=1>
    {section name="i" loop=$news}	
    {if $smarty.section.i.first}
    <tr>
		<td><b>News id</b></td><td><b>News heading english</b></td><td><b>News heading finnish</b></td><td><b>News description english</b></td>
		<td><b>News description finnish</b></td><td><b>News inserted date and time</b></td><td><b>News inserted by</b></td><td><b>News edited date and time</b></td><td><b>News edited by</b></td><td></td><td></td>
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
	    <input type="hidden" name="action" value="edit_news_form"/>
	    <input type="hidden" name="newsid" value="{$news[i].newsid}"/>
	    <input type="submit" value="Edit"/>
	    </form>
	</td>
	<td><form action="index.php" method="post">
	    <input type="hidden" name="action" value="delete_news"/>
	    <input type="hidden" name="newsid" value="{$news[i].newsid}"/>
	    <input type="submit" onclick="return confirm('Really remove?');" value="Delete"/>
	    </form>
	</td>
    </tr>
    {sectionelse}
        <tr>
            <td colspan="3">No news</td>
        </tr>
    {/section}
</table>

<br>

<form action="index.php" method="post">
<input type="hidden" name="action" value="main"/>
<input type="submit" value="Back to main menu"/>
</form>


{ include file="footer.tpl"}

