<?php

require_once("../../Site/baseConfiguration.php");

$birrifici = $dbh->getAllSeller();

header("Content-Type: application/json");
echo json_encode($birrifici);
?>