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
	if ((strlen($email) > 50 || strlen($email) == 0) || (filter_var($email, FILTER_VALIDATE_EMAIL)===false || in_array($email, array_diff($dbh->getUsedEmail(), array($sellerEmail, $userEmail))))) {
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
	return strlen($password) >= 8 && strlen($password) <= 32;
}

function checkNameValidity($name) {
	return strlen($name) > 0 && strlen($name) <= 30;
}

function registerLoggedSeller($sellerId){
	$_SESSION["userId"] = null;
	$_SESSION["sellerId"] = $sellerId;
	// $_SESSION["sellerProfilePage"]="Notification";
}

function registerLoggedUser($userId){
	$_SESSION["userId"] = $userId;
	$_SESSION["sellerId"] = null;
}

function isSetSessionAddress(){
	return !empty($_SESSION["addressId"]);
}

function isSetSessionPayment(){
	return (!empty($_SESSION["CVV"]) && !empty($_SESSION["Scadenza"]) && !empty($_SESSION["NomeTitolare"]) && !empty($_SESSION["NumeroCarta"]));
}

function logOut() {
	if (isSellerLoggedIn()) {
		$_SESSION["sellerId"] = null;
	} else if (isUserLoggedIn()) {
		if(isSetSessionAddress() || isSetSessionPayment() || !empty($_SESSION["PrezzoCarrello"])){
			$_SESSION["addressId"] = null;
			$_SESSION["Scadenza"] = null;
			$_SESSION["NomeTitolare"] = null;
			$_SESSION["CVV"] = null;
			$_SESSION["NumeroCarta"] = null;
			$_SESSION["PrezzoCarrello"] = null;
		}
		$_SESSION["userId"] = null;
	}
}

function adminLogOut() {
	if (isAdminLoggedIn()) {
		$_SESSION["adminLoggedIn"] = null;
	}
}

function isSellerLoggedIn() {
	global $dbh;
    return (!empty($_SESSION['sellerId']) && !empty($dbh->getSeller($_SESSION["sellerId"])));
}

function isUserLoggedIn() {
    return !empty($_SESSION['userId']);
}

function isAdminLoggedIn(){
	return !empty($_SESSION["adminLoggedIn"]);
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

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    // $maxKB = 300;
    $maxKB = 5000;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $errors = [];
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $errors[] = "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $errors[] = "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $errors[] = "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(empty($errors)){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $errors[] = "Errore nel caricamento dell'immagine.";
        }
	}

    return array("Name" => $imageName, "Errors" => $errors);
}

function drawNotification($notification) {
	echo "
		<li id='".$notification["IdNotifica"]."'>
			<div>
				<p>".$notification["Oggetto"]."</p>
				<img src='../../../../Immagini/Icone/Expand.png' alt='expande ".$notification["IdNotifica"]."'/>
				<img src='../../../../Immagini/Icone/Collapse.png' alt='collapse ".$notification["IdNotifica"]."' hidden/>
			</div>
			<div hidden>
				<p>".$notification["Corpo"]."</p>
				<button class='read ".$notification["IdNotifica"]."'>Leggi</button>
			</div>
		</li>
	";
}

function totalQuantityOrdered($orderId) {
	global $dbh;
	$orderedProducts = $dbh->getOrderProducts($orderId);
	$totalQuantity = null;
	foreach($orderedProducts as $product) {
		$totalQuantity += $product["QuantitaTot"];
	}

	return $totalQuantity;
}

function totalPrice($orderId) {
	global $dbh;
	$orderedProducts = $dbh->getOrderProducts($orderId);
	$totalPrice = null;
	foreach($orderedProducts as $product) {
		$totalPrice += $product["Totale"];
	}

	return $totalPrice;
}

?>