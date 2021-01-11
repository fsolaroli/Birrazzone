<?php

require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Registrazione birrificio";
$templateParams["Javascript"] = array("SellerProfile/sellerRegistrationConfermation.js");
$templateParams["Template"] = "SellerProfile/sellerRegistrationConfermationTemplate.php";
$templateParams["HeaderType"] = "Login"; //Profile, Login, Global

require("../../Template/baseTemplate.php");

?>