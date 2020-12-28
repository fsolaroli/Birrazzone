<?php
require_once("baseConfiguration.php");

$templateParams["Titolo"] = "Home";
// $templateParams["Javascript"] = array("jquery-3.4.1.min.js","example.js");
$templateParams["Template"] = "homeTemplate.php";
$templateParams["HeaderType"] = "Global"; //Profile, Login, Global

require("./Template/baseTemplate.php");
?>