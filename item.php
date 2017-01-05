<?php session_start();
	$hotspotID = $_GET['hotspotid'];

	if (isset($_POST['submit'])){
			$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			try	{
				 $query = $pdo->prepare("INSERT INTO reviews (username, hotspotID, review, rating) ".
										"VALUES (:username, $hotspotID, :review, :rating)");
						$query->bindValue(':username', $_SESSION['user']);
						$query->bindValue(':review', $_POST['review']);
						$query->bindValue(':rating', $_POST['rating']);
						$query->execute();
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}
			
			
			header("Location: http://{$_SERVER['HTTP_HOST']}/brisfi/item.php?hotspotid=$hotspotID");
			exit();
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
	<meta charset="UTF-8"/>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaMcZ930HoHAPsFTVStTdnLFc4JvI5Bzk">
    </script>
	<!--Javascript-->
	<script type="text/javascript" src="maps.js"></script>
	<script type="text/javascript" src="validation.js"></script>
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

	<?php 
	$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$hotspotID = $_GET['hotspotid']; 
	include 'mapData.php'; //include GetMapData()
	$data = GetMapData($hotspotID);
	echo "<script> GetResponse($data); </script>"; //pass location to map scripts

	try	{
		$result = $pdo->query("SELECT HotspotID, HotspotName, Address, Suburb, Latitude, Longitude ".
				 "FROM hotspots ".
				 "WHERE HotspotID = $hotspotID");
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}

		try	{
			$ratingavg = $pdo->query("SELECT AVG(rating) AS avgrating FROM reviews WHERE HotspotID = $hotspotID");
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}

		foreach ($result as $hotspot) {
			}
		foreach ($ratingavg as $rating) {
			}
			


		/* Header */
		echo '<h1>',$hotspot['HotspotName'],'</h1>';
		/* Map */
		echo "<div id='map'>";
		echo "</div>";
		echo "<h2>Details</h2>";
		echo "<table>";
			echo "<tr>";
				echo "<th>Address</th>";
			echo "<td>",$hotspot['Address'],"</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<th>Suburb</th>";
				echo "<td>",$hotspot['Suburb'],"</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<th class='item'>Average Rating</th>";
				if ($rating['avgrating'] == null) {
					echo "<td>no ratings</td>";
				} else {
					echo "<td class='item'>",number_format((float)$rating['avgrating'], 1, '.', ''),"</td>";
				}
			echo "</tr>";
		echo "</table>";

?>
		<br>
		<h2>Reviews</h2>
		<?php

			$hotspotID = (int) $_GET['hotspotid'];
			$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try	{
				$result = $pdo->prepare("SELECT username, review, rating ".
				 "FROM reviews ".
				 "WHERE hotspotID = $hotspotID");

				$result->execute();
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}
				
			$count = $result->rowCount();
				
			if ($count > 0){	
				echo '<table border="1">';
				echo '<th>User</th>';
				echo '<th>Review</th>';
				echo '<th>Rating</th>';
				foreach ($result as $review) {
					echo '<tr>';
					echo '<td>',$review['username'],'</td>';
					echo '<td>',$review['review'],'</td>';
					echo '<td>',$review['rating'],'</td>';
					echo '</tr>';
				}
				echo '</table>';
			} else {
				echo "<p>Nobody has reviewed this hotspot yet. Be the first to leave a review!</p>";
			}
		?>


		
		<br>
		<p><i>Leave a review</i></p>
		<div id="review">
		<?php if (isset($_SESSION['user'])){
			?>
			  		<form name="review" id="reviewform" method="post" onsubmit="return validateReview()" <?php echo 'action="item.php?hotspotid='.$hotspotID. '"' ?> >
						<textarea class="review" id="review" name="review" width="100%"></textarea>
						<br>
						<select name="rating" id="rating">
							<option value="">Rating</option>
							<option value="5">5 (highest)</option>
							<option value="4">4</option>
							<option value="3">3</option>
							<option value="2">2</option>
							<option value="1">1 (lowest)</option>
						</select>
						<input type="submit" name="submit" value="Send">
					</form>
					<?php
			  } else {
			  	echo '<a href="login.php">You must be logged in to leave a review.</a>';
		} ?>
		</div>


	</div>
	<!-- Footer -->
	<?php include 'footer.php'; ?>
</body>
</html>