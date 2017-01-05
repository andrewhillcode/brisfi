<html>	<!-- Register form -->
	<form name="register" method="post" action="register.php" onsubmit="return validateReg()">
		<!--Fieldset-->
		<fieldset id="registerfieldset">
		<legend>Register</legend>
			
		<!---->
		<?php
			include 'genForm.php'; //form generating file 
			//Username
			echo 'Username <br>';
			createInput($errors, "text", 'username'); 
			//Email
			echo 'Email <br>';
			createInput($errors, "email", "email");
			//Password w/ Confirmation
			createPassword($errors);
			//Postcode
			echo 'Postcode <br>';
			createInput($errors, "text", 'postcode');
			//Date of Birth
			createDate($errors);
		?>
		<!--Submit-->
		<br><br>
		<input type="submit" name="register" value="Send"> 
		</fieldset>
	</form>
</html>