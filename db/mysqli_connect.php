<?php

function db_connection(){
	$db = new mysqli('localhost','root','','gearhead');
	if ($db->connect_error) {
		$error = $db->connect_error;
		echo $error;
	}
	$db->set_charset('utf8');
	return $db;
}


//  $db = db_connection();