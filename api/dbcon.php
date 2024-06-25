<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "player";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//"Driver={MySQL ODBC 8.0 UNICODE Driver};Server=MYSQL8010.site4now.net;Database=db_aaa142_phuong1;Uid=aaa142_phuong1;Password=YOUR_DB_PASSWORD"