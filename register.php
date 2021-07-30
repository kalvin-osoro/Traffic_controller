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
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<title>Login System</title>
	<!-- <link href="css/style.css" rel='stylesheet' type='text/css' /> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements" . /> -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sufee Admin - HTML5 Admin Template</title>
	<meta name="description" content="Sufee Admin - HTML5 Admin Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- css -->
	<link rel="apple-touch-icon" href="apple-icon.png">
	<link rel="shortcut icon" href="favicon.ico">


	<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
	<link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

	<link rel="stylesheet" href="assets/css/style.css">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


	<!-- end css -->

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'> -->
</head>

<body class="bg-dark">

	<div class="sufee-login d-flex align-content-center flex-wrap">
		<div class="container">
			<div class="login-content">
				<div class="login-logo">
					<a href="index.html">
						<img class="align-content" src="images/logo.png" alt="">
					</a>
				</div>

				<div class="login-form">
					<form name="registration" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="fname" placeholder="User Name" required>
						</div>
						
						<div class="form-group">
							<label>Police Id</label>
							<input type="text" class="form-control" name="police_id" placeholder="Police Id" required>
						</div>
						
						<div class="form-group">
							<label>Email address</label>
							<input type="email" class="form-control" name="email" placeholder="Email">
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						

						<div class="checkbox">
							<label>
								<input type="checkbox"> Agree the terms and policy
							</label>
						</div>

						<button type="submit" name="signup" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>

						
						<div class="social-login-content">
							<div class="social-button">
								<button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
								<button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
							</div>
						</div>
						<div class="register-link m-t-15 text-center">
							<p>Already have account ? <a href="#"> Sign in</a></p>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>


	<div class="main">
		<h1>Registration and Login System</h1>
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab">
						<div class="top-img"><img src="images/top-note.png" alt="" /></div><span>Register</span>

					</li>
					<li class="resp-tab-item" aria-controls="tab_item-1" role="tab">
						<div class="top-img"><img src="images/top-lock.png" alt="" /></div><span>Login</span>
					</li>
					<li class="resp-tab-item lost" aria-controls="tab_item-2" role="tab">
						<div class="top-img"><img src="images/top-key.png" alt="" /></div><span>Forgot Password</span>
					</li>
					<div class="clear">ff</div>
				</ul>

				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						<div class="facts">

							<div class="register">
								<form name="registration" method="post" action="" enctype="multipart/form-data">
									<p>First Name </p>
									<input type="text" class="text" value="" name="fname" required>
									<p>Police id</p>
									<input type="text" class="text" value="" name="police_id" required>
									<p>Email Address </p>
									<input type="text" class="text" value="" name="email">
									<p>Password </p>
									<input type="password" value="" name="password" required>

									<div class="sign-up">
										<input type="reset" value="Reset">
										<input type="submit" name="signup" value="Sign Up">
										<div class="clear"> </div>
									</div>
								</form>

							</div>
						</div>
					</div>
					<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="facts">
							<div class="login">
								<div class="buttons">


								</div>
								<form name="login" action="" method="post">
									<input type="text" class="text" name="uemail" value="" placeholder="Enter your registered email"><a href="#" class=" icon email"></a>

									<input type="password" value="" name="password" placeholder="Enter valid password"><a href="#" class=" icon lock"></a>

									<div class="p-container">

										<div class="submit two">
											<input type="submit" name="login" value="LOG IN">
										</div>
										<div class="clear"> </div>
									</div>

								</form>
							</div>
						</div>
					</div>
					<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="facts">
							<div class="login">
								<div class="buttons">


								</div>
								<form name="login" action="" method="post">
									<input type="text" class="text" name="femail" value="" placeholder="Enter your registered email" required><a href="#" class=" icon email"></a>

									<div class="submit three">
										<input type="submit" name="send" onClick="myFunction()" value="Send Email">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>