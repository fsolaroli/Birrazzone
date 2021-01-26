<?php

require_once("../../Site/baseConfiguration.php");

if (isUserLoggedIn()) {
		$_SESSION["Via"] = $_POST["via"];
		$_SESSION["Citta"] = $_POST["citta"];
		$_SESSION["CAP"] = $_POST["cap"];
		$_SESSION["Provincia"] = $_POST["provincia"];
}else if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}
?>