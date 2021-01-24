<?php

require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Registrazione utente";
$templateParams["Javascript"] = array("UserProfile/userRegistration.js");
$templateParams["Template"] = "UserProfile/userRegistrationTemplate.php";
$templateParams["HeaderType"] = "Login";

require("../../Template/baseTemplate.php");

?>