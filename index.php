<?php 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Lab 1</title>
	<link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/colorbox.css">

</head>
<body>
	<?php 
	session_start();
	include 'login.php';
	include 'dbConnect.php';
	function __autoload($class){
		require "$class.class.php";
	}

	$db = new DBManager();

	?>
	<div id="msg">
		<h2>Send a Message</h2>
		<form action="procMsg.php" method="post">
			<textarea name="msgBox" id="msgBox" cols="50" rows="10"></textarea>
			<br>
			<div><input type="submit" id="msgBtn" name="mSubmit" value="Send"></div>
		</form>
	</div>
	<div id="board">
		<h2>Messages from Database</h2>
		<div id="inner-board">
			<?php include 'getMsg.php' ?>
		</div>
	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
	<script src="js/jquery.colorbox.js"></script>
	<script src="js/jquery.cookie.js"></script>

	<script>
		$(document).ready(function(){
			$(".modal").colorbox({width:"1200px", height:"500px"});
		});
	</script>


	<script>

		$(function(){
			$('#inner-board').slimScroll({
				height: '500px',
				size: '10px',
				position: 'right',
				color: '#78847A',
				alwaysVisible: false,
				railVisible: false,
				railColor: '#ccc',
				railOpacity: 0.9,
				wheelStep: 10,
				allowPageScroll: false,
				disableFadeOut: false
			});
		});

	</script>

	<?php include "script.php"; ?>
</body>
</html>