<?php
require_once("../baseConfiguration.php");

if(!isAdminLoggedIn()){
	header("Location: ../login/adminLogin.php");
}else{
	$templateParams["Titolo"] = "AdminPage - Lista Birrifici accettati";
	$templateParams["Javascript"] = array("/AdminProfile/breweryList.js", "AdminProfile/adminProfileAside.js");
	$templateParams["Template"] = "AdminProfile/breweryListTemplate.php";
	$templateParams["HeaderType"] = "Admin"; //Profile, Login, Global
}
require("../../Template/baseTemplate.php");
?>