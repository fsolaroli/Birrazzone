<?php
require_once("../baseConfiguration.php");

if(!isAdminLoggedIn()){
	header("Location: ../login/adminLogin.php");
}else{
	$templateParams["Titolo"] = "AdminPage - Prodotto";
	$templateParams["Template"] = "AdminProfile/singleProductTemplate.php";
	$templateParams["Javascript"] = array("AdminProfile/adminProfilenav.js");
	$templateParams["HeaderType"] = "Admin"; //Profile, Login, Global

	$idbirra= -1;
	if(isset($_GET["id"])){
		$idbirra = $_GET["id"];
	}

	$birra = $dbh->getBeer($idbirra)[0];
	$birrevendute = $dbh->getNumberOfBeerSold($idbirra);
	$birrerimaste = $dbh->getBeerQuantity($idbirra);
}
require("../../Template/baseTemplate.php");
?>