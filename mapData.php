<?php
function GetMapData($hotspotid) //grabs and returns the required data for maps to function
{
	$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	try	{
		$result = $pdo->query("SELECT HotspotName, Latitude, Longitude ". 
				 "FROM hotspots ".
				 "WHERE HotspotID = $hotspotid"); //grabs latitide and longitude of the hotspot
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	foreach ($result as $hotspot) {
			}
//W	header("Access-Control-Allow-Origin: *");
	$mapdata = array($hotspot['HotspotName'],$hotspot['Latitude'],$hotspot['Longitude'],$hotspotid);
	return json_encode($mapdata); //returns JSON data for javascript
}
?>