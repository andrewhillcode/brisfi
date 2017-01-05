	<div id = "mobilemenu">
			<div id= "mobile-logo">
				<a href="index.php" class="logo"><img src="brisfi.png" alt="Bris-Fi Logo" height="35" width="90"></a>
			</div>
		</div>
			<label for="show-menu" class="show-menu">MENU</label>
		<input type="checkbox" id="show-menu">
		<div id="menu">
			
		<div id = "buttons">
			<ul>
				  <a href="index.php" class="logo" id="logo"><img src="brisfi.png" alt="Bris-Fi Logo" height="35" width="90"></a>
				  <li class="nav"><a href="index.php" class="nav">Home</a></li>
				  <li class="nav"><a href="search.php" class="nav">Search</a></li>
				  <li class="nav"><a href="archive.php" class="nav">Archive</a></li>
				  <?php 
				  if (isset($_SESSION['admin'])){
					echo '<li class="nav"><a href="admin.php" class="nav">Admin</a></li>';
				  }
				  if (isset($_SESSION['user'])){
					echo '<li class="nav"><a href="logout.php" class="nav">Logout</a></li>';
				  } else {
					echo '<li class="nav"><a href="register.php" class="nav">Register</a></li>';
					echo '<li class="nav"><a href="login.php" class="nav">Login</a></li>';
				  } ?>

			</ul>

			</div>
		</div>