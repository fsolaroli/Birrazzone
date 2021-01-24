<?php
require_once("../baseConfiguration.php");
if(isAdminLoggedIn()){
	$templateParams["Titolo"] = "AdminPage - Lista Birrifici accettati";
	$templateParams["Javascript"] = array("/AdminProfile/breweryList.js");
	$templateParams["Template"] = "AdminProfile/breweryListTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global
}else{
	$templateParams["Titolo"] = "AdminLogin";
	$templateParams["Javascript"] = array("Login/adminLogin.js");
	$templateParams["Template"] = "Login/adminLoginTemplate.php";
	$templateParams["HeaderType"] = "Login"; //Profile, Login, Global
}

require("../../Template/baseTemplate.php");
?>