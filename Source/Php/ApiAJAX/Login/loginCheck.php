<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["email"]) && isset($_POST["pw"])) {
	global $dbh;
	$possibleSeller = $dbh->checkSellerLogin($_POST["email"], $_POST["pw"]);
	$possibleUser = $dbh->checkUserLogin($_POST["email"], $_POST["pw"]);

	if(!empty($possibleSeller) || !empty($possibleUser)) {
		$error = null;

		if(!empty($possibleSeller)) {
			$_SESSION["userId"] = null;
			$_SESSION["sellerId"] = $possibleSeller["IdBirrificio"];
		} else {
			$_SESSION["userId"] = $possibleUser["IdUtente"];
			$_SESSION["sellerId"] = null;
		}
	} else {
		$error = true;
	}

	echo json_encode($error);
}

?>