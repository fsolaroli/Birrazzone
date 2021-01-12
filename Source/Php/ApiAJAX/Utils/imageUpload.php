<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	if(isset($_FILES["image"])) {
		echo json_encode(uploadImage(UPLOAD_DIR."Birrifici/", $_FILES["image"]), JSON_UNESCAPED_SLASHES);
	}
}

?>