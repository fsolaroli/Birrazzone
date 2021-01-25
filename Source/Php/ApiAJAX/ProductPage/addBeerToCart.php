<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdProduct"]) && isUserLoggedIn()) {
	if($_POST["BeerQt"] > 0 && $_POST["BeerQt"] <= $_POST["MaxQt"]){
		$dbh->addBeerToShoppingCart($_SESSION["userId"],$_POST["IdProduct"],$_POST["BeerQt"]);
		$data = true;
	}else{
		$data = false;
	}
}else if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}
echo json_encode($data);
?>