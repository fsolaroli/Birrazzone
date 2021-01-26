<?php
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Pagina Prodotto";
$templateParams["Template"] = "ProductPage/productPageTemplate.php";
$templateParams["Javascript"] = array("ProductPage/addBeerToCart.js"); 
$templateParams["HeaderType"] = "Global"; //Profile, Login, Global

require("../../Template/baseTemplate.php");
?>