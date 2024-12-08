{ include file="maint_header.tpl" header="TYRMÄYS Maintenance Login"}
	
	{$message}

	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	<input type="text" name="minutedatetime" id="minutedatetime" />
	<input type="file" name="minute" id="minute" />
	</form>

{ include file="maint_footer.tpl"}