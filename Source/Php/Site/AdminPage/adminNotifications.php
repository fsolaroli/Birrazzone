<?php
require_once("../baseConfiguration.php");

	$templateParams["Titolo"] = "AdminPage - Notification";
	$templateParams["Javascript"] = array("AdminPage/adminNotifications.js");
	$templateParams["Template"] = "AdminPage/adminNotificationsTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");

?>