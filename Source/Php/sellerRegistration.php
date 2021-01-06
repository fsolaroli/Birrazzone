<?php

require_once("baseConfiguration.php");

$templateParams["Titolo"] = "Registrazione birrificio";
$templateParams["Javascript"] = array("jquery-3.4.1.min.js","sellerRegistration.js");
$templateParams["HeaderType"] = "Login"; //Profile, Login, Global

require("./Template/baseTemplate.php");

?>