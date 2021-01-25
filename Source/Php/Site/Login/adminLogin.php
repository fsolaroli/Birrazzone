<?php
require_once("../baseConfiguration.php");

if(isAdminLoggedIn()){
	header("Location: ../AdminProfile/adminNotifications.php");
}else{
	$templateParams["Titolo"] = "AdminLogin";
	$templateParams["Javascript"] = array("Login/adminLogin.js");
	$templateParams["Template"] = "Login/adminLoginTemplate.php";
	$templateParams["HeaderType"] = "Login"; //Profile, Login, Global
}
require("../../Template/baseTemplate.php");

?>