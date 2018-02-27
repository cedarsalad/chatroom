<h1>Mini-Chat</h1>
<div id="login">
	<?php if(!isset($_SESSION['user'])){ ?>
	<form action="procLog.php" method="post">
		<label>Username:</label>
		<input type="text" name='username' id="logUser">
		<br>
		<label>Password:</label>
		<input type="password" name='password' id="logPass">
		<br>
		<input type="submit" name="lSubmit" value="Login">
		<a class="modal" href="register.php">Register</a>
	</form>
	<?php } 
	else{
		$uploadfolder = "images/uploads/";
		$path = $uploadfolder.$_SESSION['user']['avatar'];
		?> 	
		<h4 style="display: inline;">Welcome </h4> 
		<h3 style="display: inline;"><?php echo $_SESSION['user']['username'] ?></h3>
		<br>
		<img id="avatar" width="150" src="<?php echo $path ?>" alt="#avatar">
		<br>
		<div style="text-align: right;"><a href="logout.php">Logout</a></div>
		<?php } ?>
	</div>

