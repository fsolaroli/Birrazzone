<?php

require_once("../../Site/baseConfiguration.php");

$dbh->deleteAddress($_SESSION["userId"]);

?>