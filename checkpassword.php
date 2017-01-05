<?php  
	function checkPassword($username, $password){
		$pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=brisfi', 'brisfi_user', 'test1234');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try	{
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
				
		if ($count > 0){
			return true;
		} else {
			return false;
		}
	}
 ?>