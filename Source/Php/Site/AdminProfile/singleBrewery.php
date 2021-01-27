<?php
require_once("../baseConfiguration.php");
if(!isAdminLoggedIn()){
	header("Location: ../login/adminLogin.php");
}else{
	$templateParams["Titolo"] = "AdminPage - Birrificio";
	$templateParams["Javascript"] = array("AdminProfile/adminSellerProduct.js", "AdminProfile/adminProfileAside.js");
	$templateParams["Template"] = "AdminProfile/singleBreweryTemplate.php";
	$templateParams["HeaderType"] = "Admin"; //Profile, Login, Global

	$idbirrificio = -1;
	if(isset($_GET["id"])){
		$idbirrificio = $_GET["id"];
	}

	$templateParams["birre"] = $dbh->getSellerBeer($idbirrificio);
	$birrificio = $dbh->getSeller($idbirrificio)[0];
}

require("../../Template/baseTemplate.php");
?>