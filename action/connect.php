<?php
date_default_timezone_set("Asia/Bangkok");

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "root";
$database = "db_kmutnb_smart_service";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

$dateTime = date("Y-m-d H:i:s");
