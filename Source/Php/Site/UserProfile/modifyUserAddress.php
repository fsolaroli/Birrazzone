<?php

require_once("../baseConfiguration.php");
$data["errorType"] = 401;
$data["errorMessage"] = "È necessario essere loggato come utente per avere accesso a questa pagina";

if(!isUserLoggedIn()) {
	header("Location :../../Errors/errors.php?errorType=".$data["errorType"]."&errorMessage=".$data["errorMessage"]);
} else {
	$templateParams["Titolo"] = "Utente - Modifica indirizzo di fatturazione";
	$templateParams["Javascript"] = array("UserProfile/userProfileAside.js", "UserProfile/modifyUserAddress.js");
	$templateParams["Template"] = "UserProfile/modifyUserAddressTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>