<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "password";
$databaseName = "astha_real_estate_1";

$conn = new mysqli($servername, $username, $password, $databaseName);
$sitehost = $_SERVER['SERVER_NAME'];
$sitehost = $sitehost . "/". 'astha-real-estate';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
