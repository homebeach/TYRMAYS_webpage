

{ include file="header.tpl" }
{section name="i" loop=$linkgroups}

    {if $lang eq fi}
		{$linkgroups[i].groupdescriptionfi}
    {else}
		{$linkgroups[i].groupdescriptionen}
    {/if}

    <br />
    <br />


    {section name="j" loop=$links}	

    {if $linkgroups[i].groupid eq $links[j].groupid}


<table>
    <tr>
    <td><a href="{$links[j].url}">
    {if $lang eq fi}
		{$links[j].linktextfi}
    {else}
		{$links[j].linktexten}	
    {/if}
    </a> 
    </td>
    </tr>
</table>
    {/if}

   
{/section}
<br />
{/section}


{ include file="footer.tpl"}

