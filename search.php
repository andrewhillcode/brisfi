<?php session_start();

		if (isset($_GET['namesearch']))
		{
			$_SESSION['name'] = $_GET['name'];
			if (!$errors) {
				header("Location: http://{$_SERVER['HTTP_HOST']}/brisfi/results.php");
				exit();
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
		<h1>Search</h1>
		<p>You can search for a hotspot by your current location, a suburb, or a name!</p>
		<p id="geo-message">Please enable location services to search by Geolocation. <br>When the system has found your location the button will become enabled.</p>
		<!-- geosearch form -->
		<form name="searchgeo" action="results.php" method="GET" onsubmit="return validateSearch()"> 
			<fieldset name="geosearch">
				<legend>Geolocation</legend>
			<input id="lat" type="hidden" name="lat">  
			<input id="lng" type="hidden" name="lng">  
			<select name="range">
				<option value="2">2km</option>
				<option value="4">4km</option>
				<option value="6">6km</option>
				<option value="8">8km</option>
				<option value="10">10km</option>
				<option value="12">12km</option>
				<option value="14">14km</option>
				<option value="16">16km</option>
				<option value="18">18km</option>
				<option value="20">20km</option>
				</select>  
			<input type="submit" value="Search" name="geosearch" id="geobutton" disabled> <br> <!-- disable button until lat and lng are input -->
		</fieldset>
		</form>

		<p> OR </p>
		<!-- suburb search form -->
		<form name="searchsuburb" action="results.php" method="GET" onsubmit="return validateSearch()">
		<!--By Name-->
		<fieldset name="subsearch">
		<legend>Suburb Search</legend>
		<!--By Suburb-->
		Suburb: 
		<?php
			include 'suburb.php'; //surburb dropdown reference
			suburbDropDown();
		?>
		<input type="submit" value="Search" name="subsearch"> <br>
		</fieldset>
		</form>
		<p> OR </p>
		<!-- Search by name form. Links straight to the item page -->
		<form name="searchname" action="item.php" method="GET" onsubmit="return validateSearch()">
		<!--By Name-->
		<fieldset name="searchname">
		<legend>Location Name Search</legend>
		Hotspot Name:
		<?php
			nameDropDown(); //name dropdown menu link
		?>
		<input type="submit" value="Search" name="namesearch"> <br>
		</fieldset>
		</form>

		<script type="text/javascript" src="getLocation.js"></script> <!-- call location features -->
		
		<br><br>
	</div>
	<!-- Footer -->
	<?php include 'footer.php'; ?>
</body>
</html>