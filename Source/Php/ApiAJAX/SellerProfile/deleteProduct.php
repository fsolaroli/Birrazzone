<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	$dbh->deleteBeer($_POST["productId"]);
}

?>