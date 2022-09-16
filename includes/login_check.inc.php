<?php 
session_start(); 
include "config.inc.php";
$salt = '287eYsHM';

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['username']);
	$pass = validate($_POST['password']);
	$pass = md5($salt.$pass.$salt);

	if (empty($uname)) {
		header("Location: ../login.php?error=Username is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../login.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM clients WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	if($row['verified']==1){
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['role'] = $row['role'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['wallet'] = $row['wallet'];
					header("Location: ../home.php");
					exit();
				}
				else if($row['role']==0){
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['role'] = $row['role'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['wallet'] = $row['wallet'];
					header("Location: ../admin");
					exit();
				} else {
					header("Location: ../login.php?error=Your account is not verified yet");
		        	exit();
				}
            }else{
				header("Location: ../login.php?error=Incorrect Username or password");
		        exit();
			}
		}else{
			header("Location: ../login.php?error=Incorrect Username or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../login.php");
	exit();
}