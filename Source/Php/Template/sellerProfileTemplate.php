<?php
$sellerData = $dbh->getSeller($_SESSION["sellerId"]);
if(empty($sellerData) || !isSellerLoggedIn()){
	header("Location: home.php");
} else {
	var_dump($sellerData);
}
?>