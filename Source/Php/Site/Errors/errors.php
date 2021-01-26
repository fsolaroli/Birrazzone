<?php 
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Errore";
$templateParams["Template"] = "Errors/".$_GET["errorType"]."Template.php";
$templateParams["HeaderType"] = "Global";

require("../../Template/baseTemplate.php");

?>