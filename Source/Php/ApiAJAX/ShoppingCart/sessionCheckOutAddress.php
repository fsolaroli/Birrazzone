<?php

require_once("../../Site/baseConfiguration.php");

if (isUserLoggedIn()) {
		$_SESSION["Via"] = $_POST["via"];
		$_SESSION["Citta"] = $_POST["citta"];
		$_SESSION["CAP"] = $_POST["cap"];
		$_SESSION["Provincia"] = $_POST["provincia"];
		$_SESSION["addressId"] = $dbh->addAddress($_SESSION["Via"], $_SESSION["Citta"], $_SESSION["Provincia"], $_SESSION["CAP"])[0];
}else if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}
?>