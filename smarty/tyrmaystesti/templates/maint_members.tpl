

{ include file="maint_header.tpl" header="Event maintenance" }

<h1>TYRMÄYS Members</h1>

<h2>{$message}</h2>

<form action="index.php" method="post">
<input type="hidden" name="action" value="add_member_form"/>
<input type="submit" value="Add Member"/>
</form>

	{if $iswebmaster eq 'false'}
	
	<td>
	    <form action="index.php" method="post">
	    	<input type="hidden" name="action" value="passwd"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" value="Edit password"/>
	    </form>
	</td>
	
	{/if}

<h1>Normal Members</h1>
<br />
<table border=1>
    {section name="i" loop=$members}
    {if $smarty.section.i.first}
    <tr>
    	<td></td>
    	{if $iswebmaster eq 'true'}
		<td></td>
    	<td></td>
     	<td></td>
     	{/if}
     	<td></td>

     		    	    	    	    	
     	<td><b>First name</b></td>
		<td><b>Surname</b></td>
		<td><b>Other names</b></td>
		<td><b>Phone</b></td>
		<td><b>Email</b></td>
		<td><b>Student number</b></td>
		<td><b>Major subject en</b></td>
		<td><b>Major subject fi</b></td>
		<td><b>Membership requested</b></td>
		<td><b>Membership last paid</b></td>
		<td><b>Membership paid</b></td>
		<td><b>Ircnick</b></td>
		<td><b>MSN Messenger</b></td>
		<td><b>Other ims</b></td>
		<td><b>Picture</b></td>

    </tr>	
    {/if}
    <tr>
    
    <td>
		<form action="index.php" method="post">
	    	<input type="hidden" name="action" value="edit_member_form"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" value="Edit"/>
	    </form>
	</td>	

    {if $iswebmaster eq 'true'}
	
	<td>
	    <form action="index.php" method="post">
	    	<input type="hidden" name="action" value="passwd"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" value="Edit password"/>
	    </form>
	</td>
	
	<td>
		<form action="index.php" method="post">
	    	<input type="hidden" name="action" value="add_to_board_form"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" value="Add to board"/>
	    </form>
	</td>
		
	<td>
		<form action="index.php" method="post">
	    	<input type="hidden" name="action" value="add_to_officials_form"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" value="Add to officials"/>
	    </form>
	</td>
	
	{/if}

	<td>
		<form action="index.php" method="post">
	    	<input type="hidden" name="action" value="delete_member"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" onclick="return confirm('Really delete?');" value="Delete"/>
	    </form>
	</td>
    
		<td>{$members[i].first_name}</td>
		<td>{$members[i].surname}</td>
		<td>{$members[i].other_names}</td>
		<td>{$members[i].phone}</td>
		<td>{$members[i].email}</td>
		<td>{$members[i].studentnumber}</td>
		<td>{$members[i].majoren}</td>
		<td>{$members[i].majorfi}</td>
		<td>{$members[i].membership_requested}</td>
		<td>{$members[i].membership_last_paid}</td>
		<td>{$members[i].membership_paid}</td>
		<td>{$members[i].ircnick}</td>
		<td>{$members[i].msn_messenger}</td>
		<td>{$members[i].other_ims}</td>
		<td>{$members[i].picture}</td>
	
    </tr>
    {sectionelse}
        <tr>
            <td colspan="3">No members</td>
        </tr>
    {/section}
</table>

<h1>Current Board members</h1>

<table border=1>
    {section name="i" loop=$board}	
    {if $smarty.section.i.first}
    <tr>
    	{if $iswebmaster eq 'true'}
    	<td></td>
    	{/if}
		<td><b>First name</b></td>
		<td><b>Surname</b></td>
		<td><b>Other names</b></td>
		<td><b>Status EN</b></td>
		<td><b>Status FI</b></td>
		<td><b>Year</b></td>
    </tr>
    {/if}
    <tr>
    
    	{if $iswebmaster eq 'true'}
    	
    	<td>
			<form action="index.php" method="post">
	    	<input type="hidden" name="action" value="delete_member_from_board"/>
	    	<input type="hidden" name="studentnumber" value="{$board[i].studentnumber}"/>
	    	<input type="hidden" name="year" value="{$board[i].year}"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from board"/>
	    	</form>
		</td>
		
    	{/if}
		
		<td>{$board[i].first_name}</td>
		<td>{$board[i].surname}</td>
		<td>{$board[i].other_names}</td>
		<td>{$board[i].statusen}</td>
		<td>{$board[i].statusfi}</td>
		<td>{$board[i].year}</td>
	

    </tr>
    {sectionelse}
        <tr>
            <td colspan="3">No current board.</td>
        </tr>
    {/section}
</table>

<br />

<h1>Past board members</h1>

<table border=1>
    {section name="i" loop=$oldboard}	
    {if $smarty.section.i.first}
    <tr>
    	{if $iswebmaster eq 'true'}
        <td></td>
        {/if}
		<td><b>First name</b></td>
		<td><b>Surname</b></td>
		<td><b>Other names</b></td>
		<td><b>Status EN</b></td>
		<td><b>Status FI</b></td>
		<td><b>Year</b></td>
    </tr>	
    {/if}
    <tr>
    	{if $iswebmaster eq 'true'}
    	
    	<td>
			<form action="index.php" method="post">
	    	<input type="hidden" name="action" value="delete_member_from_board"/>
	    	<input type="hidden" name="studentnumber" value="{$oldboard[i].studentnumber}"/>
	    	<input type="hidden" name="year" value="{$oldboard[i].year}"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from board"/>
	    	</form>
		</td>
		
    	{/if}
    	
		<td>{$oldboard[i].first_name}</td>
		<td>{$oldboard[i].surname}</td>
		<td>{$oldboard[i].other_names}</td>
		<td>{$oldboard[i].statusen}</td>
		<td>{$oldboard[i].statusfi}</td>
		<td>{$oldboard[i].year}</td>
	

    </tr>
    {sectionelse}
        <tr>
            <td colspan="3">No board members in the past.</td>
        </tr>
    {/section}
</table>

<br />

<h1>Current Officials</h1>

<table border=1>
    {section name="i" loop=$officials}	
    {if $smarty.section.i.first}
    <tr>
    
    	{if $iswebmaster eq 'true'}
        <td></td>
        {/if}
        	
		<td><b>First name</b></td>
		<td><b>Surname</b></td>
		<td><b>Other names</b></td>
		<td><b>Status EN</b></td>
		<td><b>Status FI</b></td>
		<td><b>Year</b></td>
    </tr>	
    {/if}
    <tr>
    
    	{if $iswebmaster eq 'true'}
    	<td>
			<form action="index.php" method="post">
	    	<input type="hidden" name="action" value="delete_member_from_officials"/>
	    	<input type="hidden" name="studentnumber" value="{$officials[i].studentnumber}"/>
	    	<input type="hidden" name="year" value="{$officials[i].year}"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from officials"/>
	    	</form>
		</td>
    	{/if}
    	
		<td>{$officials[i].first_name}</td>
		<td>{$officials[i].surname}</td>
		<td>{$officials[i].other_names}</td>
		<td>{$officials[i].statusen}</td>
		<td>{$officials[i].statusfi}</td>
		<td>{$officials[i].year}</td>
	

    </tr>
    {sectionelse}
        <tr>
            <td colspan="3">No officials currently.</td>
        </tr>
    {/section}
</table>

<br />

<h1>Past Officials</h1>

<table border=1>
    {section name="i" loop=$oldofficials}	
    {if $smarty.section.i.first}
    <tr>
    
    	{if $iswebmaster eq 'true'}
        <td></td>
        {/if}
        
		<td><b>First name</b></td>
		<td><b>Surname</b></td>
		<td><b>Other names</b></td>
		<td><b>Phone</b></td>
		<td><b>Email</b></td>
		<td><b>Student number</b></td>
		<td><b>Ircnick</b></td>
		<td><b>Status EN</b></td>
		<td><b>Status FI</b></td>
		<td><b>Picture</b></td>
		<td><b>Comments EN</b></td>
		<td><b>Comments FI</b></td>
		<td><b>Year</b></td>
    </tr>	
    {/if}
    <tr>
    
    	{if $iswebmaster eq 'true'}
    	<td>
			<form action="index.php" method="post">
	    	<input type="hidden" name="action" value="delete_member_from_officials"/>
	    	<input type="hidden" name="studentnumber" value="{$oldofficials[i].studentnumber}"/>
	    	<input type="hidden" name="year" value="{$oldofficials[i].year}"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from officials"/>
	    	</form>
		</td>
    	{/if}
    	
		<td>{$oldofficials[i].first_name}</td>
		<td>{$oldofficials[i].surname}</td>
		<td>{$oldofficials[i].other_names}</td>
		<td>{$oldofficials[i].phone}</td>
		<td>{$oldofficials[i].email}</td>
		<td>{$oldofficials[i].studentnumber}</td>
		<td>{$oldofficials[i].ircnick}</td>
		<td>{$oldofficials[i].statusen}</td>
		<td>{$oldofficials[i].statusfi}</td>
		<td>{$oldofficials[i].picture}</td>
		<td>{$oldofficials[i].commentsen}</td>
		<td>{$oldofficials[i].commentsfi}</td>
		<td>{$oldofficials[i].year}</td>
	
    </tr>
    {sectionelse}
        <tr>
            <td colspan="3">No officials in the past.</td>
        </tr>
    {/section}
</table>

<br />
<br />

<form action="index.php" method="post">
<input type="hidden" name="action" value="main"/>
<input type="submit" value="Back to main menu"/>
</form>


{ include file="footer.tpl"}

