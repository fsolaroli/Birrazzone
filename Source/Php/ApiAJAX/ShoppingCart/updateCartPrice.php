<?php

require_once("../../Site/baseConfiguration.php");

if (isUserLoggedIn()) {
	$cart["birre"] = $dbh->getShoppingCart($_SESSION["userId"]);
	$newPrice = null;
	foreach($cart["birre"] as $birra){
		$newPrice += $birra["Totale"];
	}
}else if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}
echo json_encode($newPrice);
?>