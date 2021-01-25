<?php
require_once("../baseConfiguration.php");

if(!isUserLoggedIn()){
	header("Location: ../login/login.php");
}else{
	$templateParams["Titolo"] = "AdminPage - Prodotto";
	$templateParams["Template"] = "ShoppingCart/productPageTemplate.php";
	//$templateParams["Javasctipt"] = "adminProfileAside.js"; -- creare pagina js per aggiungere birra al carrello
	$templateParams["HeaderType"] = "Global"; //Profile, Login, Global

	$idbirra= -1;
	if(isset($_GET["id"])){
		$idbirra = $_GET["id"];
	}

	$birra = $dbh->getBeer($idbirra)[0];
}
require("../../Template/baseTemplate.php");
?>