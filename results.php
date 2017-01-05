<?php	session_start();
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
		<h1>Results</h1>
		<br><br>
		<!-- Map-->
		<div id="mapResults"></div> 
		<br><br>
		<!-- Results Table -->
		<?php
			if (isset($_GET['lat']) && isset($_GET['lng'])){ //code for geo search
				echo "<script type='text/javascript' src='Searchmaps.js'></script>";
				$lat = $_GET['lat']; 
				$lng = $_GET['lng']; 
				$range = $_GET['range'];


				$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				try	{
					/* This code is from Google's map API. It performs a calculation to determine the distance between two latlong points
					and stores it as the 'distance' variable. The query then grabs everything with a distance less than the user input $range
					in kilometers and orders them by how close they are to the user.*/
					$result = $pdo->prepare("SELECT HotspotID, HotspotName, Address, Suburb, ( 6371 * acos( cos( radians($lat) ) * ".
						"cos( radians( Latitude ) ) * cos( radians( Longitude ) - radians($lng) ) ".	
						"+ sin( radians($lat) ) * sin( radians( Latitude ) ) ) ) AS distance ". 
						"FROM hotspots HAVING distance < $range ORDER BY distance;");
					 $result->execute();
				}
				catch (PDOException $e) {
					echo $e->getMessage();
				}
			} else { // suburb search 
				echo "<script type='text/javascript' src='Searchmapsnogeo.js'></script>";
				$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$suburb = $_GET['suburb'];				
				try	{
					$result = $pdo->prepare('SELECT HotspotID, HotspotName, Address, Suburb '.
					 'FROM hotspots '.
					 'WHERE Suburb LIKE :suburb  ');
					 $result->bindValue(':suburb', "%$suburb%");
					 $result->execute();
				}
				catch (PDOException $e) {
					echo $e->getMessage();
				}
			}

			if ($result->rowCount() == 0){ //if no rows found
				echo "<h2>no results</h2>";
				echo "<style> #mapResults { display: none; } </style>";
			} else { // if rows found
			include 'mapData.php'; //include GetMapData function

			$maps = array();
			echo '<table id="resultstable" border="1">';
			echo '<th>Name</th>';
			echo '<th>Address</th>';
			echo '<th>Suburb</th>';
			echo '<th>Rating</th>';
			echo '<th>Details</th>';
			foreach ($result as $hotspot) { //insert table lines
				$maps[count($maps)] = $hotspot['HotspotID'];
				echo '<tr>';
				echo '<td>',$hotspot['HotspotName'],'</td>';
				echo '<td>',$hotspot['Address'],'</td>';
				echo '<td>',$hotspot['Suburb'],'</td>';
				try	{ // code to calc average rating
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
				$data = GetMapData($hotspotid); //get location data

				echo "<script> GetResponse($data); </script>"; //pass location data to map scripts
			}
			echo '</table>';

		}
		?>

		<br><br>
		<p>To do another search <a href="search.php">click here</a>. <!-- link to search page -->
	</div>
	<!-- Footer -->
	<?php include 'footer.php'; ?>
</body>
</html>