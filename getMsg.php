<?php 

// include("dbConnect.php");

// $query = $db->query("SELECT * FROM `posts`");	

// $posts = $query->fetchAll(PDO::FETCH_ASSOC);

$posts = $db -> getMessages();

$uploadfolder = "images/uploads/";
foreach ($posts as $post){
	$path = $uploadfolder.$post->getAvatar();
	?>
	<div class="msg">
		<img src="<?php echo $path ?>" alt="#avatar">
		<h4><?php echo $post->getUsername() ?></h4>
		<p><?php echo $post->getMessage() ?></p>
		<hr>
	</div>
	<?php
}
?>