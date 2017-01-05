<?php
	//creates text entry fields. Does both email and regular text based on type variable.
	function createInput($errors, $type, $name)
	{
		$existing = GetExisting($name); //gets existing values from resubmission 
		$error = GetErrors($name, $errors); //gets errors for the field 
		echo '<input type="',$type,'" name="',$name,'" value="',$existing,'"/>'; //outputs the input html
		createErrorSpan($name, $errors); //creates error span
		echo '<br><br>';
	}
	
	//creates password entry field for registration. 
	function createPassword($errors)
	{
		echo 'Password <br>'; //field label 
		echo '<input type="password" name="password">'; //first password field
		echo '<br><br>';
		echo '<input type="password" name="userpwcon">  ';//confirmation password feild
		createErrorSpan("password", $errors); //error span
		echo '<br><br>';
		
	}
	
	//creates the error span for a field an outputs relivant errors
	function createErrorSpan($name, $errors)
	{
		$error = GetErrors($name, $errors); //grabs errors
		echo '<span id="',$name,'" style="color:red;">',$error,'</span>'; //outputs span
	}
	
	//create the date of birth entry fields
	function createDate($errors)
	{
		//arrays to hold the day, month and year values. Month has 2 arrays, for Written names and number indexs of each month
		$days = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
		$months = array('January','February','March','April','May','June','July','August','September','October','November','December');
		$monthNums = array(1,2,3,4,5,6,7,8,9,10,11,12);
		$years = array(2014,2013,2012,2011,2010,
				2009,2008,2007,2006,2005,2004,2003,2002,2001,2000,
				1999,1998,1997,1996,1995,1994,1993,1992,1991,1990,
				1989,1988,1987,1986,1985,1984,1983,1982,1981,1980,
				1979,1978,1977,1976,1975,1974,1973,1972,1971,1970,
				1969,1968,1967,1966,1965,1964,1963,1962,1961,1960,
				1959,1958,1957,1956,1955,1954,1953,1952,1951,1950,
				1949,1948,1947,1946,1945,1944,1943,1942,1941,1940,
				1939,1938,1937,1936,1935,1934,1933,1932,1931,1930,
				1929,1928,1927,1926,1925,1924,1923,1922,1921,1920);
		echo 'Date of Birth: <br>'; //field label
		createSelect('date',$days, $days); //date drop down
		echo '  ';
		createSelect('month',$months, $monthNums); //month drop down
		echo '  ';
		createSelect('year',$years, $years); //year drop down
		echo '  ';
		createErrorSpan('date',$errors); //error span
	}
	
	//creates all the select boxes based on input values
	function createSelect($name, $names, $values)
	{
		echo '<select name="',$name,'">'; //select tag
		echo '<option value="-">',$name,'</option>'; //inital blank option
		for ($count = 0; $count < count($names) ; ++$count) //loops over each option
		{
			if (GetExisting($name) == $values[$count]) //sets value to last entered value if any
				echo '<option value="',$values[$count],'" selected="selected">',$names[$count],'</option>';
			else //otherwise just enters the option
				echo '<option value="',$values[$count],'">',$names[$count],'</option>';
		}
		echo '</select>';
	}

	//grabs errors by field name
	function GetErrors($name, $errors)
	{
		if (isset($errors[$name])) //checks if errors
			return $errors[$name]; //returns relivant errors if any
	}
	
	//gets the last entered value of field incase of form resubmission
	function GetExisting ($name)
	{
		if(isset($_POST[$name])) //grabs any existing value
			return htmlspecialchars($_POST[$name]); //returns formatted value
	}
	
?>