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
    <title>Register</title>
</head>
<body>
              <!-- ***code registeration form*** -->
    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # Create a new connection to the database
            $db = new mysqli('localhost','root','','gearhead');

            # If there was an error connecting to the database
            if ($db->connect_error) {
                $error = $db->connect_error;
                echo $error;
            }

            # Set the character encoding of the database connection to UTF-8
            $db->set_charset('utf8');
            //$db = db_connection();

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = hash('sha512',$_POST['password']);

            $sql = "INSERT INTO user (firstName,lastName,email,password) 
                    VALUES('$firstName','$lastName','$email','$password')";
            // echo $sql;
            $result = $db->query($sql);
            
            if (!$result) {
                echo "<h3>There was a problem registering your account. *** I will make this display using javaScript***</h3>";
            } else {
                echo "<h3>You are now ready to go! *** I will make this display using javaScript***</h3>";
            }
        }
    ?>
    <div class="container">
    <div class="row">***I want to add javaScript here to display the result***</div>
      <h1>Register</h1>
      <form action="register.php" method="POST">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp"  name="email" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
        </div>
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" class="form-control" id="lastName"  required name="lastName" placeholder="Last Name">
        </div>
          <button type="submit" value="Register" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>