<?php
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Home";
$templateParams["Template"] = "Home/homeTemplate.php";
$templateParams["HeaderType"] = "Global"; //Profile, Login, Global

require("../../Template/baseTemplate.php");
?>