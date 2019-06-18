<?php session_start();?>
<?php 
$pageTitle = 'Log In';
include_once('inc/header.php'); ?>
  <style>
	  body {
  font-family: Arial, Helvetica, sans-serif;
  background: url(./img/1porsche2.jpg)no-repeat center center fixed;
  background-size: cover;
  margin: 0;
  padding: 0;
}
  </style>

<?php 

require_once('inc/nav.php');
require_once('db/mysqli_connect.php');
$db = db_connection();    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = hash('sha512',$_POST['password']);

    
  $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
// echo $sql;
  $result = $db->query($sql);
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['userId'] = $row['userId'];
    $_SESSION['loggedin'] = 1;
    $_SESSION['email'] = $email;
    $_SESSION['firstName'] = $row['firstName'];

    header('location: index1.php');
   
  } else {
    echo '<p>Please Log in or Register</p>';
  }
}
?>
<div class="modal-dialog text-center">
  	<div class="col-sm-8 main-section">
		<div class="modal-content">
		<div class="col-12 form-input">
      	<form action="login1.php" method="POST">
			<div class="form-group my-2 my-lg-0">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} ?>">
			 </div>
			 <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php if(isset($_POST["password"])){echo $_POST["password"];} ?>">
          </div>
          <button type="submit" class="btn btn-primary btn-lg">Submit</button>
          <a class="nav-link register" href="register1.php">Register Here</a>
        </form>
    	</div>
  	</div>
</div>

  <!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
