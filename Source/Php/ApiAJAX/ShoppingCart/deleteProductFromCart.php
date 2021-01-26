<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["Id"]) && isUserLoggedIn()) {
	$dbh->removeBeerFromShoppingCart($_SESSION["userId"],$_POST["Id"]);
}else if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}

?>