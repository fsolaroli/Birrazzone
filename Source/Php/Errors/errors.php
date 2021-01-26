<?php 
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Errore";
$templateParams["Javascript"] = array("Login/login.js");
$templateParams["Template"] = "Errors/".$_POST["errorType"]."Template.php";
$templateParams["HeaderType"] = "Global";

require("../../Template/baseTemplate.php");

?>