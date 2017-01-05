<?php 	session_start();
	ini_set('auto_detect_line_endings', true);

	$complete = "";
	if (isset($_POST['submit']) && isset($_SESSION['admin'])){

		$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$csvfile = $_FILES['csv']['tmp_name'];
		$file = fopen($csvfile, "r") or die("cant open file");

		while (!feof($file) ) {

			$line = fgetcsv($file, 1024);

			if ($line[0] == 'Wifi Hotspot Name') {
				$line = fgetcsv($file, 1024);
			}			
			
			try	{
				$result = $pdo->prepare("INSERT INTO hotspots (HotspotName, Address, Suburb, Latitude, Longitude) " .
					"VALUES (:name, :address, :suburb, :latitude, :longitude)");
				$result->bindValue(':name', $line[0]);
				$result->bindValue(':address', $line[1]);
				$result->bindValue(':suburb', $line[2]);
				$result->bindValue(':latitude', $line[3]);
				$result->bindValue(':longitude', $line[4]);
				$result->execute();
			}
			catch (PDOException $e) {
					echo $e->getMessage();
			}

		}
		$complete = "Hotspot data inserted.";
		fclose($file);
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
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaMcZ930HoHAPsFTVStTdnLFc4JvI5Bzk">
    </script>
	<!--Javascript-->
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
		<?php if (!isset($_SESSION['admin'])){
			echo "<h1>THIS IS A RESTRICTED PAGE.</h1>";
			echo "<h2>Sign in as admin to continue.</h2>";
		} else { ?>
		<!-- Header -->
		<h1>Admin</h1>
		<br>
		<?php echo "<h2>$complete</h2>"; ?>
		<br>
		<!-- Results Table -->
		<form action="admin.php" method="post" enctype="multipart/form-data" name="csvform" id="csvform"> 
			<fieldset>
				<legend>CSV Upload</legend>
		  Choose csv file: <br /> 
		  <input name="csv" type="file" id="csv" /> 
		  <input type="submit" name="submit" value="Upload" /> 
		</fieldset>
		</form> 
		<br>
</p>

	
	<?php } ?>
	</div>
	<!-- Footer -->
	<?php include 'footer.php'; ?>
</body>
</html>