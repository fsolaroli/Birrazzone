<?php

require_once("baseConfiguration.php");

$templateParams["Titolo"] = "Registrazione birrificio";
$templateParams["Template"] = "sellerRegistrationConfermationTemplate.php";
$templateParams["Javascript"] = array("jquery-3.4.1.min.js","sellerRegistrationConfermation.js");
$templateParams["HeaderType"] = "Login"; //Profile, Login, Global

require("../Template/baseTemplate.php");

?>