<?php

require_once("../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	$dbh->deleteSeller($_SESSION["sellerId"]);
	logOutSeller();
}

?>