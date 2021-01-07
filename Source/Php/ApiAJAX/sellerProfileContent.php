<?php

require_once("../Site/baseConfiguration.php");

function addQuantity($product) {
	global $dbh;
	$product["Quantita"] = $dbh->getBeerQuantity($product["IdBirra"])[0]["Quantità"];
	return $product;
}

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
			echo json_encode(array("Type" => "AccountData", "Data" => array("NomeBirrificio" => $sellerData["NomeBirrificio"], "EmailBirrificio" => $sellerData["EmailBirrificio"], "PartitaIVA" => $sellerData["PartitaIVA"], "Password" => $sellerData["PasswordBirrificio"])));
			break;
		case 'SellerData':
			echo json_encode(array("Type" => "SellerData", "Data" => array("Localita" => $sellerData["Localita"], "FotoBirrificio" => $sellerData["FotoBirrificio"], "DescrizioneBirrificio" => $sellerData["DescrizioneBirrificio"])));
			break;
		case 'Products':
			// $products = $dbh->getSellerBeer($_SESSION["sellerId"]);
			$products = array_map("addQuantity", $dbh->getSellerBeer($_SESSION["sellerId"]));
			echo json_encode(array("Type" => "Products", "Data" => $products));
			break;
		default:
			break;
	}
}

?>