<?php
if (!$_SESSION['controller']) {	Header('Location: index.php');}

$name = $_POST["name"];
$ID = $_POST["ID"];
$type = $_POST["type"];
$edit = $_POST["edit"];
$backup = $_POST["backup"];
$onpage = $_POST["onpage"];

if (!$_SESSION["log"] == 'in')
{
// User not logged in, redirect to login page
Header("Location: index.php");
}
// if page is not submitted to itself echo the form
if (!isset($_POST['submit'])) {
?>

<form method="post" action="<?php echo $PHP_SELF;?>">
	<table border="0" cellspacing="3" cellpadding="5">
		<tr>
			<td>Name:</td>
			<td><input type="text" size="65" maxlength="50" name="name" /></td>
		</tr>

		<tr>
			<td>ID:</td>
			<td><input type="text" size="65" maxlength="50" name="ID" /></td>
		</tr>

		<tr>
			<td>Type:</td>
			<td>
				<select NAME="type">
        			<option value="public">Public</option>
        			<option value="private">Private</option>
        			<option value="hidden">Hidden</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>Edit:</td>
			<td>
				<select NAME="edit">
        			<option value="normal">Normal</option>
        			<option value="article">Article</option>
        			<option value="none">None</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>Backup:</td>
			<td><input type="checkbox" name="backup" />Backup</td>
		</tr>

		<tr>
			<td>OnPage:</td>
			<td><input type="text" size="65" maxlength="50" name="onpage" /></td>
		</tr>

		<tr>
			<td colspan="2" align="right">
				<input type="hidden" name="id" value="addpage" />
				<input type="submit" value="submit" name="submit" />
			</td>
		</tr>
	</table>
</form>

<?
}
else
{
	if (false)
	{
		// !!! alert-warning telling that headline and text are required?
		Header('Location: index.php?page=article&amp;articlepage=' . $articlepage );
    }
	else
	{
		$PAGES = $HTTP_SESSION_VARS ["pages"];
        $pageTemp = array("name" => $name,
						"ID" => $ID,
						"type" => $type,
						"edit" => $edit,
						"backup" => $backup,
						"onpage" => $onpage );
        array_push($PAGES, $pageTemp);
		$HTTP_SESSION_VARS ["pages"] = $PAGES;

		$file_name= "wtweb_public_pages/" . $ID . ".php";

		$fp = fopen ($file_name, "w");
		// Open the file in write mode, if file does not exist then it will be created.
		fwrite ($fp,$controllercheck);          // entering data to the file
		fclose ($fp);                                // closing the file pointer
		//chmod($file_name,0777);           // changing the file permission.
	    Header("Location: index.php?page=$ID");
	}
}
?>

