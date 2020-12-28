<?php
session_start();
require_once("Utils/UtilsFunction.php");
require_once("../Database/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "birrazzone", 3306);
?>