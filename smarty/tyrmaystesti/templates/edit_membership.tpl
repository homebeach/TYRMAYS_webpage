

{ include file="header.tpl" }

{if $studentnumber ne ""}

{if $lang eq fi}

	<p>
	Jäsentiedoista pidettävän rekisterin <a href="http://www.tyrmays.net/rekisteriseloste.txt">rekisteriseloste</a>.
	</p>
	
	<p>
	Tähdellä merkityt kentät ovat pakollisia.
	</p>
	
	<p>
	Jos havaitset ongelmia lomakkeen toiminnassa, ota yhteyttä: web-developer( at )tyrmays.net.
	</p>

	{if $referencenumber ne ''}		
		<p>Jäsenyyden voi uusia uuden toimikauden alussa maksamalla 5 euroa tilille 573008-2361224 (TSOP) viitteellä {$referencenumber}.</p>
	{else} 
		<p>Sinulla ei ole vielä maksuviitettä, minkä avulla voit uusia jäsenyytesi. </p>
		
		<p>
		<form action="index.php" method="post">
		<input type="hidden" name="action" value="getreferencenumber"/>
		<input type="submit" value="Hae maksuviite"/>
		</form>
		</p>
	{/if}	

	<p>
	<form action="index.php" method="post">
	<input type="hidden" name="action" value="changepassword"/>
	<input type="submit" value="Vaihda salasana"/>
	</form>
	</p>

{else}

	<p>
	The fields marked with asterisk are compulsory.
	</p>
	
	<p>
	If you are having problems with this form, take contact: web-developer( at )tyrmays.net.
	</p>
	
		{if $referencenumber ne ''}		
			<p>You can renew your membership by paying 5 euros to our account 573008-2361224 (TSOP) with referencenumber {$referencenumber}.</p>
		{else} 
			<p>You don't have referencenumber yet to renew membership.</p>
			
			<p>
			<form action="index.php" method="post">
			<input type="hidden" name="action" value="getreferencenumber"/>
			<input type="submit" value="Get referencenumber"/>
			</form>
			</p>
		{/if}	


	<p>
	<form action="index.php" method="post">
	<input type="hidden" name="action" value="changepassword"/>
	<input type="submit" value="Change password"/>
	</form>
	</p>
	
{/if}
	
	
{if $result eq success}
<span id="success"><p>{#editsuccess#}</p></span> 
<br />
{/if}
	
{if $result eq failure}
<span id="error"><p>{#editfail#}</p></span> 
<br />
{/if}




<form action="index.php" method="post">
<p><input type="hidden" name="action" value="editmember_request" /></p>


<p>{#firstname#}<br /> 
<input type="text" name="firstname" value="{$member[0].first_name}" maxlength="40" />   <span {if $firstname eq error} id="error" {/if}>*</span> 
<br /> 
{#surname#}<br />
<input type="text" name="surname" value="{$member[0].surname}" maxlength="50" /> <span {if $surname eq error} id="error" {/if}>*</span>
<br /> 
{#othernames#}<br />
<input type="text" name="othernames" value="{$member[0].other_names}" maxlength="50" />
<br /> 
{#phone#}<br />
<input type="text" name="phone" value="{$member[0].phone}" maxlength="15" /> <span {if $phone eq error} id="error" {/if}>*</span>
<br /> 
{#email#}<br />
<input type="text" name="email" value="{$member[0].email}" maxlength="60" />  <span {if $email eq error} id="error" {/if}>*</span>
</p>


		<p>
 		<br />
		{#major#}
		<br />
		{if $lang eq fi}
		
    		<select name="majorid">
    				<option value="0"></option>
				{section name="i" loop=$majors}
					<option value="{$majors[i].majorid}" {if $majors[i].majorid eq $member[0].majorid}selected{/if}>{$majors[i].majorfi}</option>
				{/section}
			</select>
			
		{else}

			<select name="majorid">
					<option value="0"></option>
				{section name="i" loop=$majors}
					<option value="{$majors[i].majorid}" {if $majors[i].majorid eq $member[0].majorid}selected{/if}>{$majors[i].majoren}</option>
				{/section}
			</select>
	
		{/if}
		<span {if $majorid eq error} id="error" {/if}>*</span>
		
		</p>

		
<p>
{#ircnick#}<br />	
<input type="text" name="ircnick" value="{$member[0].ircnick}" maxlength="20" /><br />
{#msn_messenger#}<br />
<input type="text" name="msn_messenger" value="{$member[0].msn_messenger}" maxlength="20" /><br />
{#other_ims#}<br />
<input type="text" name="otherims" value="{$member[0].other_ims}" maxlength="20" /></p>

<p>{#commentsfi#}
<br />
<textarea name="commentsfi" rows="15" cols="61" >{$member[0].commentsfi}</textarea>
<br />
{#commentsen#}
<textarea name="commentsen" rows="15" cols="61" >{$member[0].commentsen}</textarea>


<br />
<br />
<input type="submit" value="Lähetä" />
</p>
</form>


 {else}

		<p>{#membersonly#}</p>

 {/if}

{ include file="footer.tpl"}

