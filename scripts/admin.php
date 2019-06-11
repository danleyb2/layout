<?php
require_once CONFIG.DS.'config.php';
$users=User::get_users();

if (!$users) {
	exit('Could not get users');
}

?>

