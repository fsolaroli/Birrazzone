<?php

require_once("../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	
	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
	
	if (isset($_POST["sellerProfilePage"])) {
		$_SESSION["sellerProfilePage"] = $_POST["sellerProfilePage"];
	}
	
	switch ($_SESSION["sellerProfilePage"]) {
		case 'Notification':
			echo json_encode(array("Type" => "Notification", "Data" => $dbh->getSellerNotification($_SESSION["sellerId"])));
			break;
		case 'AccountData':
			echo json_encode(array("Type" => "AccountData", "Data" => array($sellerData["NomeBirrificio"], $sellerData["EmailBirrificio"], $sellerData["PartitaIVA"])));
			break;
		case 'SellerData':
			echo json_encode(array($sellerData["Localita"], $sellerData["FotoBirrificio"], $sellerData["DescrizioneBirrificio"]));
			break;
		case 'Products':
			echo json_encode($dbh->getSellerBeer($_SESSION["sellerId"]));
			break;
		default:
			break;
	}
}

?>