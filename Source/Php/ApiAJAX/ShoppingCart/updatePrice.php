<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdProduct"]) && isUserLoggedIn()) {
	$birra = $dbh->getBeer($_POST["IdProduct"])[0];
	$newPrice = $birra["Prezzo"] * $_POST["newQuantity"];
}else if(!isUserLoggedIn()){
	header("../../Site/Login/login.php");
}
echo json_encode($newPrice);
?>