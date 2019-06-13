<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css" >
  <title>Home</title>
  <style>
  body {
  font-family: Arial, Helvetica, sans-serif;
  background: url(./img/1bmw85.jpg)no-repeat center center fixed;
  opacity: 5;
  background-size: cover;
  margin: 0;
  padding: 0;
}
.blog-display{
  background: url(./img/1background25.jpg)no-repeat center center fixed; 
   border: solid #696A6E;
  border-width: 2px 2px 2px 2px; 
} 
</style>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg nav-transparent" >
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

  $collapseContent = 0;
            

  $sql = "SELECT * FROM post";      
  $result = $db->query($sql);   

  while ($row = $result->fetch_assoc()) {
?>  
<!-- <div class="wrapper"> -->
<div class="container">
<!-- <div class="d-flex flex-row justify-content-center"> -->
  <div class="row justify-content-md-center mt-4">
    <div class="col-12">       
      <div class="blog-display p-3 mt-0 rounded">
      <!-- <div class="shadow-lg p-3 mb-5 mt-0 bg-white rounded"> -->
      <?php
      $id =  $row['postId'];

      $sql = "SELECT post.title,post.date,post.content,post.categoryId,user.firstName,user.lastName
              FROM post
              JOIN user
              ON post.userId = user.userId
              WHERE post.postId = $id"; 
              
              $post = $db->query($sql);
              while ($postCategory = $post->fetch_assoc()) {
                $postTitle = $postCategory['title'];
                $postDate = $postCategory['date'];
                $postContent = $postCategory['content'];
                $postCategoryId = $postCategory['categoryId'];
                $postFirst = $postCategory['firstName'];
                $postLast = $postCategory['lastName'];
              }

      ?>
      
        <div class="row justify-content-md-center ">
            <div class="col-12 text-center" ><h1><?=$postTitle;?></h1></div>
        </div><!--end row-->
        <div class="row ">
            <div class="col-3" class="postName ">
                <!-- add user image here -->
                <!-- <img src="img/brain.jpg" alt="silhouette of head with gears" class=" ml-2" height="120" > -->
                <h2><?=$postFirst . ' ' . $postLast;?></h2>
            </div>
        </div><!--end row-->
        <div class="row">
            <div class="col-12 " class="postCategory">
              <div class="postCategory"><?=$postTitle;?><?=$postDate;?></div>
            </div>
            <div class="col-6 " class="postImage">
              <img class="card-img" src="img/1porsche.jpg" alt="silhouette of head with gears">
            </div>
            <div class="col-6 " class="postImage">
              <img class="card-img" src="img/1dodge.jpg" alt="silhouette of head with gears">
            </div>
            <div class="mt-5 rounded">

            <?php 
            $collapse = '#collapseContent' . $collapseContent;
            $collapse2 = 'collapseContent' . $collapseContent;
            ?>  
            <p><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="<?=$collapse;?>" aria-expanded="true" aria-controls="<?=$collapse2;?>"> Read more </button> </p> <div class="collapse hide" id="<?=$collapse2;?>" aria-expanded="true" style=""> <div class="card card-block blog-content"> <?=$postContent;?></div> </div> <script>$(document).ready(function(){$("<?=$collapse;?>").collapse()});</script>

            <?php 
            $collapseContent += 1;
            ?>  
              <!-- <p class="blog-content m-2"></p> -->
            </div>
        </div><!--end row-->
      </div><!-- class="shadow-lg p-3 mb-5 mt-0 bg-white rounded" -->        
    </div><!-- class="col-12" -->        
  </div><!-- class="row justify-content-md-center mt-4">-->
         
</div><!-- class="container" -->
   
  <?php 
  }    
   
?>
<div><h1>Hello <?= isset($_SESSION['firstName']) ? $_SESSION['firstName'] : 'New User!' ?></h1></div>
  <!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>