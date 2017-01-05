<?php	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['admin']);
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
	CAB203 A2 Website
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
		<h1>You have been logged out.</h1>
	</div>
	<!-- Footer -->
	<?php include 'footer.php'; ?>
</body>
</html>