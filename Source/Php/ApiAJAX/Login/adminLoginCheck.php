<?php
require_once("../../Site/baseConfiguration.php");
$data = null;
if(!isAdminLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=Non puoi effettuare questa operazione poiché sei già loggato");
}
if((isset($_POST["username"]) && isset($_POST["pw"])) && (checkNameValidity($_POST["username"]) && checkPasswordValidity($_POST["pw"]))){
	if(!(strcmp($_POST["username"], "admin.beer") == 0) && !(strcmp($_POST["pw"], "birrazzone2021") == 0)){
		$data = "error";
	}else{
		$_SESSION["adminLoggedIn"] = true;
	}
}

echo json_encode($data);
?>