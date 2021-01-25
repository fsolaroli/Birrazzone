<?php
require_once("../baseConfiguration.php");

if(!isAdminLoggedIn()){
	header("Location: ../login/adminLogin.php");
}else{
	$templateParams["Titolo"] = "AdminPage - Prodotto";
	$templateParams["Template"] = "AdminProfile/singleProductTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	$idbirra= -1;
	if(isset($_GET["id"])){
		$idbirra = $_GET["id"];
	}

	$templateParams["birra"] = $dbh->getBeer($idbirra);
	$prezzo = $templateParams["birra"]["Prezzo"];
	$birrevendute = $dbh->getNumberOfBeerSold($idbirra);
	$birrerimaste = $dbh->getBeerQuantity($idbirra);
}


require("../../Template/baseTemplate.php");
?>