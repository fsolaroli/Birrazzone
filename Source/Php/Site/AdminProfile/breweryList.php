<?php
require_once("../baseConfiguration.php");

if(!isAdminLoggedIn() || empty($_SESSION["adminLoggedIn"])){
	header("Location: ../login/adminLogin.php");
}else{
	$templateParams["Titolo"] = "AdminPage - Lista Birrifici accettati";
	$templateParams["Javascript"] = array("/AdminProfile/breweryList.js", "AdminProfile/adminProfileAside.js");
	$templateParams["Template"] = "AdminProfile/breweryListTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global
}
require("../../Template/baseTemplate.php");
?>