<?php  session_start();
	$errors = array(); //initializes error array 
	if (isset($_POST['login'])){ //if values posted
		include 'validate.php';
		$errors = validateLogin($_POST['Username'],$_POST['password']); //validates username and password
		if (!$errors) {
			$_SESSION['user'] = $_POST['Username']; //logs user in
			if ($_SESSION['user'] == 'admin'){
				$_SESSION['admin'] = true; //gives admin privlidges if needed
			}
				header("Location: http://{$_SERVER['HTTP_HOST']}/brisfi/search.php"); //sends to search page
			exit();
		} else {
			echo "<script>window.alert('Invalid Login');</script>";
		}
	}
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bris-Fi</title>
	<link rel="icon" type="image/png" href="icon.png" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="apple-touch-icon" href="icon.png"/>
	<link rel="apple-touch-startup-image" href="splash.png">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<script type="text/javascript" src="validation.js"></script>
	<meta charset="UTF-8"/>
	<!-- 
	CAB230 A2 Website
	Wifi hotspot locator 
	Created by Andrew Hill and Sebastian Sherry
	-->
</head>
<body>
	<!-- Navigation bar -->
	<?php include 'menu.php'; ?>
	<!-- Main Content -->
	<div id="content">
		<!-- Header -->
		<img src="logo-big.png" alt="Bris-Fi Logo" id="biglogo">
		<br>
		<h2>Login below to start searching for local WiFi Hotspots!</h2>
		<br>
		<!--Login Form-->
		<?php include 'formLogin.php'; ?> <!--inserts login form-->
		
		<p id="noaccount"><b><i>Don't have an account?</b></i> <a href="register.php">Click here</a> to create one! <!-- link to registration page -->
	</div>
	<!-- Footer -->
	<?php include 'footer.php'; ?>
</body>
</html>