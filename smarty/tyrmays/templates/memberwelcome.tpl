

{ include file="header.tpl" }


	{if $lang === 'fi'}		
		<p>Tervetuloa TYRM�YS ry:n j�seneksi! J�senmaksu olisi 5 euroa ja sen voi maksaa tilille 573008-2361224 (TSOP) viitteell� {$referencenumber} tai jollekin hallituksen j�senelle tapahtumissamme.</p>
		<p>Tunnuksesi sivuille on {$username}</p>
	{else} 
		<p>Welcome to TYRM�YS ry! Price for our membership is 5 euros and it can be paid to our account: 573008-2361224 (TSOP) with referencenumber {$referencenumber} or to some of our board members in our events.</p>
		<p>Your username to this site is {$username}</p>
	{/if}	

{ include file="footer.tpl"}
