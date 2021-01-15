<?php

require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Seller Page";
$templateParams["Javascript"] = array("SellerPage/sellerPage.js");
$templateParams["Template"] = "SellerPage/sellerPageTemplate.php";
$templateParams["HeaderType"] = "Global"; //Profile, Login, Global

require("../../Template/baseTemplate.php");

?>