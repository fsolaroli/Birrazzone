<?php

require_once("../../Site/baseConfiguration.php");

if (isUserLoggedIn()){
	$_SESSION["Via"] = null;
	$_SESSION["Provincia"] = null;
	$_SESSION["CAP"] = null;
	$_SESSION["Citta"] = null;
	$_SESSION["Scadenza"] = null;
	$_SESSION["NomeTitolare"] = null;
	$_SESSION["CVV"] = null;
	$_SESSION["NumeroCarta"] = null;
	$_SESSION["PrezzoCarrello"] = null;

	$orderId = $dbh->finalizeOrder($_SESSION["userId"], $_SESSION["addressId"]);

	foreach($dbh->getShoppingCart($_SESSION["userId"]) as $birra){

		if($dbh->getBeerQuantity($birra["IdBirra"])[0] < 10){

			$sellerId = $dbh->getSeller($birra["IdBirra"])[0];

			if($dbh->getBeerQuantity($birra["IdBirra"]) == 0){

				$dbh->addSellerNotification($sellerId["SellerId"], 1, "Scorte di "+$birra["NomeBirra"]+ "esaurite",
				 "Le tue scorte di "+$birra["NomeBirra"]+"sono esaurite, aggiungi nuove scorte al più presto!" );

			}else {

				$dbh->addSellerNotification($sellerId["SellerId"], 1, "Scorte di "+$birra["NomeBirra"]+ "sono in esaurimento",
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