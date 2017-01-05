<html> <!--login form-->
	<form name="login" action="login.php" method="post" onsubmit="return validateLog()">
			<!--Fieldset-->
			<fieldset id ="loginfieldset">
			<legend>Login</legend>
			
			<!--Username-->
			Username <br>
			<input type="text" name="Username" onkeypress="hideUsernameError()"> 
			<br> <br>
			<!--Password w/ Confirmation-->
			Password <br>
			<input type="password" name="password" onkeypress="hidePasswordError()"> 
			<br> <br>
			<input type="submit" name="login" value="Send"> <?php include 'genForm.php';
			createErrorSpan("username", $errors); ?>
			</fieldset>
		</form>
</html>