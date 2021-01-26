<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	$dbh->deleteSeller($_SESSION["sellerId"]);
	logOut();
} else {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come birrificio per poter compiere questa operazione");
}

?>