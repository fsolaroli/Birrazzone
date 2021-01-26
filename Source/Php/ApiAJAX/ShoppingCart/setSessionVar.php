<?php

require_once("../../Site/baseConfiguration.php");

if (isUserLoggedIn()){
	$_SESSION["Scadenza"] = null;
	$_SESSION["NomeTitolare"] = null;
	$_SESSION["CVV"] = null;
	$_SESSION["NumeroCarta"] = null;
	$_SESSION["PrezzoCarrello"] = null;
	
	if(!empty($_SESSION["addressId"])){
		$orderId = $dbh->finalizeOrder($_SESSION["userId"], $_SESSION["addressId"]);
	}else{
		$orderId = $dbh->finalizeOrder($_SESSION["userId"], $dbh->getUser($_SESSION["userId"])[0]["IdIndirizzo"]);
	}

	foreach($dbh->getShoppingCart($_SESSION["userId"]) as $birra){

		if($dbh->getBeerQuantity($birra["IdBirra"])[0] < 10){

			$sellerId = $birra["IdBirrificio"];

			if($dbh->getBeerQuantity($birra["IdBirra"])[0] == 0){

				$dbh->addSellerNotification($sellerId, 1, "Scorte di "+$birra["NomeBirra"]+ "esaurite",
				 "Le tue scorte di "+$birra["NomeBirra"]+"sono esaurite, aggiungi nuove scorte al più presto!");

			}else {

				$dbh->addSellerNotification($sellerId, 1, "Scorte di "+$birra["NomeBirra"]+ "sono in esaurimento",
				"Le tue scorte di "+$birra["NomeBirra"]+"stanno esaurendo, aggiungi nuove scorte al più presto!\n
				Attualmente sono rimaste "+$dbh->getBeerQuantity($birra["IdBirra"])+" bottiglie di "+$birra["NomeBirra"]);
			}
		}
	}
	$dbh->addUserNotification($_SESSION["userId"], 1, "Grazie per l'acquisto!","Il tuo Ordine con Id: "+$orderId+" è in elaborazione");
}
if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}
?>