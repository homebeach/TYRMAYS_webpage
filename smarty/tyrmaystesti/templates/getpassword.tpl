
{ include file="header.tpl" }

	{$message}

	<h2>{#registeredemail#}</h2>
    <p>This is temporarily disabled!</p>
	<form action="index.php" method="post">
	<p>{#email#}: <input type="text" name="email" id="email" size="15" disabled="true"/>
	<input type="hidden" name="action" value="sendpassword"/>
	<input type="submit" value="Submit"/>
	</p>
	</form>


{ include file="footer.tpl"}

