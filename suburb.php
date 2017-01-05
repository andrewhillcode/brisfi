<?php //generates the suburb dropdown menu
	function suburbDropDown()
	{ 
		$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try	{
			$result = $pdo->query('SELECT DISTINCT Suburb FROM hotspots ORDER BY Suburb ASC'); //grabs suburbs in ascending order
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}
		echo '<select name="suburb">'; //select tag
		$prev = "";
		foreach ($result as $hotspots) //loops through each result and create an entry for it
		{
			$input = explode("," , $hotspots['Suburb']);
			if ($input[0] == $prev) { //to avoid the same tag being entered twice
				//do nothing
			} else {
				echo '<option value="',$input[0],'">',$input[0],'</option>';
				$prev = $input[0];
			}
		}
		echo '</select>';
	}
	
	function nameDropDown() //generates the search by name dropdown menu
	{ 
		$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try	{
			$result = $pdo->query('SELECT HotspotName, HotspotID FROM hotspots ORDER BY HotspotName ASC'); //grabs hotspot names in ascending order
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}
		echo '<select name="hotspotid">'; //select tag
		$prev = "";
		foreach ($result as $hotspots)  //creates each option
		{
				echo '<option value="',$hotspots['HotspotID'],'">',$hotspots['HotspotName'],'</option>';
		}
		echo '</select>';
	}
?>