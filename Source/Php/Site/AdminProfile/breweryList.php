<?php
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "AdminPage - Gestione Richieste";
$templateParams["Javascript"] = array("/AdminProfile/breweryList.js");
$templateParams["Template"] = "AdminProfile/breweryListTemplate.php";
$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

require("../../Template/baseTemplate.php");
?>