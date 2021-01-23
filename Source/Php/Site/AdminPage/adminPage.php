<?php
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "AdminPage";
$templateParams["Javascript"] = array("AdminPage/adminPage.js");
$templateParams["Template"] = "AdminPage/adminPageTemplate.php";
$templateParams["HeaderType"] = "Global"; //Profile, Login, Global

require("../../Template/baseTemplate.php");

?>