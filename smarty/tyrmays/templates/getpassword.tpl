
{ include file="header.tpl" }

	<div id="heading"><a> {#registeredemail#} </a></div>
	
	<p>{$message}</p>

	<form action="index.php" method="post">
	<p>{#email#}: <input type="text" name="email" id="email" size="15" />
	<input type="hidden" name="action" value="sendpassword" />
	<input type="submit" value="Submit"/>
	</p>
	</form>


{ include file="footer.tpl"}

