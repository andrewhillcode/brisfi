<?php session_start();
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
		<!-- Header -->
		<h1>Archive</h1>
		<br><br>
		<!-- Map-->
		<div id="mapResults"></div> 
		<br><br>
		<!-- Results Table -->


		<?php
			$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try	{
				$result = $pdo->prepare('SELECT HotspotID, HotspotName, Address, Suburb '.
				 'FROM hotspots ');
				 $result->execute();
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}
			echo "<script type='text/javascript' src='Searchmapsnogeo.js'></script>";
			include 'mapData.php';
			$maps = array();
			echo '<table id="archivetable" border="1">';
			echo '<th>Name</th>';
			echo '<th>Address</th>';
			echo '<th>Suburb</th>';
			echo '<th>Rating</th>';
			echo '<th>Details</th>';
			foreach ($result as $hotspot) {

				echo '<tr>';
				echo '<td>',$hotspot['HotspotName'],'</td>';
				echo '<td>',$hotspot['Address'],'</td>';
				echo '<td>',$hotspot['Suburb'],'</td>';
				try	{
					$hotspotid = $hotspot['HotspotID'];
					$ratingavg = $pdo->prepare("SELECT AVG(rating) AS avgrating FROM reviews WHERE HotspotID = $hotspotid");
					$ratingavg->execute();
				}
				catch (PDOException $e) {
					echo $e->getMessage();
				}
				foreach ($ratingavg as $rating) {
				}
				if ($rating['avgrating'] == null) {
					echo '<td>n/a</td>';
				} else {
					echo '<td>',number_format((float)$rating['avgrating'], 1, '.', ''),'</td>';
				}
				echo '<td><a href="item.php?hotspotid=', $hotspot['HotspotID'],'">More Details</a></td>';
				echo '</tr>';
				
				$hotspotid = $hotspot['HotspotID']; 
				$data = GetMapData($hotspotid);
				//echo $data;

				echo "<script> GetResponse($data); </script>";
			}
			echo '</table>';
		?>
	</div>
	<!-- Footer -->
	<?php include 'footer.php'; ?>
</body>
</html>