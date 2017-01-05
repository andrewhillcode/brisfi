<?php
//Validates password from registration field 
function validatePassword(&$errors, $field_list, $password_field, $confirm_field)
{	//checks if fields are empty
	if (!isset($field_list[$password_field])|| empty($field_list[$password_field])|| !isset($field_list[$confirm_field])|| empty($field_list[$confirm_field]))
		$errors[$password_field] = ' Password Required';
	else if (!($field_list[$password_field] == $field_list[$confirm_field])) //checks if both passwords match
		$errors[$password_field] = " Password don't match";
}

//validates email entry from registration field 
function validateEmail(&$errors, $field_list, $field_name, $enteredEmail)
{
	$EmailPat = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/'; //email regex pattern 
	if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) //checks if fields empty
		$errors[$field_name] = ' Required';
	else if (!preg_match($EmailPat, $field_list[$field_name])) //checks if the entered email matchs the regex format
		$errors[$field_name] = ' Invalid';
	else { //checks if the email has been used by another user
		$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try	{
			$query = $pdo->prepare("SELECT * ".
								"FROM users ".
								"WHERE email = '$enteredEmail'");
			$query->execute();
		}
		catch (PDOException $e) 
		{
			echo $e->getMessage();
		}

		$rowCount = $query->rowCount();

		if($rowCount > 0){
		$errors[$field_name] = ' Email already in use';
		}
	}
}
//validates entered username for the registration form
function validateUsername(&$errors, $field_list, $field_name, $enteredUser)
{
	$UsernamePat = '/^[a-zA-Z0-9]+$/'; //username regex
	if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) //check if empty
		$errors[$field_name] = ' Required';
	else if (!preg_match($UsernamePat, $field_list[$field_name])) //check if entry is valid
		$errors[$field_name] = ' Invalid';
	else { //checks if username has been used
		$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try	{
			$query = $pdo->prepare("SELECT * ".
								"FROM users ".
								"WHERE username = '$enteredUser'");
			$query->execute();
		}
		catch (PDOException $e) 
		{
			echo $e->getMessage();
		}

		$rowCount = $query->rowCount();

		if($rowCount > 0){
		$errors[$field_name] = ' Username already in use';
		}
	}
}
//validates the date of birth entry from registration 
function validateDate(&$errors, $field_list, $field_day, $field_month, $field_year)
{
	//check if a field has been missed
	//$errors[$field_day] = "$field_list[$field_day] $field_list[$field_month] $field_list[$field_year]";
	if ((!isset($field_list[$field_day])|| empty($field_list[$field_day])) || (!isset($field_list[$field_month])|| empty($field_list[$field_month])) || (!isset($field_list[$field_year])|| empty($field_list[$field_year])))
		$errors[$field_day] = ' Required';

	//check February dates
	else if (($field_list[$field_month] == 2) && ($field_list[$field_day] == 29) && (date("L", mktime(0, 0, 0, 2, 29, $field_list[$field_year])) == 0))
			$errors[$field_day] = ' Invalid Date: no 29th in '.$field_list[$field_year];	
	else if (($field_list[$field_month] == 2) && ($field_list[$field_day] >= 30)) 
			$errors[$field_day] = ' Invalid Date: day not in February';
	//check 30 Day months i.e September, April, etc
	else if (($field_list[$field_day] == 31) && (($field_list[$field_month] == 9) || ($field_list[$field_month] == 4) || ($field_list[$field_month] == 6) || ($field_list[$field_month] == 11)))
		$errors[$field_day] = ' Invalid Date: no 31st in'.$field_list[$field_year];
}


//validates postcode entry for registration
function validatePostcode(&$errors, $field_list, $field_name)
{
	$PostcodePat = '/^[0-9]{4}$/'; //postcode regex
	if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) //checks if empty
		$errors[$field_name] = ' Required';
	else if (!preg_match($PostcodePat, $field_list[$field_name])) //checks if matches the given regex
		$errors[$field_name] = ' Invalid';
}

//full validation of the registration form
function validateForm()
{
	$errors = array(); 
	if (isset($_POST['username'])) //username check
	{
		validateUsername($errors, $_POST, 'username', $_POST['username']);
	}
	if (isset($_POST['email'])) //email check
	{
		validateEmail($errors, $_POST, 'email', $_POST['email']);
	}
	if (isset($_POST['password'])) //password check
	{
		validatePassword($errors, $_POST, 'password', 'userpwcon');
	}
	if (isset($_POST['postcode'])) //postcode check
	{
		validatePostcode($errors, $_POST, 'postcode');
	}
	if (isset($_POST['date'])) //date of birth check
	{
		validateDate($errors, $_POST, 'date', 'month', 'year');
	}
	return $errors; //return any errors
}

//validates login 
function validateLogin($username, $password){
		$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try	{ //grabs the entered data from the database
			 $query = $pdo->prepare("SELECT * ".
								"FROM users ".
								"WHERE username = :username and password = SHA2(CONCAT(:password, salt), 0)");
					$query->bindValue(':username', $username);
					$query->bindValue(':password', $password);
					$query->execute();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	
		$count = $query->rowCount();
		$errors = array();			
			if ($count == 0){ //checks if it exists
				$errors[$username] = 'Invalid login';
			}
		return $errors; //returns any errors
	}

?>