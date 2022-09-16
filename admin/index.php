<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    if ($_SESSION['role']==0) {

?>

<?php include '../components/header.php'?>

<body>
    <?php include '../user_components/admin_navbar.php' ?>
    <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
</body>

</html>

<?php 
} else {
    header("Location: ./login.php?error=Your not a super user");
	exit();
}
}else{
    header("Location: login.php");
    exit();
}
?>