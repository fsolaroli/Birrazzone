<?php
require_once("../baseConfiguration.php");

	$templateParams["Titolo"] = "AdminPage - Prodotto";
	$templateParams["Template"] = "AdminProfile/singleProductTemplate.php";
	$templateParams["Javasctipt"] = "adminProfileAside.js";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	$idbirra= -1;
	if(isset($_GET["id"])){
		$idbirra = $_GET["id"];
	}

	$birra = $dbh->getBeer($idbirra)[0];
	$birrevendute = $dbh->getNumberOfBeerSold($idbirra);
	$birrerimaste = $dbh->getBeerQuantity($idbirra);
 
require("../../Template/baseTemplate.php");
?>