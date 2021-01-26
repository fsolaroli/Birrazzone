<?php
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Ricerca";
$templateParams["Template"] = "searchTemplate.php";
$templateParams["HeaderType"] = "Global"; //Profile, Login, Global

require("../../Template/baseTemplate.php");
?>