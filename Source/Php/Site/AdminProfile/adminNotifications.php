<?php
require_once("../baseConfiguration.php");

if(!isAdminLoggedIn() || empty($_SESSION["adminLoggedIn"])){
	header("Location: ../login/adminLogin.php");
}else{
	$templateParams["Titolo"] = "AdminPage - Notification";
	$templateParams["Javascript"] = array("AdminProfile/adminNotifications.js","AdminProfile/adminProfileAside.js");
	$templateParams["Template"] = "AdminProfile/adminNotificationsTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global
}
require("../../Template/baseTemplate.php");
?>