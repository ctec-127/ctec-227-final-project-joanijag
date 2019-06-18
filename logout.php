<?php 
/* logout.php */
session_start();
$pageTitle = 'Log Out';
require_once("inc/header.php");
require_once('db/mysqli_connect.php');

if(!isset($_SESSION['loggedin'])){
  header('login.php');
}else{
  $_SESSION = [];
  session_destroy();
}

?> 
 
<?php require_once('inc/nav.php'); ?>
<h1>Gearhead</h1>
<div class="success">You have been logged out from Gearhead</div>