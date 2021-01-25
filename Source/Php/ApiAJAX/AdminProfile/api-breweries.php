<?php

require_once("../../Site/baseConfiguration.php");

$idbirrifici = $dbh->getAcceptedBreweryIds();

for($i = 0; $i < count($idbirrifici); $i++){
	$birrifici[$i] = $dbh->getBreweryById($idbirrifici[$i]["Idbirrificio"]);
}

header("Content-Type: application/json");
echo json_encode($birrifici);
?>