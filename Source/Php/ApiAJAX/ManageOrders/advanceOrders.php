<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["orderId"])) {
	
	$dbh->advanceOrderStatus($_POST["orderId"]);

	$order = $dbh->getOrder($_POST["orderId"])[0];

	$dbh->addUserNotification($order["IdUtente"], 1, "Aggiornamento stato ordine n:".$_POST["orderId"], "Il tuo Ordine con ID: ".$_POST["orderId"]." è ".$order["Descrizione"]);

	echo json_encode(array("Code" => $order["Codice"]));
}

?>