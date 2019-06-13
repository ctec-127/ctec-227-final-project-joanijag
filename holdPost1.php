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
			background: url(./img/hot-car.jpg)no-repeat center center fixed;
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
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require_once('db/mysqli_connect.php');
		$db = db_connection();

		$result = $db->query($sql);

		$user = $_SESSION['userId'];
		$post = $_POST['postId'];
		$post = $_POST['categoryId'];
		$title = $_POST['titleId'];
		$content = $_POST['contentId'];
		$date = $_POST['contentId'];
		
		$sql = "INSERT INTO post (userId,postId,categoryId,titleId,contentId,contentId)
					VALUES('$user','$post'.'$post','$title','$content','$date')";

		$result = $db->query($sql);

		if(!$db->error){
			header("location: index1.php");
		} else {
			return false;
		}
	
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
}
							?>
						</select><br><br>
					<div class="form-group">
						<label for="title" class="post">Blog Titile</label><br>
						<input type="text" class="title" name="title" id="title"><br><br>
					<div class="form-group">
						<label for="blogText" class="post">Blog Description</label><br>
						<textarea class="blogText" rows="5" name="blogText" id="blogText" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="upload" class="post">Upload Image</label><br>
						<input type="file" class="upload" name="upload" id="upload">
					</div>
						<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		<div>
	</div>
</div><!--"conatiner"-->

         



