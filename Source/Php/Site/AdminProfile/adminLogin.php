<?php
require_once("../baseConfiguration.php");

if(isAdminLoggedIn()){
	$templateParams["Titolo"] = "AdminPage";
	//$templateParams["Javascript"] = array("AdminPage/adminPage.js");
	//$templateParams["Template"] = "../../Template/AdminPage/adminPageTemplate.php";
	$templateParams["HeaderType"] = "Login"; //Profile, Login, Global
}else{
	$templateParams["Titolo"] = "AdminLogin";
	$templateParams["Javascript"] = array("Login/login.js");
	$templateParams["Template"] = "AdminProfile/adminLoginTemplate.php";
	$templateParams["HeaderType"] = "Login"; //Profile, Login, Global
}
require("../../Template/baseTemplate.php");

?>