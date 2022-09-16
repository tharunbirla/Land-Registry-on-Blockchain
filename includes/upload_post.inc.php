<?php 
session_start(); 
include "config.inc.php";
$username = $_SESSION['user_name'];
$wallet = $_SESSION['wallet'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($username) && isset($_POST['country']) && isset($_POST['state'])
    && isset($_POST['latitude']) && isset($_POST['longitude'])
    && isset($_POST['city']) && isset($_POST['address'])) {
	
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $country = validate($_POST['country']);
        $state = validate($_POST['state']);
        $city = validate($_POST['city']);    
        $address = validate($_POST['address']);
        $latitude = validate($_POST['latitude']);    
        $longitude = validate($_POST['longitude']);

        $sql2 = "INSERT INTO property(owner, owner_wallet, country, state, city, propertyaddress, latitude, longitude, verified) VALUES('$username', '$wallet', '$country', '$state', '$city', '$address', $latitude, $longitude, 0)";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				header("Location: ../post.php?success=Your property has been posted and is for review");
				exit();
			}else {
					header("Location: ../post.php?error=unknown error occurred&$user_data");
					exit();
			}
    
}else{
	header("Location: ../post.php");
	exit();
}