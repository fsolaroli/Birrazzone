<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["notificationId"])) {
	$dbh->readNotification($_POST["notificationId"]);
}

?>