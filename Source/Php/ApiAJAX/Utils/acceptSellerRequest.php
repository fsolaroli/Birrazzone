<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdBirrificio"])) {
	$length = 10;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	do{
		$token = '';
		for ($i = 0; $i < $length; $i++) {
			$token .= $characters[rand(0, $charactersLength - 1)];
		}
	}while(in_array($token, $dbh->getUsedToken()));
	$dbh->acceptSellerRequest($dbh->getSeller($_POST["IdBirrificio"][0]["EmailBirrificio"]), $token);

	mail($_POST["EmailBirrificio"], "Seller request accepted",
	"Congratulations, you have just become a Seller of Birrazzone!\n
	click the link below to confirm your registration:\n
	http://localhost/Progetto/Source/Php/Site/SellerProfile/sellerRegistrationConfermation.php?token=$token");

	echo json_encode($token);
}
?>