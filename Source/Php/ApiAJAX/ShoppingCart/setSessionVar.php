<?php

require_once("../../Site/baseConfiguration.php");

if (isUserLoggedIn()){
	$_SESSION["Scadenza"] = null;
	$_SESSION["NomeTitolare"] = null;
	$_SESSION["CVV"] = null;
	$_SESSION["NumeroCarta"] = null;
	$_SESSION["PrezzoCarrello"] = null;

	if(!empty($_SESSION["addressId"])){
		$orderId = $dbh->finalizeOrder($_SESSION["userId"], $_SESSION["addressId"])["ID"];
	}else{
		$orderId = $dbh->finalizeOrder($_SESSION["userId"], $dbh->getUser($_SESSION["userId"])[0]["IdIndirizzo"])["ID"];
	}

	foreach($dbh->getOrderProducts($orderId) as $birra){

		var_dump($birra["IdBirra"]);

		if($dbh->getBeerQuantity($birra["IdBirra"]) < 10){

			if($dbh->getBeerQuantity($birra["IdBirra"]) == 0){

				$dbh->addSellerNotification($birra["IdBirrificio"], 1, "Scorte di ".$birra["NomeBirra"]." esaurite",
				 "Le tue scorte di ".$birra["NomeBirra"]." sono esaurite, aggiungi nuove scorte al più presto!" );

			}else {

				$dbh->addSellerNotification($birra["IdBirrificio"], 1, "Scorte di ".$birra["NomeBirra"]." sono in esaurimento",
				"Le tue scorte di ".$birra["NomeBirra"]." stanno esaurendo, aggiungi nuove scorte al più presto!
				Attualmente sono rimaste ".$dbh->getBeerQuantity($birra["IdBirra"])." bottiglie di ".$birra["NomeBirra"].".");
			}
		}
	}
	$dbh->addUserNotification($_SESSION["userId"], 1, "Grazie per l'acquisto!","Il tuo Ordine con ID: ".$orderId." è in elaborazione");
}
if(!isUserLoggedIn()){
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}
?>