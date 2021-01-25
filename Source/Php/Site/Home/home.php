<?php
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Home";
$templateParams["Template"] = "homeTemplate.php";
$templateParams["HeaderType"] = "Global"; //Profile, Login, Global

require("../../Template/baseTemplate.php");
?>