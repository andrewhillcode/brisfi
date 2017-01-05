<?php
function GetMapData($id)
{
	$mapData = array();
	
	foreach ($id as $key)
	{
		$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try	{
			$map = $pdo->prepare("SELECT HotspotName, Latitude, Longitude ".
					"FROM hotspots ".
					"WHERE HotspotID =:hotspotid ");
			$map->bindValue(':hotspotid', $key);
			$map->execute();
			}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
		foreach ($map as $spot)
		{
			$mapData[count($mapData)] = [$spot['HotspotName'],$spot['Latitude'],$spot['Longitude']];
		}
	}
	header("Access-Control-Allow-Origin: *");
	return json_encode(["King Edward Park (Jacob's Ladder)",'-27.46589','153.02406']);
	//
}
?>