<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdProduct"]) && isUserLoggedIn()) {
	$birra = $dbh->getBeer($_POST["IdProduct"])[0];
	$newPrice = $birra["Prezzo"] * $_POST["newQuantity"];
}else if(!isUserLoggedIn()){
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}
echo json_encode($newPrice);
?>