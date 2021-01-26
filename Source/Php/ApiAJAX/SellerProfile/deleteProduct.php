<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	$dbh->deleteBeer($_POST["productId"]);
} else {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage='È necessario essere loggato come birrificio per poter compiere questa operazione'");
}

?>