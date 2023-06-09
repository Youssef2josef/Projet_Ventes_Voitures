<?php
require_once "db_config.php";
//creation connection
$conn = mysqli_connect($tab["host"],$tab["user"],$tab["password"],$tab["database"]);
// Change character set to utf8
mysqli_set_charset($conn,"utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>