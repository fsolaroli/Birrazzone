<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "Utente - Carrello";
	$templateParams["Template"] = "ShoppingCart/userShoppingCartTemplate.php";
	$templateParams["HeaderType"] = "Global";

	$templateParams["birre"] = $dbh->getShoppingCart($_SESSION["userId"]);

	require("../../Template/baseTemplate.php");
}

?>