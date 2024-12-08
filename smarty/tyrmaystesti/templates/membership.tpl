

{ include file="header.tpl" }

{if $studentnumber eq ""}

{if $lang eq fi}

<p>Kerhon j‰seneksi p‰‰set l‰hett‰m‰ll‰ hakemuksen alla olevalla lomakkeella. Kerhon vuosij‰senyys maksaa 5 euroa ja se maksetaan jollekin hallituksen j‰senelle tai pankkitilillemme. Saat tilinumeron ja viitteen, kun olet l‰hett‰nyt lomakkeen.
Jos olet opiskelija, sinun tulee antaa opiskelijanumerosi, muussa tapauksessa kent‰n voi j‰tt‰‰ tyhj‰ksi.
</p>

<p>
J‰sentiedoista pidett‰v‰n rekisterin <a href="http://www.tyrmays.net/rekisteriseloste.txt">rekisteriseloste</a>.
</p>

<p>
T‰hdell‰ merkityt kent‰t ovat pakollisia.
</p>

<p>
Jos havaitset ongelmia lomakkeen toiminnassa, ota yhteytt‰: web-developer( at )tyrmays.net.
</p>
{else}

<p>
You can acquire membership by sending your information with the form below. Membership price is 5 euros and it can be paid to some of the board members or directly to our bank account. You will get the account number and the reference number to your email after you have sent this form. 
If you are student you need to give your studentnumber.
</p>

<p>
The fields marked with asterisk are compulsory.
</p>

<p>
If you are having problems with this form, take contact: web-developer( at )tyrmays.net.
</p>

{/if}


{if $result eq success}
<span id="success"><p>{#joinsuccess#}</p></span> 
<br />
{/if}

{if $result eq failure}
<span id="error"><p>{#joinfail#}</p></span> 
<br />
{/if}


<form action="index.php" method="post">
<p><input type="hidden" name="action" value="membership_request" /></p>
<p><input type="hidden" name="lang" value="{$lang}" /></p>


<p>{#firstname#}<br /> 
<input type="text" name="firstname" value="{$member.firstname}" maxlength="40" />   <span {if $firstname eq error} id="error" {/if}>*</span> 
<br /> 
{#surname#}<br />
<input type="text" name="surname" value="{$member.surname}" maxlength="50" /> <span {if $surname eq error} id="error" {/if}>*</span>
<br /> 
{#othernames#}<br />
<input type="text" name="othernames" value="{$member.othernames}" maxlength="50" />
<br /> 
{#phone#}<br />
<input type="text" name="phone" value="{$member.phone}" maxlength="15" /> <span {if $phone eq error} id="error" {/if}>*</span>
<br /> 
{#email#}<br />
<input type="text" name="email" value="{$member.email}" maxlength="60" />  <span {if $email eq error} id="error" {/if}>*</span>
</p>
<p>
<input type="checkbox" name="maillist" /> {#maillist#}
</p>
<p>
<input type="radio" name="membershiptype" value="notstudent" />{#notstudent#}<br />
<input type="radio" name="membershiptype" value="former"  />{#former#}<br />
<input type="radio" name="membershiptype" value="student" checked="checked" />{#student#}
</p>


<table>
	<tr>
			<td >
				<img src ="images/nuolet.png" alt="Nuolet" />
			</td>
		<td>
 		<p>{#studentnumber#}<input type="text" name="studentnumber" value="{$member.studentnumber}" maxlength="20" /> <span {if $studentnumber eq error} id="error" {/if}>*</span>
		<br /><br />
		{#major#}

		{if $lang eq fi}
		
    		<select name="majorid">
    				<option value="0"></option>
				{section name="i" loop=$majors}
					<option value="{$majors[i].majorid}" >{$majors[i].majorfi}</option>
				{/section}
			</select>
			
		{else}

			<select name="majorid">
					<option value="0"></option>
				{section name="i" loop=$majors}
					<option value="{$majors[i].majorid}">{$majors[i].majoren}</option>
				{/section}
			</select>
	
		{/if}
		<span {if $majorid eq error} id="error" {/if}>*</span>
		
		</p>
		</td>
	</tr>
</table>	
	
	
<p>
{#password#}<br />	
<input type="password" name="password" value="" maxlength="20" /><span {if $password eq error} id="error" {/if}>{if $passwordsdonotmatch eq error}{#passwordsdonotmatch#} {else} {/if}*</span><br />
{#passwordagain#}<br />
<input type="password" name="password2" value="" maxlength="20" /><span {if $password eq error} id="error" {/if}>{if $passwordsdonotmatch eq error}{#passwordsdonotmatch#} {else} {/if}*</span><br />
<br />
{#ircnick#}<br />	
<input type="text" name="ircnick" value="{$member.ircnick}" maxlength="20" /><br />
{#msn_messenger#}<br />
<input type="text" name="msn_messenger" value="{$member.msn_messenger}" maxlength="20" /></p>

<p>{#comments#}
<br />
{if $lang eq fi}
<textarea name="commentsfi" rows="15" cols="61" >{$member.commentsfi}</textarea>
{else}
<textarea name="commentsen" rows="15" cols="61" >{$member.commentsen}</textarea>
{/if}
<br /> 
{#bot#}<br />
<input type="text" name="bot" value="" maxlength="60" />  <span {if $bot eq error} id="error" {/if}>*</span>
<br />
<br />
<input type="submit" value="L‰het‰" />
</p>
</form>

 {else}

		<p>{#memberalready#}</p>

 {/if}



{ include file="footer.tpl"}

