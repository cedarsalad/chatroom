<?php 
if(isset($_COOKIE['message'])){
	?>

	<script type="text/javascript">
		alert($.cookie('message'));
		$.removeCookie('message');
	</script>

	<?php
}
if(!isset($_SESSION['user'])){
	?>
	<script type="text/javascript">
		$("#msgBox").attr('disabled', 'disabled');
		$("#msgBtn").attr('disabled', 'disabled');

	</script>
	<?php 
}

?>
