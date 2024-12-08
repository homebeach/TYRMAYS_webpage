

{ include file="maint_header.tpl" header="Event maintenance" }

<h1>TYRMÄYS Members</h1>

<h2>{$message}</h2>

<form action="index.php" method="post">
<p><input type="hidden" name="action" value="add_member_form"/>
<input type="submit" value="Add Member"/></p>
</form>

	{if $iswebmaster eq 'false'}
	
	<td>
	    <form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="passwd"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" value="Edit password"/></p>
	    </form>
	</td>
	
	{/if}

<h1>Membership not yet paid:</h1>

<table class="sortable" id="nonmembers" border="1">
    {section name="i" loop=$nonmembers}
    {if $smarty.section.i.first}
    <tr>
    	<th></th>
    	{if $iswebmaster eq 'true'}
		<th></th>
    	<th></th>
     	<th></th>
     	{/if}
     	<th></th>	    	    	    	
     	<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Student number</th>
		<th>Major subject en</th>
		<th>Major subject fi</th>
		<th>Membership requested</th>
		<th>Membership last paid</th>
		<th>Membership paid</th>
		
		{if $iswebmaster eq 'true'}
		
		<th>Ircnick</th>
		<th>MSN Messenger</th>
		<th>Other ims</th>
		<th>Picture</th>
		<th>Last logon</th>
		
		{/if}
		
    </tr>	
    {/if}
    
    {if $lastlogon < $nonmembers[i].membership_requested}
    
    	<tr style="background-color: #00FF00;">
    
    {else}
		
        <tr>
    	
    {/if}
    	<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="edit_member_form"/>
		    	<input type="hidden" name="studentnumber" value="{$nonmembers[i].studentnumber}"/>
		    	<input type="submit" value="Edit"/></p>
		    </form>
		</td>	
	
	    {if $iswebmaster eq 'true'}
		
		<td>
		    <form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="passwd"/>
		    	<input type="hidden" name="studentnumber" value="{$nonmembers[i].studentnumber}"/>
		    	<input type="submit" value="Edit password"/></p>
		    </form>
		</td>
	
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="add_to_board_form"/>
		    	<input type="hidden" name="studentnumber" value="{$nonmembers[i].studentnumber}"/>
		    	<input type="submit" value="Add to board"/></p>
		    </form>
		</td>
			
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="add_to_officials_form"/>
		    	<input type="hidden" name="studentnumber" value="{$nonmembers[i].studentnumber}"/>
		    	<input type="submit" value="Add to officials"/></p>
		    </form>
		</td>
	
		{/if}
	
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="delete_member"/>
		    	<input type="hidden" name="studentnumber" value="{$nonmembers[i].studentnumber}"/>
		    	<input type="submit" onclick="return confirm('Really delete?');" value="Delete"/></p>
		    </form>
		</td>
    
	


		<td>{$nonmembers[i].first_name}</td>
		<td>{$nonmembers[i].surname}</td>
		<td>{$nonmembers[i].other_names}</td>
		<td>{$nonmembers[i].phone}</td>
		<td>{$nonmembers[i].email}</td>
		<td>{$nonmembers[i].studentnumber}</td>
		<td>{$nonmembers[i].majoren}</td>
		<td>{$nonmembers[i].majorfi}</td>
		<td>{$nonmembers[i].membership_requested}</td>
		<td>{$nonmembers[i].membership_last_paid}</td>
		<td>{$nonmembers[i].membership_paid}</td>
		
		{if $iswebmaster eq 'true'}
		
		<td>{$nonmembers[i].ircnick}</td>
		<td>{$nonmembers[i].msn_messenger}</td>
		<td>{$nonmembers[i].other_ims}</td>
		<td>{$nonmembers[i].picture}</td>
		<td>{$nonmembers[i].lastlogon}</td>
		
		{/if}
	
    	</tr>
    


    
    {sectionelse}
        <tr>
            <td colspan="3">No members</td>
        </tr>
    {/section}
</table>


<h1>Outdated memberships</h1>

<table class="sortable" id="obsoletemembers" border="1">
    {section name="i" loop=$obsoletemembers}
    {if $smarty.section.i.first}
    <tr>
    	<th></th>
    	{if $iswebmaster eq 'true'}
		<th></th>
    	<th></th>
     	<th></th>
     	{/if}
     	<th></th>	    	    	    	
     	<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Student number</th>
		<th>Major subject en</th>
		<th>Major subject fi</th>
		<th>Membership requested</th>
		<th>Membership last paid</th>
		<th>Membership paid</th>
		
		{if $iswebmaster eq 'true'}
		
		<th>Ircnick</th>
		<th>MSN Messenger</th>
		<th>Other ims</th>
		<th>Picture</th>
		<th>Last logon</th>
		
		{/if}
    </tr>	
    {/if}
    
    {if $lastlogon < $obsoletemembers[i].membership_requested}
    
    	<tr style="background-color: #00FF00;">
    
    {else}
		
        <tr>
    	
    {/if}
    	<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="edit_member_form"/>
		    	<input type="hidden" name="studentnumber" value="{$obsoletemembers[i].studentnumber}"/>
		    	<input type="submit" value="Edit"/></p>
		    </form>
		</td>	
	
	    {if $iswebmaster eq 'true'}
		
		<td>
		    <form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="passwd"/>
		    	<input type="hidden" name="studentnumber" value="{$obsoletemembers[i].studentnumber}"/>
		    	<input type="submit" value="Edit password"/></p>
		    </form>
		</td>
	
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="add_to_board_form"/>
		    	<input type="hidden" name="studentnumber" value="{$obsoletemembers[i].studentnumber}"/>
		    	<input type="submit" value="Add to board"/></p>
		    </form>
		</td>
			
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="add_to_officials_form"/>
		    	<input type="hidden" name="studentnumber" value="{$obsoletemembers[i].studentnumber}"/>
		    	<input type="submit" value="Add to officials"/></p>
		    </form>
		</td>
	
		{/if}
	
		<td>
			<form action="index.php" method="post">
		    	<p><input type="hidden" name="action" value="delete_member"/>
		    	<input type="hidden" name="studentnumber" value="{$obsoletemembers[i].studentnumber}"/>
		    	<input type="submit" onclick="return confirm('Really delete?');" value="Delete"/></p>
		    </form>
		</td>
    

		<td>{$obsoletemembers[i].first_name}</td>
		<td>{$obsoletemembers[i].surname}</td>
		<td>{$obsoletemembers[i].other_names}</td>
		<td>{$obsoletemembers[i].phone}</td>
		<td>{$obsoletemembers[i].email}</td>
		<td>{$obsoletemembers[i].studentnumber}</td>
		<td>{$obsoletemembers[i].majoren}</td>
		<td>{$obsoletemembers[i].majorfi}</td>
		<td>{$obsoletemembers[i].membership_requested}</td>
		<td>{$obsoletemembers[i].membership_last_paid}</td>
		<td>{$obsoletemembers[i].membership_paid}</td>
		
		{if $iswebmaster eq 'true'}
		
		<td>{$obsoletemembers[i].ircnick}</td>
		<td>{$obsoletemembers[i].msn_messenger}</td>
		<td>{$obsoletemembers[i].other_ims}</td>
		<td>{$obsoletemembers[i].picture}</td>
		<td>{$obsoletemembers[i].lastlogon}</td>
		
		{/if}
	
    	</tr>
    
    	
    {sectionelse}
        <tr>
            <td colspan="3">No members</td>
        </tr>
    {/section}
</table>
	
<h1>Members</h1>

<table class="sortable" id="members"  border="1">
    {section name="i" loop=$members}
    {if $smarty.section.i.first}
    <tr>
    	<th></th>
    	{if $iswebmaster eq 'true'}
		<th></th>
    	<th></th>
     	<th></th>
     	{/if}
     	<th></th>	    	    	    	
     	<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Student number</th>
		<th>Major subject en</th>
		<th>Major subject fi</th>
		<th>Membership requested</th>
		<th>Membership last paid</th>
		<th>Membership paid</th>
		
		{if $iswebmaster eq 'true'}
		
		<th>Ircnick</th>
		<th>MSN Messenger</th>
		<th>Other ims</th>
		<th>Picture</th>
		<th>Last logon</th>
		
		{/if}
		
    </tr>	
    {/if}
    <tr>
    
    <td>
		<form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="edit_member_form"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" value="Edit"/></p>
	    </form>
	</td>	

    {if $iswebmaster eq 'true'}
	
	<td>
	    <form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="passwd"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" value="Edit password"/></p>
	    </form>
	</td>
	
	<td>
		<form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="add_to_board_form"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" value="Add to board"/></p>
	    </form>
	</td>
		
	<td>
		<form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="add_to_officials_form"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" value="Add to officials"/></p>
	    </form>
	</td>
	
	{/if}

	<td>
		<form action="index.php" method="post">
	    	<p><input type="hidden" name="action" value="delete_member"/>
	    	<input type="hidden" name="studentnumber" value="{$members[i].studentnumber}"/>
	    	<input type="submit" onclick="return confirm('Really delete?');" value="Delete"/></p>
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
		
		{if $iswebmaster eq 'true'}
		
		<td>{$members[i].ircnick}</td>
		<td>{$members[i].msn_messenger}</td>
		<td>{$members[i].other_ims}</td>
		<td>{$members[i].picture}</td>
		<td>{$members[i].lastlogon}</td>
		
		{/if}
	
    </tr>
    {sectionelse}
        <tr>
            <td colspan="3">No members</td>
        </tr>
    {/section}
</table>

<h1>Current Board members</h1>

<table class="sortable" id="boardmembers" border="1">
    {section name="i" loop=$board}	
    {if $smarty.section.i.first}
    <tr>
    	{if $iswebmaster eq 'true'}
    	<th></th>
    	{/if}
		<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Status EN</th>
		<th>Status FI</th>
		<th>Year</th>
    </tr>
    {/if}
    <tr>
    
    	{if $iswebmaster eq 'true'}
    	
    	<td>
			<form action="index.php" method="post">
	    	<p>
	    	<input type="hidden" name="action" value="delete_member_from_board"/>
	    	<input type="hidden" name="studentnumber" value="{$board[i].studentnumber}"/>
	    	<input type="hidden" name="year" value="{$board[i].year}"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from board"/>
	    	</p>
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

<h1>Past board members</h1>

<table class="sortable" id="pastboardmembers" border="1">
    {section name="i" loop=$oldboard}	
    {if $smarty.section.i.first}
    <tr>
    	{if $iswebmaster eq 'true'}
        <th></th>
        {/if}
		<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Status EN</th>
		<th>Status FI</th>
		<th>Year</th>
    </tr>	
    {/if}
    <tr>
    	{if $iswebmaster eq 'true'}
    	
    	<td>
			<form action="index.php" method="post">
			<p>
	    	<input type="hidden" name="action" value="delete_member_from_board"/>
	    	<input type="hidden" name="studentnumber" value="{$oldboard[i].studentnumber}"/>
	    	<input type="hidden" name="year" value="{$oldboard[i].year}"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from board"/>
	    	</p>
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

<h1>Current Officials</h1>

<table class="sortable" id="currentofficials" border="1">
    {section name="i" loop=$officials}	
    {if $smarty.section.i.first}
    <tr>
    
    	{if $iswebmaster eq 'true'}
        <td></td>
        {/if}
        	
		<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Status EN</th>
		<th>Status FI</th>
		<th>Year</th>
    </tr>	
    {/if}
    <tr>
    
    	{if $iswebmaster eq 'true'}
    	<td>
			<form action="index.php" method="post">
			<p>
	    	<input type="hidden" name="action" value="delete_member_from_officials"/>
	    	<input type="hidden" name="studentnumber" value="{$officials[i].studentnumber}"/>
	    	<input type="hidden" name="year" value="{$officials[i].year}"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from officials"/>
	    	</p>
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

<h1>Past Officials</h1>

<table class="sortable" id="pastofficials" border="1">
    {section name="i" loop=$oldofficials}	
    {if $smarty.section.i.first}
    <tr>
    
    	{if $iswebmaster eq 'true'}
        <th></th>
        {/if}
        
		<th>First name</th>
		<th>Surname</th>
		<th>Other names</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Student number</th>
		<th>Ircnick</th>
		<th>Status EN</th>
		<th>Status FI</th>
		<th>Picture</th>
		<th>Comments EN</th>
		<th>Comments FI</th>
		<th>Year</th>
    </tr>	
    {/if}
    <tr>
    
    	{if $iswebmaster eq 'true'}
    	<td>
			<form action="index.php" method="post">
			<p>
	    	<input type="hidden" name="action" value="delete_member_from_officials"/>
	    	<input type="hidden" name="studentnumber" value="{$oldofficials[i].studentnumber}"/>
	    	<input type="hidden" name="year" value="{$oldofficials[i].year}"/>
	    	<input type="submit" onclick="return confirm('Really remove?');" value="Remove from officials"/>
	    	</p>
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

<form action="index.php" method="post">
<p>
<input type="hidden" name="action" value="main"/>
<input type="submit" value="Back to main menu"/>
</p>
</form>


{ include file="maint_footer.tpl"}

