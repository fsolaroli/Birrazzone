<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdBirrificio"])) {
	$dbh->rejectSellerRequest($_POST["IdBirrificio"]);
}

?>