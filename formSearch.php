<html> <!--search form-->
	<form name="search1" action="search.php" method="post"><!--onsubmit="return validateSearch()">-->
		<!--By Name-->
		Name: 
		<input id="name" type="text" name="hotspotname">   
		<!--By Suburb-->
		Suburb: 
		<?php
			include 'suburb.php';
			suburbDropDown();
		?>
		<!--By Rating-->
		Rating:  
		<select name="rating">
			<option value="-">-</option>
			<option value="1">1 or Better</option>
			<option value="2">2 or Better</option>
			<option value="3">3 or Better</option>
			<option value="4">4 or Better</option>
			<option value="5">5</option>
		</select>  
		<input type="submit" value="Send"> <br>
		<span id="hotspotname" style="color:red;"><?php $errors ?></span>
	</form>
</html>