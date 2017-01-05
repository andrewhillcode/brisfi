<?php
  $servername = "mysql.ahtomsk.com";
  $database = "qut_piedpiper";
  $username = "piedpiperuser";
  $password = "password";

  $pdo = new PDO('mysql:host=mysql.ahtomsk.com;dbname=qut_piedpiper', 'piedpiperuser', 'password');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  try {
    $result = $pdo->query('SELECT * FROM user_information');
  }
  catch (PDOException $e) {
    echo $e->getMessage();
  }

  echo '<p>Hello</p>';
  echo '<p>', $result['email'], '</p>';
?>
