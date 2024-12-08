

{ include file="maint_header.tpl" header="Links maintenance" }

<h1>TYRMÄYS Links</h1>

<form action="index.php" method="post">
<p>
<input type="hidden" name="action" value="add_link_form" />
<input type="submit" value="Add Link" />
</p>
</form>

    <table border="1">

    {section name="i" loop=$links}

    {if $smarty.section.i.first}
    
    <tr>
	<th>Link id</th><th>URL</th><th>Description en</th><th>Description fi</th><th>Link group</th><th>Group description</th>
    </tr>	
    {/if}
    <tr>
	<td>{$links[i].linkid}</td>
	<td>{$links[i].url}</td>
	<td>{$links[i].linktexten}</td>
	<td>{$links[i].linktextfi}</td>
	<td>{$links[i].groupid}</td>
	<td>{$links[i].groupdescriptionen}</td>
	<td>
		<form action="index.php" method="post">
        	<p>
			<input type="hidden" name="action" value="edit_link_form"/>
        	<input type="hidden" name="linkid" value="{$links[i].linkid}"/>
	    	<input type="submit" value="Edit" />
        	</p>
		</form>
	</td>
	<td>
		<form action="index.php" method="post">
	        <p>
            <input type="hidden" name="action" value="delete_link"/>
            <input type="hidden" name="linkid" value="{$links[i].linkid}"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Delete"/>
	    	</p>
	    </form>
	</td>

    </tr>
    {sectionelse}
        <tr>
            <td colspan="3">No links</td>
        </tr>
	{/section}
    </table>

<form action="index.php" method="post">
<p>
<input type="hidden" name="action" value="main" />
<input type="submit" value="Back to main menu" />
</p>
</form>


{ include file="maint_footer.tpl"}

