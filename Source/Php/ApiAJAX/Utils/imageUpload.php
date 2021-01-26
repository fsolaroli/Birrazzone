<?php

require_once("../../Site/baseConfiguration.php");

if(!isSellerLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

if (isSellerLoggedIn()) {
	if(isset($_FILES["image"]) && isset($_POST["destination"])) {
		echo json_encode(uploadImage(UPLOAD_DIR.$_POST["destination"]."/", $_FILES["image"]), JSON_UNESCAPED_SLASHES);
	}
}

?>	