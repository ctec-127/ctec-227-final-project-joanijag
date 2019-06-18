<?php session_start();?>
<?php 
$pageTitle = 'Post';
include_once('inc/header.php'); ?>
		<style>
			body {
			font-family: Arial, Helvetica, sans-serif;
			background: url(./img/1hot-car.jpg)no-repeat center center fixed;
			/* background: grey; */
			background-size: cover;
			margin: 0;
			padding: 0;
			}
		</style>
	</head>   
<body>

<?php 
require_once('inc/nav.php');
require_once('db/mysqli_connect.php');
$db = db_connection();

$success = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// Required field names
	$required = array('title','content');

	// Loop over field names, make sure each one exists and is not empty
	$error = false;
	foreach($required as $field) {
		if (empty($_POST[$field])) {
		
			$error = true;
		}
	}
	if ($error) {
		echo "All fields are required.";
		
	} else {
		$user = $db->real_escape_string($_SESSION['userId']);
		$category = $db->real_escape_string($_POST['category']);
		$title = $db->real_escape_string($_POST['title']);
		$content = $db->real_escape_string($_POST['content']);
		$sql = "INSERT INTO post (userId,categoryId,title,content,date)
					VALUES('$user','$category','$title','$content',now())";
		$result = $db->query($sql);

		if(!$db->error){
			$success = true;
			header("location: index1.php");
		} 
		// else {
		// 	return false;
		// }
	
		// if($db->error){
		// 	echo $db->error;
		// }
  }
}


 if (!$success) { 
	?>
<div class="container">
	<div class="row">
		<div class="col-4"></div>
			<div class="col-4 post-form">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				<div class="form-group">
					<label for="category" class="post">Blog Category</label><br>
					<select class="category" name="category" id="category">
					<?php
						$sql = "SELECT categoryId,category FROM category";      
						$result = $db->query($sql);   
						while ($row = $result->fetch_assoc()) {?>
						<option value=<?php echo '"' . $row['categoryId'] . '"' . ">" . $row['category'] . "</option>";?>>
						<?php  
						 }
						?>
					</select><br><br>
				<div class="form-group">
					<label for="title" class="post">Blog Title</label><br>
					<input type="text" class="title" name="title" id="title"><br><br>
				<div class="form-group">
					<label for="content" class="post">Blog Description</label><br>
					<textarea class="blogText" rows="5" name="content" id="blogText" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="upload" class="post">Upload Image</label><br>
					<input type="file" class="upload" name="upload" id="upload">
				</div>
					<button type="submit" value="Post" id="submit" class="btn btn-primary">Submit</button>
			</form>
			<?php 
		 } //end if
		 ?>
						
		</div>
	<div class="col-4"></div>
</div>
<!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
