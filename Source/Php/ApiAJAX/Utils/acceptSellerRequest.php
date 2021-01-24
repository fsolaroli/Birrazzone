<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdBirrificio"])) {
	$i = 1;
	do{
		$token = random($i);
		$i++;
	}while($dbh->getUsedToken()->contains($token));
	$dbh->acceptSellerRequest($_POST["IdBirrificio"], $token);
}

?>