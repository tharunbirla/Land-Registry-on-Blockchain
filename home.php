<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['wallet'])) {
    $Role = $_SESSION['role'];
?>

<?php include 'components/header.php'?>
<script src='./assets/js/web3_check.js'></script>

<body>
    <?php include './user_components/navbar.php' ?>
    <?php include './includes/config.inc.php' ?>

    <script src="./assets/js/web3.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>

    <?php 
    if ($Role==1) {
        
    ?>
    <script src='./assets/js/land_contract.js'></script>

    <h3 class='center'>Your properties</h3>

    <span class="center">
        <?php if (isset($_GET['error'])) { ?>
        <p class="red-text"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
        <p id="success" class="green-text"><?php echo $_GET['success']; ?></p>
        <?php } ?>
    </span>

    <table style="table-layout: fixed; width: 100%">
        <thead>
            <tr>
                <th>Verifier</th>
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
            $sql = "SELECT * FROM property WHERE verified=1 LIMIT 1";
            $result = mysqli_query($conn, $sql);

            if(!$result) {
                die("Error" . $conn->error);
            }

            while($row = $result -> fetch_assoc()){
                            if ($row['owner_wallet']==$_SESSION['wallet']) {
                                echo '<tr>
                                <th style="word-wrap: break-word" id="verifier">'. $row['verifier'] .'</th>
                                <th style="word-wrap: break-word" id="country">'. $row['country'] .'</th>
                                <th style="word-wrap: break-word" id="state">'. $row['state'] .'</th>
                                <th style="word-wrap: break-word" id="city">'. $row['city'] .'</th>
                                <th style="word-wrap: break-word" id="propertyaddress">'. $row['propertyaddress'] .'</th>
                                <th style="word-wrap: break-word" id="latitude">'. $row['latitude'] .'</th>
                                <th style="word-wrap: break-word" id="longitude">'. $row['longitude'] .'</th>
                                <th>
                                <button class="waves-effect waves-light btn" id="createContract">Register</button>
                                </th>
                            </tr>';
                            }
            }
            ?>
        </tbody>
    </table>
    <?php
    }
    ?>
    <?php 
    if ($Role==2) {
        
    ?>
    <script src='./assets/js/land_view.js'></script>

    <h3 class='center'>Search for property</h3>

    <span class="center">
        <?php if (isset($_GET['error'])) { ?>
        <p class="red-text"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
        <p id="success" class="green-text"><?php echo $_GET['success']; ?></p>
        <?php } ?>
    </span>
    <div class="row center">
        <div class="col s12 m8 l4 offset-m2 offset-l4">
            <div class="form-field">
                <input id="contractaddress" type="text" placeholder="Contract Hash" name="contractHash"
                    id="contractHash">
                <button id="searchLand" class="waves-effect deep-purple waves-light btn"><i
                        class="material-icons right">search</i>Search</button>
                <p class="red-text" id="errorResult"></p>
            </div><br>
        </div>
    </div>
    <?php
    }
    ?>
</body>

</html>

</html>

<?php 
}else{
    header("Location: login.php");
    exit();
}
?>