<?php
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "AdminPage - Birrificio";
$templateParams["Javascript"] = array("AdminProfile/deleteBrewery.js");
$templateParams["Template"] = "AdminProfile/singleBreweryTemplate.php";
$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

$idbirrificio = -1;
if(isset($_GET["id"])){
	$idbirrificio = $_GET["id"];
}

$templateParams["birre"] = $dbh->getBeer($idbirrificio);
$templateParams["birrificio"] = $dbh->getBreweryById($idbirrificio)[0];

require("../../Template/baseTemplate.php");
?>