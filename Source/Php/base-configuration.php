<?php
session_start();
require_once("source/database/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "birrazzone", 3306);
?>