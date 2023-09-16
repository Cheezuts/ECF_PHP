<?php ob_start(); ?>
<?php session_start(); ?>



<?php 

$_SESSION['user_email'] = null;
$_SESSION['user_role'] = null;

header("Location: ../index.php");

?>