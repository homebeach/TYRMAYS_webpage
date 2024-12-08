{ include file="header.tpl" }

	<span id="success"><p>{$message}</p></span>

	<form action="index.php" method="post">
	<p>
	{#oldpassword#}<br />
	<input type="password" name="oldpassword" value="" maxlength="20" />{if $oldpassword eq error}<span id="error" >{#passordwrong#}</span>{/if}<br />
	{#password#}<br />
	<input type="password" name="password" value="" maxlength="20" />{if $password eq error}<span id="error" >{#passwordsdonotmatch#}</span>{/if}<br />
	{#passwordagain#}<br />
	<input type="password" name="password2" value="" maxlength="20" />{if $password eq error}<span id="error" >{#passwordsdonotmatch#}</span>{/if}<br />
	<input type="hidden" name="action" value="changepassword_request"/>
	<br />
	<input type="submit" value="Submit"/>
	</p>
	</form>

{ include file="footer.tpl"}