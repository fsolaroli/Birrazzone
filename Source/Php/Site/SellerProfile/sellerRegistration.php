<?php

require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "SellerRegistration";
$templateParams["Javascript"] = array("SellerProfile/sellerRegistration.js");
$templateParams["Template"] = "SellerProfile/sellerRegistrationTemplate.php";
$templateParams["HeaderType"] = "Login"; //Profile, Login, Global

require("../../Template/baseTemplate.php");

?>