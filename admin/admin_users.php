<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['wallet'])) {
    if ($_SESSION['role']==0) {

?>

<?php include '../components/header.php'?>

<body>
    <?php include '../user_components/admin_navbar.php' ?>
    <?php include '../includes/config.inc.php' ?>
    <h3 class='center'>New users for verification</h3>

    <span class="center">
        <?php if (isset($_GET['error'])) { ?>
        <p class="red-text"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
        <p class="green-text"><?php echo $_GET['success']; ?></p>
        <?php } ?>
    </span>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Wallet Address</th>
                <th>Aadhaar</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM clients";
            $result = mysqli_query($conn, $sql);

            if(!$result) {
                die("Error" . $conn->error);
            }

            while($row = $result -> fetch_assoc()){
                if ($row['role']!=0) {
                    if($row['verified']==0){
                        if($row['role']==1){
                            echo '<tr>
                                <th>'. $row['id'] .'</th>
                                <th>'. $row['user_name'] .'</th>
                                <th>'. $row['email'] .'</th>
                                <th>'. $row['wallet'] .'</th>
                                <th>'. $row['aadhaar'] .'</th>
                                <th>Seller</th>
                                <th>
                                <a class="green-text" href="approve.php?id='. $row['id'] .'"><i class="small material-icons">done</i></a></button>
                                <a class="red-text" href="delete.php?id='. $row['id'] .'"><i class="small material-icons">delete</i></a></button>
                                </th>
                            </tr>';
                        } elseif ($row['role']==2) {
                            echo '<tr>
                                <th>'. $row['id'] .'</th>
                                <th>'. $row['user_name'] .'</th>
                                <th>'. $row['email'] .'</th>
                                <th>'. $row['wallet'] .'</th>
                                <th>'. $row['aadhaar'] .'</th>
                                <th>Buyer</th>
                                <th>
                                <a class="green-text" href="approve.php?id='. $row['id'] .'"><i class="small material-icons">done</i></a></button>
                                <a class="red-text" href="delete.php?id='. $row['id'] .'"><i class="small material-icons">delete</i></a></button>
                                </th>
                            </tr>';
                        }
                    }
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