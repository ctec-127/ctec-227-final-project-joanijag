 <?php session_start(); ?>
 <?php 
//require_once('db/mysqli_connect.php');
require_once('inc/loginNav.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Login</title>
</head>
<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = new mysqli('localhost','root','','gearhead');
  if ($db->connect_error) {
    $error = $db->connect_error;
    echo $error;
  }
  $db->set_charset('utf8');
      

  $email = $_POST['email'];
  $password = hash('sha512',$_POST['password']);

  $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
  //echo $sql;

  $result = $db->query($sql);
  if ($result->num_rows == 1) {

   $_SESSION['loggedin'] = 1;
   $_SESSION['email'] = $email;

   $row = $result->fetch_assoc();
   $_SESSION['firstName'] = $row['firstName'];

   header('location: index.php');
   
  } else {
    echo '<p>Please try again or go away</p>';
  }
}
?>
  <div class="container">
    <h1>Please login</h1>
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enteremail">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="nav-link" href="register.php">Register</a>
    </form>
  </div>

  <!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
