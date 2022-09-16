<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['wallet'])) {
    if ($_SESSION['role']==0) {

?>

<?php include '../components/header.php'?>

<body>
    <?php include '../user_components/admin_navbar.php' ?>
    <?php include '../includes/config.inc.php' ?>
    <h3 class='center'>New lands for verification</h3>

    <span class="center">
        <?php if (isset($_GET['error'])) { ?>
        <p class="red-text"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
        <p id="success" class="green-text"><?php echo $_GET['success']; ?></p>
        <?php } ?>
    </span>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Owner</th>
                <th>Wallet Address</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Address</th>
                <th>Latitude</th>
                <th>Longitude</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM property";
            $result = mysqli_query($conn, $sql);

            if(!$result) {
                die("Error" . $conn->error);
            }

            while($row = $result -> fetch_assoc()){
                    if($row['verified']==0){
                            echo '<tr>
                                <th>'. $row['id'] .'</th>
                                <th>'. $row['owner'] .'</th>
                                <th>'. $row['owner_wallet'] .'</th>
                                <th>'. $row['country'] .'</th>
                                <th>'. $row['state'] .'</th>
                                <th>'. $row['city'] .'</th>
                                <th>'. $row['propertyaddress'] .'</th>
                                <th>'. $row['latitude'] .'</th>
                                <th>'. $row['longitude'] .'</th>
                                <th>Seller</th>
                                <th>
                                <a class="green-text" href="approve_land.php?id='. $row['id'] .'"><i class="small material-icons">done</i></a></button>
                                <a class="red-text" href="delete_land.php?id='. $row['id'] .'"><i class="small material-icons">delete</i></a></button>
                                </th>
                            </tr>';
                    }
            }
            ?>
        </tbody>
    </table>
</body>

</html>

<?php 
} else {
    header("Location: ../login.php?error=Your not a super user");
	exit();
}
}else{
    header("Location: login.php");
    exit();
}
?>