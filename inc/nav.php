<?php 
if(isset($_SESSION['loggedin'])) {
  $logtext = '<a class="nav-link" href="logout.php">Logout</a>';
} else {
  $logtext = '<a class="nav-link " href="login1.php">Login</a>';
}

if(isset($_SESSION['loggedin'])) {
  $post = '<a class="nav-link" href="post1.php">Post</a>';
} else {
  $post = '';
}

?>
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
          <!-- <li class="nav-item">
            <a class="nav-link" href="post1.php">Post</a>
          </li> -->
          <li class="nav-item">
          <?php echo $post ?>
          </li>
          <li class="nav-item">
          <?php echo $logtext ?>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </header>
