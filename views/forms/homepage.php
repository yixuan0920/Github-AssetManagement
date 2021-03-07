<?php
    session_start();
    $title = "Homepage";
    function get_content(){


?>

<body>
      <nav class="navbar navbar-expand-lg navbar-dark mx-auto position-absolute w-100" id="navbarSupportedContent123">
        <div class="container1 mx-md-auto">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ">
              <li class="nav-item"><a class="nav-link" href="/views/forms/homepage.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="../partials/user_edit.php">Profile</a></li>

              <?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin) :?>
              <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
            <?php endif; ?>
            </ul>
            <ul class="navbar-nav d-none d-lg-block px-4">
              <li class="nav-item m-0">
                <a class="navbar-brand m-0" href="/views/forms/homepage.php"><div class="logo position-relative"><img src="../../assets/img/logo1.png" class="position-absolute logo1" alt="..." width="100%"></div></a>
              </li>
            </ul>
            <ul class="navbar-nav mr-auto">
              <?php if(isset($_SESSION['user_details']) && !$_SESSION['user_details']->isAdmin) :?>
              <li class="nav-item"><a class="nav-link" href="booking.php">Booking </a></li>
            <?php endif;?>
                <?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin) :?>
              <li class="nav-item"><a class="nav-link" href="/views/partials/products.php">Upload</a></li>
              <li class="nav-item"><a class="nav-link" href="adminuser.php">View User</a></li>
            <?php endif;?>
              <li class="nav-item"><a class="nav-link" href="../../controllers/process/process_logout.php">Log Out</a></li>
            </ul>
          </div>
        </div>
      </nav>

    <header>
    <div class="text-center" >
      <div class="owl-carousel owl-theme hero-slider owl-nav-custom ">
        <div class="position-relative">
        <div class="hero-slide bg-cover py-5 with-border-image d-flex align-items-center pt-0"   >
          <div class="container2 text-white py-5 my-5 index-forward">
            <div class="row w-100">
              <div class="col-lg-12 w-100">
              <h1 class="text-uppercase text-xl text-dark">McK & Company</h1>
                <p class="lead">Planning your work is imperative to a smooth workflow</p><a class="btn btn-primary px-4" href="homepage.php">Read More</a>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
    </header>

    <div class="container-fluid px-5 box">
      <div class="row ">
          <div class="table col-lg-4 col-md-6 col-12 text-center">
            <div class="box1">
            <a class="nav-link" href="/views/forms/carpark.php">
            <i class="fa fa-car fa-3x" aria-hidden="true"></i>
            <h1>Carpark</h1>
            <p>Never need to search for parking anymore</p>
            </a>
            </div>
          </div>
          <div class="table col-lg-4 col-md-6 col-12 text-center">
          <div class="box1">
            <a class="nav-link" href="/views/forms/library.php">
          <i class="fa fa-book fa-3x " aria-hidden="true"></i>
          <h1>Library</h1>
          <p>Where you can acknowledge your skills here </p>
          </a>
          </div>
          </div>
          <div class="table col-lg-4 col-md-6 col-12 text-center">
          <div class="box1">
            <a class="nav-link" href="/views/forms/officeAssets.php">
          <i class="fa fa-university fa-3x" aria-hidden="true"></i>
          <h1>Assets</h1>
          <p> Where you can borrow assets easily from the company </p>
          </a>
          </div>
          </div>
          <div class="table col-lg-6 col-md-6 col-12 text-center">
          <div class="box1">
            <a class="nav-link" href="/views/forms/meetingroom.php">
          <i class="fa fa-id-badge fa-3x" aria-hidden="true"></i>
          <h1>Meeting Room</h1>
          <p> Where you book for a Meeting Room easily  </p>
          </a>
          </div>
          </div>
          <div class="table col-lg-6 col-md-6 col-12 text-center">
          <div class="box1">
            <a class="nav-link" href="/views/forms/gymroom.php">
            <i class="fa fa-child fa-3x" aria-hidden="true"></i>
          <h1>Gym Room</h1>
          <p> Where you get fit and a healthy lifestyle </p>
          </a>
          </div>
          </div>
        </div>
    </div>


<?php
    }
    require_once '../partials/layout.php';
?>