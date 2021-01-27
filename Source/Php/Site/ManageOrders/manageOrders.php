<?php
require_once("../baseConfiguration.php");

$templateParams["Titolo"] = "Gestisci ordini";
$templateParams["Template"] = "ManageOrders/manageOrdersTemplate.php";
$templateParams["Javascript"] = array("ManageOrders/manageOrders.js"); 
$templateParams["HeaderType"] = "Login"; //Profile, Login, Global

require("../../Template/baseTemplate.php");
?>