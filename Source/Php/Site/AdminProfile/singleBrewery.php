<?php
require_once("../baseConfiguration.php");
if(isAdminLoggedIn()){
	header("Location: ../login/adminLogin.php");
}else{
	$templateParams["Titolo"] = "AdminPage - Birrificio";
	$templateParams["Javascript"] = array("AdminProfile/deleteBrewery.js");
	$templateParams["Template"] = "AdminProfile/singleBreweryTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	$idbirrificio = -1;
	if(isset($_GET["id"])){
		$idbirrificio = $_GET["id"];
	}

	$templateParams["birre"] = $dbh->getSellerBeer($idbirrificio);
	$templateParams["birrificio"] = $dbh->getSeller($idbirrificio);
	var_dump($dbh->getSeller($idbirrificio));
}

require("../../Template/baseTemplate.php");
?>