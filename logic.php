<?php session_start();
require_once('dbconnect.php');

//Code for Registration 
if (isset($_POST['signup'])) {
	$fname = $_POST['fname'];
	$police_id = $_POST['police_id'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$enc_password = $password;
	$sql = mysqli_query($con, "select id from users where email='$email'");
	$row = mysqli_num_rows($sql);
	if ($row > 0) {
		echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
	} else {
		$msg = mysqli_query($con, "insert into users(fname,police_id,email,password) values('$fname','$police_id','$email','$enc_password')");

		if ($msg) {
			echo "<script>alert('Register successfully');</script>";
		}
	}
}


// Code for login 
if (isset($_POST['login'])) {
    $password = $_POST['password'];
    $dec_password = $password;
    $useremail = $_POST['uemail'];
    $ret = mysqli_query($con, "SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $extra = "home.php";
        $_SESSION['login'] = $_POST['uemail'];
        $_SESSION['id'] = $num['id'];
        $_SESSION['name'] = $num['fname'];
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        echo "<script>alert('Invalid username or password');</script>";
        $extra = "login.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        //header("location:http://$host$uri/$extra");
        exit();
    }
}

//Code for Forgot Password

if (isset($_POST['send'])) {
    $femail = $_POST['femail'];

    $row1 = mysqli_query($con, "select email,password from users where email='$femail'");
    $row2 = mysqli_fetch_array($row1);
    if ($row2 > 0) {
        $email = $row2['email'];
        $subject = "Information about your password";
        $password = $row2['password'];
        $message = "Your password is " . $password;
        mail($email, $subject, $message, "From: $email");
        echo  "<script>alert('Your Password has been sent Successfully');</script>";
    } else {
        echo "<script>alert('Email not register with us');</script>";
    }
}

?>