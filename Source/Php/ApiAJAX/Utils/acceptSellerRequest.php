<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdBirrificio"])) {
	$i = 1;
	do{
		$token = random_bytes($i);
		$i++;
	}while(in_array($token, $dbh->getUsedToken()));
	$dbh->acceptSellerRequest($_POST["IdBirrificio"], $token);
	echo json_encode($token);
}
?>