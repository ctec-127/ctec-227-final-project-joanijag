<?php  
  require_once('inc/nav.inc.php');
?>  
 
<div class="container">
  <div class="row justify-content-md-center mt-4">
    <div class="col-12">       
      <div class="shadow-lg p-3 mb-5 mt-0 bg-white rounded">
      <div class="row justify-content-md-center">
            <div class="col-12 text-center" ><h1>Blog Title</h1></div>
        </div>
        <div class="row">
            <div class="col-3" class="ideaName">
                <!-- <img src="img/brain.jpg" alt="silhouette of head with gears" class=" ml-2" height="120" > -->
                <h2>Hello <?= isset($_SESSION['firstName']) ? $_SESSION['firstName'] : 'New User!' ?></h2> 
            </div>
        </div>
        <div class="row">
            <div class="col-10" class="ideaCategory"><p class="ideaCategory">Category</p></div>
            <div class="col-2" class="text-right" class="text-monospace" class="ideaDate"><p>Blog Date</p></div>
            <div class="col-10" class="ideaCategory"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste voluptatibus autem alias, quidem eligendi magni quae nisi reprehenderit ducimus, nihil vel molestiae sit. Dolores dicta labore neque dolorem cupiditate hicI Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam nam inventore, atque error quidem voluptatum incidunt corporis! Aliquam consectetur maxime autem officia itaque quo mollitia, unde nam ab laudantium enim? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio tenetur nostrum nihil! Veritatis laboriosam incidunt commodi cum suscipit illum aliquid dignissimos, exercitationem, ipsum corrupti possimus nemo ex consequatur tempore odio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur eveniet natus mollitia laboriosam accusantium perferendis necessitatibus id accusamus quisquam tenetur, fugit officiis, aperiam autem quaerat assumenda facere.</p></div>
        </div>        
      </div>
    </div>          
  </div>
  <?php 
    require_once('inc/nav.inc.php');
    require_once('db/mysqli_connect.php');

  function db_query($db,$sql){
      $result = $db->query($sql);
      $columns = $result->fetch_fields();
      
      echo '<table border=1>';
      echo "<div>";
      foreach ($columns as $name) {
        echo "<th>" . $name->name . "</th>";
      }
      echo "</tr>";
    
      while ($row = $result->fetch_assoc()){
        echo "<div>";
        foreach($row as $value) { 
          echo "<p>" . $value . "</p>";
        }
      }
      echo "</div>";
      echo '</table>';
  }
  
  $db = db_connection();
  ?>
  
  <div class="row justify-content-md-center mt-4">
    <div class="col-12">       
      <div class="shadow-lg p-3 mb-5 mt-0 bg-white rounded">
      <div class="row justify-content-md-center">
            <div class="col-12 text-center" ><h1>Sample Blog</h1></div>
        </div>
        <div class="row">
            <div class="col-3" class="ideaName">
                <!-- <img src="img/brain.jpg" alt="silhouette of head with gears" class=" ml-2" height="120" > -->
                <h2>user Id #1</h2> 
            </div>
        </div>
        <div class="row">
            <div class="col-10" class="ideaCategory"><p class="ideaCategory">Category</p></div>
            <div class="col-2" class="text-right" class="text-monospace" class="ideaDate"><p>Blog Date</p></div>
            <div class="col-10" class="ideaCategory">
              <?php 
              echo "<p>Post Number One<p>";
  
              $sql = "SELECT post.title,post.date,post.content,post.categoryId,user.firstName,user.lastName
                     FROM post
                     JOIN user
                     ON post.userId = user.userId
                     WHERE post.postId = 1";
                     
              db_query($db, $sql);
              ?>
            </div>
        </div>        
      </div>
    </div>          
  </div>
  <div class="row justify-content-md-center mt-4">
    <div class="col-12">       
      <div class="shadow-lg p-3 mb-5 mt-0 bg-white rounded">
      <div class="row justify-content-md-center">
            <div class="col-12 text-center" ><h1>My database tables</h1></div>
        </div>
        <div class="row">
            <div class="col-3" class="ideaName">
                <!-- <img src="img/brain.jpg" alt="silhouette of head with gears" class=" ml-2" height="120" > -->
                <h2>Three Tables</h2> 
            </div>
        </div>
        <div class="row">
            <div class="col-10" class="ideaCategory"><p class="ideaCategory">Category</p></div>
            <div class="col-2" class="text-right" class="text-monospace" class="ideaDate"><p>Blog Date</p></div>
            <div class="col-10" class="ideaCategory">

  <?php 
  
    $db = db_connection();

    echo "<p>Category table data<p>";
    $sql = "SELECT * FROM category";
    db_query($db, $sql);

    echo "<p>User table data<p>";
    $sql = "SELECT * FROM user";
    db_query($db, $sql);

    echo "<p>User post data<p>";
    $sql = "SELECT * FROM post";
    db_query($db, $sql);

  ?>
        </div>        
      </div>
    </div>          
  </div>
</div>

  <!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>