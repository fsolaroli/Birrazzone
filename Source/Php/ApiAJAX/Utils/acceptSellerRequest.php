<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdBirrificio"])) {
	$length = 10;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	do{
		$token = '';
		for ($i = 0; $i < $length; $i++) {
			$token .= $characters[rand(0, $charactersLength - 1)];
		}
	}while(in_array($token, $dbh->getUsedToken()));
	$dbh->acceptSellerRequest($_POST["IdBirrificio"], $token);
	echo json_encode($token);
}
?>