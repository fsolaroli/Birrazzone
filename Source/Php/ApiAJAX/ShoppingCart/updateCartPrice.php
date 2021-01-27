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
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}
echo json_encode($newPrice);
?>