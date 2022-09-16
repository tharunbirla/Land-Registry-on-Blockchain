<?php include '../includes/config.inc.php' ?>
<?php

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "UPDATE clients SET verified=1 WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: ./admin_users.php?success=Record updated successfully");
} else {
    header("Location: ./admin_users.php?error=Error updating record");
}

?>