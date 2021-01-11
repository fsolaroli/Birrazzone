<?php

require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Registrazione birrificio";
$templateParams["Javascript"] = array("SellerProfile/sellerRegistration.js");
$templateParams["Template"] = "SellerProfile/sellerRegistrationTemplate.php";
$templateParams["HeaderType"] = "Login"; //Profile, Login, Global

require("../../Template/baseTemplate.php");

?>