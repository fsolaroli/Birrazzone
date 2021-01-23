<?php

require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "UserRegistration";
$templateParams["Javascript"] = array("userRegistration.js");
$templateParams["Template"] = "UserProfile/userRegistrationTemplate.php";
$templateParams["HeaderType"] = "Login";

require("../../Template/baseTemplate.php");

?>