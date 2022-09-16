<?php

session_start(); 
include "../includes/config.inc.php";

$wallet = $_SESSION['wallet'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql2 = "UPDATE property SET verifier='$wallet', verified=1 WHERE id=$id";

$result2 = mysqli_query($conn, $sql2);
if ($result2) {
	header("Location: ./admin_lands.php?success=Property id $id is approved");
	exit();
}else {
	header("Location: ./admin_lands.php?error=unknown error occurred&$user_data");
    exit();
}

?>