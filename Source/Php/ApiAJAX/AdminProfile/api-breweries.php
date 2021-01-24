<?php

require_once("../../Site/baseConfiguration.php");

$idbirrifici = $dbh->getAcceptedBreweryIds();

for($i = 0; $i < count($idbirrifici); $i++){
	$birrifici[$i] = $dbh->getBreweryById($idbirrifici[$i])[$i];
}

header("Content-Type: application/json");
echo json_encode($birrifici);
?>