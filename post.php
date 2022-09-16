<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['wallet']) && isset($_SESSION['role'])) {

?>
<?php include 'components/header.php'?>

<body>
    <?php include 'user_components/navbar.php' ?>
    <h3 class='center'>Add you land</h3>
    <?php include 'user_components/add_post.php'?>
</body>

<script src='./assets/js/web3_check.js' />
<script src='./assets/js/land_contract.js' />

</html>
<?php 
}else{
    header("Location: login.php");
    exit();
}
?>