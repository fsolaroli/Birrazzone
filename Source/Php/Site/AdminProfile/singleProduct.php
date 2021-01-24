<?php
require_once("../baseConfiguration.php");
if(isAdminLoggedIn()){
	$templateParams["Titolo"] = "AdminPage - Prodotto";
	$templateParams["Template"] = "AdminProfile/singleProductTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	$idbirra= -1;
	if(isset($_GET["id"])){
		$idbirra = $_GET["id"];
	}

	$templateParams["birra"] = $dbh->getThisBeer($idbirra);
	$prezzo = $dbh->getBeerPrice($idbirra)[0]["Prezzo"];
	$birrevendute = $dbh->getNumberOfBeerSold($idbirra);
	$birrerimaste = $dbh->getBeerQuantity($idbirra);
}else{
	$templateParams["Titolo"] = "AdminLogin";
	$templateParams["Javascript"] = array("Login/adminLogin.js");
	$templateParams["Template"] = "Login/adminLoginTemplate.php";
	$templateParams["HeaderType"] = "Login"; //Profile, Login, Global
}


require("../../Template/baseTemplate.php");
?>