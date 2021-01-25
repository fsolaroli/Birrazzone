<?php
require_once("../baseConfiguration.php");

	$templateParams["Titolo"] = "AdminPage - Notification";
	$templateParams["Javascript"] = array("AdminProfile/adminNotifications.js");
	$templateParams["Template"] = "AdminProfile/adminNotificationsTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");

?>