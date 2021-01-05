<?php

require_once("../Database/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "birrazzone", 3306);

function isUserLoggedIn(){
    return !empty($_SESSION['idautore']);
}

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


?>