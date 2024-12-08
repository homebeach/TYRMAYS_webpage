
{ include file="header.tpl" }

<div id="heading"><a> {#memberstatistics#} </a>  </div>

{if $studentnumber ne ""}
	
	    
    {if $lang eq fi}
		<p>Yhdistyksess‰ on {$membercount[0].membercount} j‰sent‰, joista {$supportmembercount[0].supportmembercount} on kannatusj‰seni‰.</p>
		<p>Varsinaisten j‰senten p‰‰ainejakauma:</p>
	{else}
		<p>Association has {$membercount[0].membercount} members. {$supportmembercount[0].supportmembercount} of these members are supporting memebers.</p>
		<p>Majors of ordinary members:</p>
    {/if}



<table>

	<tr>
    	<th> {#major#}</th>
		<th> {#members#}</th>
    </tr>

    {section name="i" loop=$majorsstats}
    
    {if $lang eq fi}
		<tr>
    		<td>{$majorsstats[i].majorfi}</td>
			<td>{$majorsstats[i].members}</td>
    	</tr>

	{else}
		<tr>
    		<td>{$majorsstats[i].majoren}</td>
			<td>{$majorsstats[i].members}</td>
    	</tr>

    {/if}

    {sectionelse}

        <tr>
            <td colspan="2">{#nostats#}</td>
        </tr>
    {/section}

</table>

<br />

 {else}

		<p>{#membersonly#}</p>

 {/if}


{ include file="footer.tpl"}

