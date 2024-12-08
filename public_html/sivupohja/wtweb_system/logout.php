<?php
if (!$_SESSION['controller']) {	Header('Location: ../index.php');}
?>

<?php
//unset($_SESSION['log']);
$_SESSION['log'] = 'out';
// kill session variables
$_SESSION = array(); // reset session array
session_destroy();   // destroy session.
//header('Location: temp2/index.php');
// redirect them to anywhere you like.
?>