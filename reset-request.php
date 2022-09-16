<?php

if (isset($_POST['reset_request_btn'])) {
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "kollab.rf.gd/create-new-password.php?selector=$selector&validator=" . bin2hex(token);
    $expires = date("U") + 1800;

    require '../config.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "An error occured!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt,"s",$userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "An error occured!";
        exit();
    } else {
        $hashedToken = password_hash($token,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close();

    //Emailing

    $to = $userEmail;
    $subject = "Reset password requested!";
    $message = "<p>We received a request for resetting your password. This is the link of your password</p>";
    $message .= "<p>Here is your reset password:</p><br>";
    $message .= "<a href='$url'>". $url . '</a></p><br>';
    $message .= "<p>Ignore this mail if you haven't requested for password reset.</p>";
    $headers = "From: Kollab <admin@kollab.com>\r\n";
    $headers .= "Reply-To: kollab@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to,$subject,$message,$headers);

    header("Location: ../reset-password.php?reset=success");

} else {
    header("Location: ../index.php");
}