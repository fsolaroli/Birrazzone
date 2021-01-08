<?php

function checkEmailValidity($email, $userId=-1, $sellerId=-1) {
	global $dbh;
	$sellerData = $dbh->getSeller($sellerId);
	$userData = $dbh->getUser($userId);
	if (!empty($sellerData)) {
		$sellerEmail = $sellerData[0]["EmailBirrificio"];
	} else {
		$sellerEmail = "";
	}
	if (!empty($userData)) {
		$userEmail = $userData[0]["EmailUtente"];
	} else {
		$userEmail = "";
	}
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false || in_array($email, array_diff($dbh->getUsedEmail(), array($sellerEmail, $userEmail)))) {
		return false;
	} else {
		return true;
	}
}

function checkIVAValidity($IVA, $sellerId=0) {
	global $dbh;
	$sellerData = $dbh->getSeller($sellerId);
	if (!empty($sellerData)) {
		$sellerIVA = $sellerData[0]["PartitaIVA"];
	} else {
		$sellerIVA = "";
	}
	if (strlen($IVA)==11 && is_numeric($IVA) && !in_array($IVA, array_diff($dbh->getUsedIVA(), array($sellerIVA)))) {
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

function logOutSeller() {
	$_SESSION["sellerId"] = null;
}

function isSellerLoggedIn() {
	global $dbh;
    return (!empty($_SESSION['sellerId']) && !empty($dbh->getSeller($_SESSION["sellerId"])));
}

function isUserLoggedIn() {
    return !empty($_SESSION['userId']);
}

function hasNotification() {
	global $dbh;
	if(isSellerLoggedIn()) {
		return !empty($dbh->getSellerNotification($_SESSION["sellerId"]));
	} else if(isUserLoggedIn()) {
		return !empty($dbh->getUserNotification($_SESSION["userId"]));
	} else {
		return false;
	}
}

?>