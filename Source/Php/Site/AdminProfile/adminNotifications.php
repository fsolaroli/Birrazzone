<?php
require_once("../baseConfiguration.php");

if(!isAdminLoggedIn()){
	header("Location: ../login/adminLogin.php");
}else{
	$templateParams["Titolo"] = "AdminPage - Notification";
	$templateParams["Javascript"] = array("AdminProfile/adminNotifications.js","AdminProfile/adminProfilenav.js");
	$templateParams["Template"] = "AdminProfile/adminNotificationsTemplate.php";
	$templateParams["HeaderType"] = "Admin"; //Profile, Login, Global
}
require("../../Template/baseTemplate.php");
?>