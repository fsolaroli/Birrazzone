<?php

require_once("../../Site/baseConfiguration.php");

if (isUserLoggedIn()) {
	$_SESSION["Via"] = null;
	$_SESSION["Provincia"] = null;
	$_SESSION["CAP"] = null;
	$_SESSION["Citta"] = null;
	$_SESSION["Scadenza"] = null;
	$_SESSION["NomeTitolare"] = null;
	$_SESSION["CVV"] = null;
	$_SESSION["NumeroCarta"] = null;
	$_SESSION["PrezzoCarrello"] = null;

	foreach($dbh->getShoppingCart($_SESSION["userId"]) as $birra):
		$dbh->removeBeerFromShoppingCart($_SESSION["userId"], $birra["IdBirra"]);
	endforeach;
}else if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}
?>