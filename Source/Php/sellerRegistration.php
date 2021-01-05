<?php
require_once("baseConfiguration.php");


if (isset($_POST["ragioneSociale"]) && isset($_POST["email"]) && isset($_POST["IVA"])) {
	if(!checkEmailValidity($_POST["email"])) {
		$templateParams["errors"]["email"] = "EMAIL ERRATA O GIÀ UTILIZZATA";
	}
	if(!checkIVAValidity($_POST["IVA"])) {
		$templateParams["errors"]["IVA"] = "IVA ERRATA O GIÀ UTILIZZATA";
	}

	if(!isset($templateParams["errors"])) {
		$dbh->requestSellerAccount($_POST["ragioneSociale"], $_POST["email"], $_POST["IVA"]);
		$templateParams["complete"] = true;
	}
}

$templateParams["Titolo"] = "Registrazione birrificio";
// $templateParams["Javascript"] = array("jquery-3.4.1.min.js","example.js");
$templateParams["Template"] = "sellerRegistrationTemplate.php";
$templateParams["HeaderType"] = "Login"; //Profile, Login, Global

require("./Template/baseTemplate.php");

?>
