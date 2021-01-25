<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdProduct"]) && isUserLoggedIn()) {
		$dbh->addBeerToShoppingCart($_SESSION["userId"],$_POST["IdProduct"],$_POST["Quantity"]);
}else if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}
?>