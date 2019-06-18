<?php session_start();?>

<?php 
$pageTitle = 'Gearhead';
include_once('inc/header.php'); ?>
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
<?php 
  include_once('inc/nav.php');
  require_once('db/mysqli_connect.php');
  $db = db_connection();

  $collapseContent = 0;

  $sql = "SELECT * FROM post";      
  $result = $db->query($sql);   
  while ($row = $result->fetch_assoc()) {
?>  

<div class="container">
  <div class="row justify-content-md-center  mt-4">
    <div class="col-12">       
      <div class="blog-display p-3 mt-0 rounded mb-5">
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
        <div class="row justify-content-md-center">
            <div class="col-12 text-center" ><h1><?=$postTitle;?></h1></div>
        </div><!--end row-->
        <div class="row ">
            <div class="col-3" class="postName">
                
                <h2><?=$postFirst . ' ' . $postLast;?></h2>
            </div>
        </div><!--end row-->
        <div class="row">
            <div class="col-12 " class="postCategory">
              <div class="postCategory"><?=$postTitle;?></div>
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
            
            <p><button class="btn btn-primary ml-2 " type="button" data-toggle="collapse" data-target="<?=$collapse;?>" aria-expanded="true" aria-controls="<?=$collapse2;?>"> Read more </button></p>  
            <div class="collapse hide ml-2 mr-2" id="<?=$collapse2;?>" aria-expanded="true" style=""> 
              <div class="card card-block blog-content bg-secondary"> <?=$postContent;?></div> 
            </div> 
            <script>$(document).ready(function(){$("<?=$collapse;?>").collapse()});</script>

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


  <!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>