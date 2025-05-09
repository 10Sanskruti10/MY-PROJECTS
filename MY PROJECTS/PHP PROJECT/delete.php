<?php
include 'conn.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from users where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:display.php');
    } else {
        echo "DB not connected...";
    }

}

session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}

?>