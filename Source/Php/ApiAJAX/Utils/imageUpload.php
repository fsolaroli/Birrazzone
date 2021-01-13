<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	if(isset($_FILES["image"]) && isset($_POST["destination"])) {
		echo json_encode(uploadImage(UPLOAD_DIR.$_POST["destination"]."/", $_FILES["image"]), JSON_UNESCAPED_SLASHES);
	}
}

?>	