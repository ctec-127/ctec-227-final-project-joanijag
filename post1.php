<?php session_start();?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<title>Post</title>
		<style>
			body {
			font-family: Arial, Helvetica, sans-serif;
			background: url(./img/1hot-car.jpg)no-repeat center center fixed;
			background-size: cover;
			margin: 0;
			padding: 0;
			}
		</style>
	</head>   
<body>
<header>
<!-- <nav class="navbar navbar-expand-lg shadow-lg bg-dark"> -->
<nav class="navbar navbar-expand-lg nav-transparent">
  <a class="navbar-brand" href="index1.php">Gearhead</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index1.php">Blog <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="post1.php">Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="login1.php">Login</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</header>
<?php 
require_once('db/mysqli_connect.php');
$db = db_connection();

$success = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	// // Required field names
	// $required = array('post');

	// // Loop over field names, make sure each one exists and is not empty
	// $error = false;
	// foreach($required as $field) {
	// 	if (empty($_POST[$field])) {
	// 		$error = true;
	// 	}
	// }

	// if ($error) {
	// 	echo "All fields are required.";
	// } else {
		$user = $db->real_escape_string($_SESSION['userId']);
		// $post = $db->real_escape_string($_POST['postId']);
		$category = $db->real_escape_string($_POST['categoryId']);
		$title = $db->real_escape_string($_POST['title']);
		$content = $db->real_escape_string($_POST['content']);
		//$date = $db->real_escape_string($_POST['dateId']);
		
		$sql = "INSERT INTO post (userId,categoryId,title,content)
					VALUES('$user','$category','$title','$content')";
		// $sql = "INSERT INTO post (userId,postId,categoryId,titleId,contentId,dateId)
		// 			VALUES('$user','$post','$category','$title','$content','$date')";

		$result = $db->query($sql);

		if(!$db->error){
			header("location: index1.php");
		} else {
			return false;
		}

		if($db->error){
			echo $db->error;
		}
}


// if (!$success) { 
	?>
<div class="conatiner">
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
					<label for="title" class="post">Blog Titile</label><br>
					<input type="text" class="title" name="title" id="title"><br><br>
				<div class="form-group">
					<label for="blogText" class="post">Blog Description</label><br>
					<textarea class="blogText" rows="5" name="content" id="blogText" rows="3"></textarea>
				</div>
				<!-- <div class="form-group">
					<label for="upload" class="post">Upload Image</label><br>
					<input type="file" class="upload" name="upload" id="upload">
				</div> -->
					<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<?php 
		// }
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

         



					