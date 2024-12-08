

{ include file="header.tpl" }

<div id="heading"><a> {#renewal#} </a>  </div>

{if $studentnumber ne ""}

	{if $lang eq fi}
	
		{if $referencenumber ne ''}		
			<p>J‰senyyden voi uusia maksamalla 5 euroa tilille 573008-2361224 (TSOP) viitteell‰ {$referencenumber}.</p>
		{else} 
			<p>Sinulla ei ole viel‰ maksuviitett‰, mink‰ avulla voit uusia j‰senyytesi.</p>
			
			<form action="index.php" method="post">
			<p>
			<input type="hidden" name="action" value="getreferencenumber"/>
			<input type="submit" value="Hae maksuviite"/>
			</p>
			</form>
		{/if}
	
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
				
				<form action="index.php" method="post">
				<p>
				<input type="hidden" name="action" value="getreferencenumber"/>
				<input type="submit" value="Get referencenumber"/>
				</p>
				</form>
			{/if}	


	{/if}
	
 {else}

	{if $lang eq fi}
	
		<p>Kirjaudu sis‰‰n n‰hd‰ksesi viitenumerosi. J‰senyyden voi uusia maksamalla 5 euroa tilille 573008-2361224 viitteell‰si.</p>
	
	{else}
		
		<p>Log in to see your referencenumber. You can renew your membership by paying 5 euros to our account 573008-2361224 with your reference number.</p>
		
	{/if}

 {/if}

{ include file="footer.tpl"}

