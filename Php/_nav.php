<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    .navbar {
      background-color: #343a40;
      /* Dark background color */
      padding: 10px 20px;
      /* Padding around the navbar */
    }

    .navbar-brand {
      color: #fff;
      /* White text color for the brand */
      font-size: 24px;
      /* Adjust the font size */
    }

    .navbar-nav .nav-link {
      color: #fff;
      /* White text color for the links */
      margin-right: 10px;
      /* Adjust the spacing between the links */
    }

    .navbar-nav .nav-link:hover {
      color: #ccc;
      /* Color for the links on hover */
    }

    .form-inline .form-control {
      width: 200px;
      /* Adjust the width of the search input */
    }

    /* Media query for responsiveness */
    @media (max-width: 992px) {
      .navbar-nav .nav-link {
        margin-right: 0;
        /* Remove margin for links on smaller screens */
      }

      .form-inline .form-control {
        width: 100%;
        /* Make search input full-width on smaller screens */
      }
    }
  </style>
</head>

<body>

  <?php

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
  }
  else
  {
    $loggedin=false;
  }

  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/loginsystem">iSecure</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>';

      if(!$loggedin)
      {
      echo '<li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Signup</a>
      </li>';
      }
      if($loggedin)
      {
      echo '<li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>';
    }

     echo '<li class="nav-item">
        <a class="nav-link" href="aboutus.html">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="help.html">Help</a>
      </li> ';
       
      
    echo '</ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> ';

  ?>


</body>

</html>