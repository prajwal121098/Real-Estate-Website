<?php 
  //include_once('reg-insert-data.php');
  include_once('index/database.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Index-pages</title>
  <link rel="icon" type="logo.png" href="index/img/logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="index/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="index/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="index/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Start your project here-->
  <header id="top">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="height: 65px;">
      <a class="navbar-brand font-weight-normal" href="index.php" style="font-size: 45px; margin-left: 10%"><img src="index/img/logo.png" width="40px" height="40px" class="mr-2">Magic Bricks</a>
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
          <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item">
              <a class="nav-link font-weight-normal h4 yellow-text" href="index.php">Home</a>
            </li> -->
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle font-weight-normal" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Maharashtra</a>
              <div class="dropdown-menu mega-menu z-depth-1  indigo lighten-4" aria-labelledby="navbarDropdownMenuLink2" style="width: 800px; height: 120px;">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">
                          <div class="view zoom">
                              <img src="https://mdbootstrap.com/img/Photos/Others/forest-sm.jpg" class="img-fluid " alt="smaple image">
                              <div class="mask flex-center rgba-blue-light dropdown">
                                <p class="white-text">Amravati</p>
                              </div>
                          </div>
                        </div>
                      </th>
                      <th scope="col">
                        <div class="view zoom">
                            <img src="https://mdbootstrap.com/img/Photos/Others/forest-sm.jpg" class="img-fluid " alt="smaple image">
                            <div class="mask flex-center rgba-blue-light">
                                <p class="white-text">Aurangabad</p>
                            </div>
                        </div>
                      </th>
                      <th scope="col">
                        <div class="view zoom">
                            <img src="https://mdbootstrap.com/img/Photos/Others/forest-sm.jpg" class="img-fluid " alt="smaple image">
                            <div class="mask flex-center rgba-blue-light">
                                <p class="white-text">Konkan</p> 
                            </div>
                        </div>
                      </th>
                      <th scope="col">
                        <div class="view zoom">
                            <img src="https://mdbootstrap.com/img/Photos/Others/forest-sm.jpg" class="img-fluid " alt="smaple image">
                            <div class="mask flex-center rgba-blue-light">
                                <p class="white-text">Nagpur</p>
                            </div>
                        </div>
                      </th>
                      <th scope="col">
                        <div class="view zoom">
                            <img src="https://mdbootstrap.com/img/Photos/Others/forest-sm.jpg" class="img-fluid " alt="smaple image">
                            <div class="mask flex-center rgba-blue-light">
                                <p class="white-text">Nasik</p>
                            </div>
                        </div>
                      </th>
                      <th scope="col">
                        <div class="view zoom">
                            <img src="https://mdbootstrap.com/img/Photos/Others/forest-sm.jpg" class="img-fluid " alt="smaple image">
                            <div class="mask flex-center rgba-blue-light">
                                <p class="white-text">Pune</p>
                            </div>
                        </div>
                      </th>
                    </tr>
                  </thead>
                </table>
              </div>
            </li> -->
          </ul>

          <?php 
            if (isset($_SESSION['user_email'])) {
              ?>
              <div class="mr-4 mt-3">
                <a href="customer.php">
                  <i class="fas fa-2x mr-3 fa-home white-text " title="add property details" onmouseover=""></i>
                </a>
                <i class="far fa-2x fa-user-circle white-text" title="<?php echo $_SESSION['user_firstname'].' '.$_SESSION['user_lastname'];?>"></i><br>
                <!-- <span class="white-text"><?php echo $_SESSION['user_firstname'];?></span> -->
              </div>
              <form action="index/logout.php" method="POST">
                <button type="submit" name="logout" class="float-left mr-1 btn btn1">Logout</button>
              </form>
              <?php
            } else {
              ?>
              <button class="float-left mr-1 btn btn1" onclick="document.getElementById('id01').style.display='block'">Login</button>
              <button class="float-left btn btn1" onclick="document.getElementById('id02').style.display='block'">Register</button>
              <?php
            }
              ?>
          
          <!-- Popup Login Form -->
          <div id="id01" class="popup-modal">
            <!-- Modal Content -->
            <form class="modal-content animate" method="post" action="index/login.php">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold black-text">Sign in</h4>
                <span onclick="document.getElementById('id01').style.display='none'" 
                class="close float-left" title="Close Modal">&times;</span>
              </div>
              <div class="modal-body">
                <div class="md-form mb-3">
                  <i class="fa fa-envelope prefix grey-text"></i>
                  <input type="email" class="ml-5" name="useremail" placeholder="Email">
                </div>
                <div class="md-form mb-3">
                  <i class="fa fa-lock prefix grey-text"></i>
                  <input type="password" class="ml-5" name="userpassword" placeholder="Password">
                </div>
              </div>
              <!-- <div>
                <a href="#" class="float-right font-weight-normal form-text blue-text text-muted">Forget Password?</a>
              </div> -->
              <div>
                <button class="btn btn-default" type="submit" name="login">Login</button>
              </div>
            </form>
          </div>
          <!-- Popup Register Form -->
          <div id="id02" class="popup-modal">
            <!-- Modal Content -->
            <form class="modal-content animate" method="POST" action="index/register.php" id="register-form">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold black-text">Sign Up</h4>
                <span onclick="document.getElementById('id02').style.display='none'" 
                class="close float-left" title="Close Modal">&times;</span>
              </div>
              <div class="modal-body">
                <div class="form-row mb-2">
                  <div class="col">
                      <!-- First name -->
                      <input type="text" name="reg-firstname" id="reg-firstname" class="form-control" placeholder="First name">
                  </div>
                  <div class="col">
                      <!-- Last name -->
                      <input type="text" name="reg-lastname" id="reg-lastname" class="form-control" placeholder="Last name">
                  </div>
                </div>
                <!-- E-mail -->
                <input type="email" name="reg-email" id="reg-email" class="form-control mb-1" placeholder="E-mail">

                <!-- Password -->
                <input type="password" name="reg-password" id="reg-password" class="form-control" placeholder="Password">
                <!-- <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted">
                    At least 8 characters and 1 digit
                </small> -->

                <!-- Phone number -->
                <input type="number" id="reg-phone" name="reg-phone" class="form-control" placeholder="Phone number">

              </div>
              <div>
                <button class="btn btn-default" onclick="submitMyForm()" id="signin" name="signin">SIGN IN</button>
              </div>
            </form>            
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
    <!-- Full Page Intro -->
    <div class="view" style="background-image: url('index/img/building_7.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
      <div class="row front-search">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
          <div class="btn-group pt-4" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle animated fadeInLeft delay-1s" data-toggle="dropdown"
              aia-haspopup="true" aria-expanded="false">
              All Category
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="width: 180px;">
              <a class="dropdown-item" href="#">Category link</a>
              <a class="dropdown-item" href="#">Category link</a>
            </div>
          </div>
          <div class="md-form animated fadeInDown delay-2s" role="group" >
            <form method="get" action="search.php">
              <input type="search" class="form-control location" name="search" placeholder="Search Location in Maharashtra" style="border:1px; width: 500px;height: 50px;background-color: white; text-align: center;">
            </form>
          </div>
          <!-- <div class="btn-group pt-4 animated fadeInRight delay-2s" role="group">
            <button type="button" class="btn btn-primary">Search</button>
          </div> -->
          <div class="btn-group pt-4 animated fadeInUp delay-2s" role="group">
            <button type="button" class="btn btn-default">Search</button>
          </div>
        </div>
      </div>
      <div class="row thought-line">
        <!-- Buy real estate in areas where the path exists and buy more real estate where there is no path, but you can create your own. -->
        <span class="animated bounceInDown delay-1s">Real estate cannot be lost or stolen, nor can it be carried away.</span>
        <span class="animated bounceInLeft delay-1s">Purchased with common sense, paid for</span>
        <span class="animated bounceInRight delay-1s">in full, and managed with reasonable care, it is</span>
        <span class="animated bounceInUp delay-1s"> about the safest investment in the world.</span> 
      </div>
    </div>
    <!-- Full Page Intro -->
  </header>
  <!-- Main navigation -->
  
  <!-- <div class="container">
    <h1 class="property-section flex-center mt-5 mb-3 font-weight-normal wow fadeInUp" data-wow-delay="0.6s">Maharashtra Region</h1>
    <div class="row">
      <hr class="property-left-line wow bounceInLeft" data-wow-delay="0.6s">
      <i class="fas fa-map-marked-alt fa-2x grey-text mx-1 line-icon wow rotateIn"></i>
      <hr class="property-right-line wow bounceInRight" data-wow-delay="0.6s">
    </div>
    <iframe src="https://www.google.com/maps/d/embed?mid=1chtnDgdjTxohlJ1DGrNGDCDfNyahJfax" width="100%" height="480"></iframe>
  </div> -->

  <div class="container mt-5 mb-3">
    <div class="card">
      <h1 class="property-section card-header flex-center font-weight-normal" data-wow-delay="0.6s">Maharashtra Region</h1>
      <div class="card-body">
        <iframe src="https://www.google.com/maps/d/embed?mid=1chtnDgdjTxohlJ1DGrNGDCDfNyahJfax" width="100%" height="450"></iframe>
      </div>
    </div>
  </div>


  <div class="container mt-5 mb-5" data-wow-offset="1">
    <h1 class="property-section flex-center mb-4 font-weight-normal wow fadeInUp" data-wow-delay="0.6s">Latest Property</h1>
    <div class="row">
      <hr class="property-left-line wow bounceInLeft" data-wow-delay="0.6s">
      <i class="far fa-handshake fa-2x grey-text mx-1 line-icon wow rotateIn"></i>
      <hr class="property-right-line wow bounceInRight" data-wow-delay="0.6s">
    </div>
    <!-- 1st Row of Latest Property Section -->
    <div class="row mb-3">
      <?php 
        $bdsql = "SELECT * FROM basicdetail";
        $lsql = "SELECT * FROM location";
        $isql = "SELECT * FROM image";

        $bdresult = mysqli_query($conn,$bdsql);
        $lresult = mysqli_query($conn,$lsql);
        $iresult = mysqli_query($conn,$isql);
         
        $queryres = mysqli_num_rows($bdresult);

        for($i=1, $q=$queryres; $i<=3 ;$i++,$q--){

          $uisql = "SELECT * FROM image where imgid=$q";
          $uiresult = mysqli_query($conn,$uisql);
          $uirow = mysqli_fetch_assoc($uiresult);

          $upsql = "SELECT * FROM price where priceid=$q";
          $upresult = mysqli_query($conn,$upsql);
          $uprow = mysqli_fetch_assoc($upresult);

          $ubdsql = "SELECT * FROM basicdetail where detailid=$q";
          $ubdresult = mysqli_query($conn,$ubdsql);
          $ubdrow = mysqli_fetch_assoc($ubdresult);

          $ulsql = "SELECT * FROM location where locationid=$q";
          $ulresult = mysqli_query($conn,$ulsql);
          $ulrow = mysqli_fetch_assoc($ulresult);
      ?>
      <div class="col-md-4">
        <!-- Card Dark -->
        <div class="card wow fadeInLeft" data-wow-delay="0.6s">

          <!-- Card image -->
          <div class="view overlay">
            <img class="card-img-top" src="customer/img/<?php echo $uirow['pimg']; ?>" alt="Card image cap" height="230px">
            <a href="property.php?basicdetailid=<?php echo $q;?>">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <!-- Card content -->
          <div class="card-body elegant-color white-text rounded-bottom">
            <!-- Title -->
            <h4 class="card-title"><?php echo ucwords($ubdrow['pname']); ?></h4>
            <div class="card-desc">
              <hr class="hr-light">
              <!-- Text -->
              <p class="card-text white-text mb-4">This property belong to <span class="font-weight-bold"><?php echo ucwords($ubdrow['cname']); ?></span>.<br>₹<?php echo $uprow['tprice']."<br>".ucwords($ulrow['houseno']); ?> </p>
              <!-- Link -->
              <a href="property.php?basicdetailid=<?php echo $q;?>" class="white-text d-flex justify-content-end"><h5>Read more <i class="fas fa-angle-double-right"></i></h5></a>
            </div>
          </div>

        </div>
        <!-- Card Dark -->
      </div>
      <?php } ?>
    </div>
    <!-- 2nd Row of Latest Property Section -->
    <div class="row">
      <?php
      for($i=1, $uq=$q; $i<=3;$i++,$uq--){

          $uisql = "SELECT * FROM image where imgid=$uq";
          $uiresult = mysqli_query($conn,$uisql);
          $uirow = mysqli_fetch_assoc($uiresult);

          $upsql = "SELECT * FROM price where priceid=$uq";
          $upresult = mysqli_query($conn,$upsql);
          $uprow = mysqli_fetch_assoc($upresult);

          $ubdsql = "SELECT * FROM basicdetail where detailid=$uq";
          $ubdresult = mysqli_query($conn,$ubdsql);
          $ubdrow = mysqli_fetch_assoc($ubdresult);

          $ulsql = "SELECT * FROM location where locationid=$uq";
          $ulresult = mysqli_query($conn,$ulsql);
          $ulrow = mysqli_fetch_assoc($ulresult);
      ?>
      <div class="col-md-4">
        <!-- Card Dark -->
        <div class="card wow fadeInLeft" data-wow-delay="0.6s">

          <!-- Card image -->
          <div class="view overlay">
            <img class="card-img-top" src="customer/img/<?php echo $uirow['pimg']; ?>" alt="Card image cap" height="230px">
            <a href="property.php">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <!-- Card content -->
          <div class="card-body elegant-color white-text rounded-bottom">
            <!-- Title -->
            <h4 class="card-title"><?php echo ucwords($ubdrow['pname']); ?></h4>
            <div class="card-desc">
              <hr class="hr-light">
              <!-- Text -->
              <p class="card-text white-text mb-4">This property belong to <span class="font-weight-bold"><?php echo ucwords($ubdrow['cname']); ?></span>.<br>₹<?php echo $uprow['tprice']."<br>".ucwords($ulrow['houseno']); ?> </p>
              <!-- Link -->
              <a href="property.php" class="white-text d-flex justify-content-end"><h5>Read more <i class="fas fa-angle-double-right"></i></h5></a>
            </div>
          </div>

        </div>
        <!-- Card Dark -->
      </div>
      <?php } ?>
    </div>
  </div>
  <!-- More Information -->
  <div style="background-image: url('index/img/building_1.jpg'); height: 400px; background-size: cover;
  background-attachment: fixed;">
    <div class="info white-text">
      <h1 class="pt-4 info-head wow zoomIn" data-wow-delay="0.6s">MORE PROPERTIES</h1>
      <p class="info-para wow fadeInUp" data-wow-delay="0.6s">
        “Real estate cannot be lost or stolen, nor can it be carried away. Purchased with common sense, paid for in full, and managed with reasonable care, it is about the safest investment in the world.”
      </p>
      <a href="propertylist.php"><button class="info-btn wow fadeInRight" data-wow-delay="0.6s">GET STARTED</button></a>
    </div>
  </div>
  <!-- More Information -->
  
  <div class="container">
  <!-- Section: Team v.1 -->
  <section class="team-section text-center my-5">

    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold my-5 wow zoomIn" data-wow-delay="0.6s">Our Team</h2>
    <div class="row">
      <hr class="property-left-line wow bounceInLeft" data-wow-delay="0.6s">
      <i class="fa fa-user fa-2x grey-text line-icon wow rotateIn"></i>
      <hr class="property-right-line wow bounceInRight" data-wow-delay="0.6s">
    </div>
    <!-- Section description -->
    <p class="grey-text w-responsive mx-auto mb-5 wow fadeInLeft" data-wow-delay="0.6s">“Real estate cannot be lost or stolen, nor can it be carried away. Purchased with common sense, paid for in full, and managed with reasonable care, it is about the safest investment in the world.”</p>

    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-lg-1 col-md-6 mb-lg-0 mb-5">
      </div>
      <div class="col-lg-2 col-md-6 mb-lg-0 mb-5 wow fadeInLeft" data-wow-delay="0.6s">
        <div class="avatar mx-auto zoom">
          <img src="index/img/L.png" class="rounded-circle z-depth-3"
            alt="Sample avatar" style="width: 150px; height: 150px;">
        </div>
        <h5 class="font-weight-bold mt-4 mb-3">Saurabh Mohale</h5>
        <p class="text-uppercase blue-text"><strong>Graphic designer</strong></p>
        <p class="grey-text">“Real estate cannot be lost or stolen, nor can it be carried away. Purchased with common sense, paid for in full, and managed with reasonable care, it is about the safest investment in the world.”</p>
        <ul class="list-unstyled mb-0">
          <!-- Facebook -->
          <a class="p-2 fa-lg fb-ic">
            <i class="fab fa-facebook-f blue-text hover"> </i>
          </a>
          <!-- Twitter -->
          <a class="p-2 fa-lg tw-ic">
            <i class="fab fa-twitter blue-text"> </i>
          </a>
          <!-- Instagram -->
          <a class="p-2 fa-lg ins-ic">
            <i class="fab fa-instagram blue-text"> </i>
          </a>
        </ul>
      </div>
      <!-- Grid column -->
      <!-- Grid column -->
      <div class="col-lg-2 col-md-6 mb-lg-0 mb-5 wow fadeInUp" data-wow-delay="0.6s">
        <div class="avatar mx-auto zoom">
          <img src="index/img/suhas.jpg" class="rounded-circle z-depth-3"
            alt="Sample avatar" style="width: 150px; height: 150px;">
        </div>
        <h5 class="font-weight-bold mt-4 mb-3">Suhas Khot</h5>
        <p class="text-uppercase blue-text"><strong>Graphic designer</strong></p>
        <p class="grey-text">“Real estate cannot be lost or stolen, nor can it be carried away. Purchased with common sense, paid for in full, and managed with reasonable care, it is about the safest investment in the world.”</p>
        <ul class="list-unstyled mb-0">
          <!-- Facebook -->
          <a class="p-2 fa-lg fb-ic">
            <i class="fab fa-facebook-f blue-text"> </i>
          </a>
          <!-- Twitter -->
          <a class="p-2 fa-lg tw-ic">
            <i class="fab fa-twitter blue-text"> </i>
          </a>
          <!-- Instagram -->
          <a class="p-2 fa-lg ins-ic">
            <i class="fab fa-instagram blue-text"> </i>
          </a>
        </ul>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-2 col-md-6 mb-lg-0 mb-5 wow bounceInDown" data-wow-delay="0.6s">
        <div class="avatar mx-auto zoom">
          <img src="index/img/sagar.jpg" class="rounded-circle z-depth-3"
            alt="Sample avatar" style="width: 150px; height: 150px;">
        </div>
        <h5 class="font-weight-bold mt-4 mb-3">Saagar Nalawade</h5>
        <p class="text-uppercase blue-text"><strong>Web developer</strong></p>
        <p class="grey-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem ipsa accusantium
          doloremque rem laudantium totam aperiam.</p>
        <ul class="list-unstyled mb-0">
          <!-- Facebook -->
          <a class="p-2 fa-lg fb-ic">
            <i class="fab fa-facebook-f blue-text"> </i>
          </a>
          <!-- Instagram -->
          <a class="p-2 fa-lg ins-ic">
            <i class="fab fa-instagram blue-text"> </i>
          </a>
        </ul>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-2 col-md-6 mb-md-0 mb-5 wow fadeInUp" data-wow-delay="0.6s">
        <div class="avatar mx-auto zoom">
          <img src="index/img/shantanu.jpg" class="rounded-circle z-depth-3"
            alt="Sample avatar" style="width: 150px; height: 150px;">
        </div>
        <h5 class="font-weight-bold mt-4 mb-3">Shantanu Kamtalwar</h5>
        <p class="text-uppercase blue-text"><strong>Backend Developer</strong></p>
        <p class="grey-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
          mollit anim est fugiat nulla id eu laborum.</p>
        <ul class="list-unstyled mb-0">
          <!-- Facebook -->
          <a class="p-2 fa-lg fb-ic">
            <i class="fab fa-facebook-f blue-text"> </i>
          </a>
          <!-- Instagram -->
          <a class="p-2 fa-lg ins-ic">
            <i class="fab fa-instagram blue-text"> </i>
          </a>
        </ul>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-2 col-md-6 wow fadeInRight" data-wow-delay="0.6s">
        <div class="avatar mx-auto zoom">
          <!-- <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg" class="rounded-circle z-depth-3"
            alt="Sample avatar" style="width: 150px; height: 150px;"> -->
          <img src="index/img/pk2.png" class="rounded-circle z-depth-3"
            alt="Sample avatar" style="width: 150px; height: 150px;">
        </div>
        <h5 class="font-weight-bold mt-4 mb-3">P K</h5>
        <p class="text-uppercase blue-text"><strong>Backend developer</strong></p>
        <p class="grey-text">Perspiciatis repellendus ad odit consequuntur, eveniet earum nisi qui consectetur
          totam officia voluptates perferendis voluptatibus aut.</p>
        <ul class="list-unstyled mb-0">
          <!-- Facebook -->
          <a class="p-2 fa-lg fb-ic">
            <i class="fab fa-facebook-f blue-text"> </i>
          </a>
          <!-- Github -->
          <a class="p-2 fa-lg ins-ic">
            <i class="fab fa-instagram blue-text"> </i>
          </a>
        </ul>
      </div>
      <div class="col-lg-1 col-md-6 mb-lg-0 mb-5">
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </section>
  <!-- Section: Team v.1 -->
  </div>

  <!-- Footer -->
  <footer class="page-footer font-small unique-color-dark">

    <div style="background-color: #6351ce;">
      <div class="container">

        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h4 class="mb-0 ml-4">Get connected with us on social networks!</h4>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-md-right">

            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook-f white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g white-text mr-4"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram white-text"> </i>
            </a>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->

      </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

      <!-- Grid row -->
      <div class="row mt-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">Magic Bricks</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Markets always change, and as soon as there’s downturn, cleanliness becomes a major value</p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Option</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">Land</a>
          </p>
          <p>
            <a href="#!">House</a>
          </p>
          <p>
            <a href="#!">Swimming Pool</a>
          </p>
          <p>
            <a href="#!">Garden</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Useful links</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">Your Account</a>
          </p>
          <p>
            <a href="#!">Become an Affiliate</a>
          </p>
          <p>
            <a href="#!">Shipping Rates</a>
          </p>
          <p>
            <a href="#!">Help</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fas fa-home mr-3"></i> Room no.244,Hostel     no.1,GCOE,Jalgoan 425005</p>
          <p>
            <i class="fas fa-envelope mr-3"></i> magicbricks@gmail.com</p>
          <p>
            <i class="fas fa-phone mr-3"></i>+91 7378926512</p>
          <p>
            <i class="fas fa-print mr-3"></i> +91 8888118995</p>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="padding: 0px 670px;">© 2019 Copyright:
      <a href="index.php" class="font-weight-normal"> Magic Bricks.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
  
  <!-- Scoll top -->
  <a href="#top" class="to-top"><i class="fas fa-arrow-up"></i></a>
  <!-- Scoll top -->

  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery --> 
  <script type="text/javascript" src="index/js/jquery-3.3.1.min.js"></script>
  <!-- manual Javascript -->
  <script type="text/javascript" src="index/js/script.js"></script>  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="index/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="index/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="index/js/mdb.js"></script>
  <script type="text/javascript">
    wow = new WOW({
      boxClass: 'wow', // default
      animateClass: 'animated', // default
      offset: 0, // default
      mobile: true, // default
      live: true // default
    })
    new WOW().init();
    // Tooltips Initialization
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).ready(function(){
      var offset = 250;
      var duration = 500;

      $(window).scroll(function(){
        if ($(this).scrollTop() > offset) {
          $('.to-top').fadeIn(duration);
        } else {
          $('.to-top').fadeOut(duration);
        }
      });
    });

    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
      }
    });

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    var checkOtp = function() {
      var givenOTP, actualOTP;
      givenOTP = $('#otp').val();
      actualOTP = $('#tokenx').val();
      if (givenOTP == actualOTP) {
        $('#register-form').submit();
      }
    }
    var submitMyForm = function() {
      var firstname, lastname, email, password, phone;
      firstname = $('#reg-firstname').val();
      lastname = $('#reg-lastname').val();
      email = $('#reg-email').val();
      password = $("#reg-password").val();
      phone = $('#reg-phone').val();

      $.ajax({
        url: 'index/reg-insert-data.php',
        method: 'post',
        data: {
          'firstname': firstname,
          'lastname': lastname,
          'email': email,
          'password': password,
          'phone': phone
        },
        beforeSend: function() {
          $('.spinner').html(
          '<img src="index/img/loader.gif" width="50" height="50"/>'
          );
        },
        success: function(data) {
          console.log(data);
          if(data.status == 1){
            $('#modal-popup').modal('show');
            $('#tokenx').val(data.otp);
          } else {
            $('#modal-popup1').modal('show');
          }          
        },
        error: function(e) {
          console.log(e);
        }
      });
   }
  </script>
</body>

</html>
