<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdProduct"]) && isUserLoggedIn()) {
	$dbh->removeBeerFromShoppingCart($_SESSION["userId"],$_POST["IdProduct"]);
}else if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}

?>