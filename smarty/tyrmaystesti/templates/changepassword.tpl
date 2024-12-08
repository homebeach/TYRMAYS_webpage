{ include file="header.tpl" }

	<span id="success"><p>{$message}</p></span>

	<p>
	<form action="index.php" method="post">
	{#oldpassword#}<br />
	<input type="password" name="oldpassword" value="" maxlength="20" />{if $oldpassword eq error}<span id="error" ><p>{#passordwrong#}</p></span>{/if}<br />
	{#password#}<br />
	<input type="password" name="password" value="" maxlength="20" />{if $password eq error}<span id="error" ><p>{#passwordsdonotmatch#}</p></span>{/if}<br />
	{#passwordagain#}<br />
	<input type="password" name="password2" value="" maxlength="20" />{if $password eq error}<span id="error" ><p>{#passwordsdonotmatch#}</p></span>{/if}<br />
	<input type="hidden" name="action" value="changepassword_request"/>
	<input type="submit" value="Submit"/>
	</form>
	</p>

{ include file="footer.tpl"}