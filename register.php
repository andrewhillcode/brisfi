<?php	session_start();
	$errors = array();
	if (isset($_POST['register'])){ //post request sent
		include 'validate.php';
		$errors = validateForm(); //validate entry
		$day = $_POST['date']; //set each part of the date of birth to a variable 
		$month = $_POST['month'];
		$year = $_POST['year'];
		
		if (!$errors) { //if no errors
			$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dob = $year . "-" . $month . "-" . $day; //set date of birth to correct format for the database 

			try	{
					$query = $pdo->prepare("INSERT INTO users (username, email, salt, password, postcode, dob) ".
										"VALUES (:username, :email, '4b3403665fea6', SHA2(CONCAT(:password, '4b3403665fea6'), 0), :postcode, :dob)");
					$query->bindValue(':username', $_POST['username']);
					$query->bindValue(':email', $_POST['email']);
					$query->bindValue(':password', $_POST['password']);
					$query->bindValue(':postcode', $_POST['postcode']);
					$query->bindValue(':dob', $dob);
					$query->execute();
				}
			catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
				
			header("Location: http://{$_SERVER['HTTP_HOST']}/brisfi/register_success.php");
			exit();
		}
		else
		{
		}
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
	<script type="text/javascript" src="validation.js"></script>
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
		<h1>Website Registration</h1> 
		<p><b><i>Already have an account?</b></i> <a href="login.php">Click here</a> to login! <!-- link to login page -->
		<?php include 'formRegister.php'; ?>  <!--include register form -->
	</div>
	<!-- Footer -->
	<?php include 'footer.php'; ?>
</body>
</html>