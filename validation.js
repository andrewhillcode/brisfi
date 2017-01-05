function validateReg() { //validates registraion form
	var name = checkUsername("register") //username
	var email = checkEmail(); //email
	var password = checkNewPassword(); //password
	var postcode = checkPostcode(); //postcode
	var dob = checkDob() //date of birth
	if (name == false || email == false || password == false || postcode == false || dob == false) { //checks if all fields are clean
	   return false;
	} else {
		return true;
	}
}

function validateLog() { //validates login
	var name = checkUsername("login"); //username
	var password = checkPassword(); //password
	if (name == false || password == false) { //checks if fields are clean
	document.getElementById("username").innerHTML = " Invalid login"; //sends error message
	   return false;
	} else {
		return true;
	}
}

function checkUsername(form) { //validates user name
	var name = document.forms[form]["username"].value; //grabs value
	if(name == null || name == "") { //checks if empty
        return false;
	}
	return true;
}

function checkEmail(form) { //validates email
	var email = document.forms["register"]["email"].value; //grabs value
    if (email == null || email == "") { //check if empty
        document.getElementById("Email").innerHTML = " No Email Entered"; //return error
        return false;
    } else if (!(/^[A-Za-z0-9]+@[A-Za-z]+\.com/.test(email))) { //check it matches format
		document.getElementById("Email").innerHTML = " Entered Email is Invalid"; //returns error
		return false;
	}
	return true;
}

function checkPassword() { //checks password
	var pass = document.forms["login"]["password"].value; //grabs value
	if(pass == null || pass == "") { //checks if empty
        return false;
	}
	return true;
}

function checkNewPassword() {//checks password for registration form
	var passA = document.forms["register"]["userpw"].value; //grabs values
	var passB = document.forms["register"]["userpwcon"].value;
	if (passA == null || passA == "" || passB == null || passB == "") { //check if null
		document.getElementById("userpw").innerHTML = " One or more passwords not entered"; //return error
        return false;
	} else if (passA != passB){ //checks if both match
		document.getElementById("userpw").innerHTML = " Passwords don't match"; //returns error
        return false;
	}
	return true;
}

function checkPostcode() {//checks date of birth
	var postcode = document.forms["register"]["postcode"].value; //grabs value
	if (!(/^[0-9]{4}$/.test(postcode))) {// checks if it matches the format
		document.getElementById("postcode").innerHTML = " Please enter a 4 digit postcode i.e 4000"; //returns error
		return false;
	}
	return true;
}

function checkDob() { //checks the date birth
	var day = document.forms["register"]["date"].value; //grabs values 
	var mon = document.forms["register"]["month"].value;
	var year = document.forms["register"]["year"].value;
	if ((day == null || day == "-") || (mon == null || mon == "-") || (year == null || year == "-")) {//checks if values are empty
		document.getElementById("date").innerHTML = " No Date of Birth entered";
        return false;
	} else if ((day == 29) && (month == 02) && (checkLeapYear(year) == 1)){ // checks if 29th Feb is in given year
		document.getElementById("date").innerHTML = " No 29th of February in",year;
        return false;
	} else if ((day >= 30) && (month == 02)){ //checks if 30 or 31st was entered for February
		document.getElementById("date").innerHTML = " Date in February";
        return false;
	} else if ((day == 31) && ((month == 04) || (month == 06) || (month == 09) || (month == 11))){ //checks if 31st is in a 30 day month, ie September 
		document.getElementById("date").innerHTML = " No 31st in selected month";
        return false;
	}
	return true;
}

function checkLeapYear(year) { //checks if entered year is a leap year
	var leapYears = [2012,2008,2004,2000,1996,1992,1988,1984,1980,1976,1972,1968,1964,1960,1956,1952,1948,1944,1940,1936,1932,1928,1924,1920]
	for (i = 0; i < leapYears.length; i++) {
		if (year == leapYears[i]); {
			return 1;
		}
	}
	return 0;
}

function validateReview() {
	if (document.forms["reviewform"]["review"].value == "" || document.forms["reviewform"]["rating"].value == ""){
		window.alert("You must provide both a review and rating.");
		return false;
	} else {
		return true;
	}
}

//hides error messages 
function hideEmailError() {
	document.getElementById("emailError").style.visibility = "hidden";
}
function hidePasswordError() {
	document.getElementById("passwordError").style.visibility = "hidden";
}
function hidePostcodeError() {
	document.getElementById("postcodeError").style.visibility = "hidden";
}