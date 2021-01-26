<?php

require_once("../../Site/baseConfiguration.php");

if (isUserLoggedIn()) {
	$cart["birre"] = $dbh->getShoppingCart($_SESSION["userId"]);
	$newPrice = null;
	foreach($cart["birre"] as $birra){
		$newPrice += $birra["Totale"];
	}
	$_SESSION["PrezzoCarrello"] = $newPrice;
}else if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}
echo json_encode($newPrice);
?>