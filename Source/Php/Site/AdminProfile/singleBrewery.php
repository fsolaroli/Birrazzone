<?php
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "AdminPage - Gestione Richieste";
$templateParams["Javascript"] = array("/AdminProfile/brewery.js");
$templateParams["Template"] = "AdminProfile/singleBreweryTemplate.php";
$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

require("../../Template/baseTemplate.php");
?>