<?php 
require_once('inc/nav.inc.php');
require_once('db/mysqli_connect.php');
?>

<div class="container">
  <?php 
  
  

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
  
  // $row['title'];
  // $row['discription'];
  
  $db = db_connection();

  echo "<p><strong>Post table data</strong<p>";
  
  $sql = "SELECT post.title,post.date,post.content,post.categoryId,user.firstName,user.lastName
         FROM post
         JOIN user
         ON post.userId = user.userId
         WHERE post.postId = 1";
         
  db_query($db, $sql);

  echo "<p>Category table data<p>";
  $sql = "SELECT * FROM category";
  db_query($db, $sql);

  echo "<p>User table data<p>";
  $sql = "SELECT * FROM user";
  db_query($db, $sql);


  ?>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>