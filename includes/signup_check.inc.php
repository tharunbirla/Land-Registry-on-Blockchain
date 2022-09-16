<?php 
session_start(); 
include "config.inc.php";
$salt = '287eYsHM';

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['email']) && isset($_POST['re_password'])
	&& isset($_POST['waddress']) && isset($_POST['role'])
	&& isset($_POST['aadhaar'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$email = validate($_POST['email']);
	
	$waddress = validate($_POST['waddress']);
	$aadhaar = validate($_POST['aadhaar']);
	$role = validate($_POST['role']);

	$user_data = 'uname='. $uname. '&name='. $email;


	if (empty($uname)) {
		header("Location: ../register.php?error=Username is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: ../register.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: ../register.php?error=Confirm Password is required&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: ../register.php?error=Email is required&$user_data");
	    exit();
	}

	else if(empty($waddress)){
        header("Location: ../register.php?error=Wallet address is required&$user_data");
	    exit();
	}
	
	else if(empty($aadhaar)){
        header("Location: ../register.php?error=Aadhaar number is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: ../register.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}
		
	else if(!preg_match('/^\w{5,}$/', $uname)){
        header("Location: ../register.php?error=Username should be longer than or equals 5 chars&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($salt.$pass.$salt);

	    $sql = "SELECT * FROM clients WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../register.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
			$sql2 = "INSERT INTO clients(user_name, password, email, wallet, aadhaar, role) VALUES('$uname', '$pass', '$email', '$waddress', '$aadhaar', '$role')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				header("Location: ../register.php?success=Your account has been created successfully");
				exit();
			}else {
					header("Location: ../register.php?error=unknown error occurred&$user_data");
					exit();
			}
		}
	}
	
}else{
	header("Location: ../register.php");
	exit();
}