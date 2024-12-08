

{ include file="header.tpl" }


	{if $lang === 'fi'}		
		<p>Tervetuloa TYRMÄYS ry:n jäseneksi! Jäsenmaksu olisi 5 euroa ja sen voi maksaa tilille 573008-2361224 (TSOP) viitteellä {$referencenumber} tai jollekin hallituksen jäsenelle tapahtumissamme.</p>
		<p>Tunnuksesi sivuille on {$username}</p>
	{else} 
		<p>Welcome to TYRMÄYS ry! Price for our membership is 5 euros and it can be paid to our account: 573008-2361224 (TSOP) with referencenumber {$referencenumber} or to some of our board members in our events.</p>
		<p>Your username to this site is {$username}</p>
	{/if}	

{ include file="footer.tpl"}
