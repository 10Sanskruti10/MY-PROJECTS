<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "final";

$conn = new mysqli($servername, $username, $password, $db_name);

if (!$conn) {
    echo "DB not connected...";
}

?> 