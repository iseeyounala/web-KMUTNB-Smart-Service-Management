<?php
date_default_timezone_set("Asia/Bangkok");
$hostname = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "db_kmutnb_smart_service";

// Create connection
$conn = new mysqli($hostname, $db_user, $db_pass, $db_name);
$conn -> set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

?>