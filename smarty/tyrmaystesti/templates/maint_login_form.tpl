

{ include file="maint_header.tpl" header="TYRM�YS Data Maintenance Login"}

<p>{$message|default:"Welcome to the TYRM�YS data maintenance facility."}</p>
<p>
Please log in.
</p>
<form action="index.php" method="post">
<p>Student number: <input type="text" name="studentnumber"/></p>
<p>Password: <input type="password"name="password"/></p>
<input type="hidden" name="action" value="login"/></p>
<p><input type="submit" value="Log in"/></p>
</form>


{ include file="maint_footer.tpl"}

