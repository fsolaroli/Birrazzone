<?php

function checkEmailValidity($email) {
	global $dbh;
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false || in_array($email, $dbh->getUsedEmail())) {
		return false;
	} else {
		return true;
	}
}

function checkIVAValidity($IVA) {
	global $dbh;
	if (strlen($IVA)==11 && is_numeric($IVA) && !in_array($IVA, $dbh->getUsedIVA())) {
		return true;
	} else {
		return false;
	}
}

function checkPasswordValidity($password) {
	return strlen($password) >= 8;
}

function registerLoggedSeller($sellerId){
	$_SESSION["userId"] = null;
	$_SESSION["sellerId"] = $sellerId;
	$_SESSION["sellerProfilePage"]="Notification";
}

function isSellerLoggedIn(){
    return !empty($_SESSION['sellerId']);
}

function isUserLoggedIn(){
    return !empty($_SESSION['userId']);
}

?>