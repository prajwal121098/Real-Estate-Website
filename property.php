<?php 
  //include_once('reg-insert-data.php');
  include_once('property/database.php');
  session_start();
  $page = $_GET['basicdetailid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Property-pages</title>
  <link rel="icon" type="logo.png" href="property/img/logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">  
  <!-- Bootstrap core CSS -->
  <link href="property/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="property/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="property/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Start your project here-->
  <!-- Main navigation -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark unique-color-dark" style="height: 68px;">
    <a class="navbar-brand font-weight-normal" href="index.php" style="font-size: 30px;"><img src="index/img/logo.png" width="40px" height="40px" class="mr-2">Magic Bricks</a>
    <div class="collapse navbar-collapse search-bar" id="navbarSupportedContent">
      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group pt-4" role="group">
          <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle font-weight-bold" data-toggle="dropdown" aia-haspopup="true" aria-expanded="false" style="height: 40px;">
            All Category
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="width: 180px;">
            <a class="dropdown-item" href="">Category link</a>
            <a class="dropdown-item" href="">Category link</a>
          </div>
        </div>
        <div class="md-form" role="group" >
          <form method="get" action="search.php">
            <input type="text" class="form-control location" name="search" placeholder="Search Location in Maharashtra" style="border:1px; width: 400px;height: 26px;background-color: white; text-align: center;">
          </form>
        </div>
        <div class="btn-group pt-4" role="group">
          <button type="button" class="btn btn-primary font-weight-bold" style="height: 40px;">Search</button>
        </div>
      </div>
    </div>
    <!-- Login Button -->

    <?php 
      if (isset($_SESSION['user_email'])) {
        ?>
        <div class="mr-4">
          <a href="customer.php">
            <i class="fas fa-2x fa-home mr-3 white-text" title="add property details"></i>
          </a>
          <i class="far fa-2x fa-user-circle white-text" title="<?php echo $_SESSION['user_firstname'].' '.$_SESSION['user_lastname'];?>"></i><br>
          <!-- <span class="white-text"><?php echo $_SESSION['user_firstname'];?></span> -->
        </div>
        <form action="property/logout.php" method="POST">
          <button type="submit" name="logout" class="float-left mr-1 btn btn1">Logout</button>
        </form>
        <?php
      }else{
        ?>
        <i class="fas fa-2x fa-home white-text mr-3" title="add property details" onclick="document.getElementById('id01').style.display='block'"></i>
        <button class="float-left mr-1 btn btn1" onclick="document.getElementById('id01').style.display='block'">Login</button>
        <?php
      }
    ?>
    
    <!-- Popup Login Form -->
    <div id="id01" class="popup-modal">
      <!-- Modal Content -->
      <div class="modal-content animate">
        <ul class="nav nav-tabs ml-2 mt-2 mr-2" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-selected="true"><h4 class="modal-title w-100 font-weight-bold black-text">Sign in</h4></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="registe-tab" data-toggle="tab" href="#register" role="tab" aria-selected="false"><h4 class="modal-title w-100 font-weight-bold black-text">Register</h4></a>
          </li>
          <span onclick="document.getElementById('id01').style.display='none'" 
          class="close float-left" title="Close Modal">&times;</span>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active mb-2" id="signin" role="tabpanel">  
            
            <!-- Login Form -->
            <form method="post" action="property/login.php">
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
                <a href="#" class="float-right font-weight-normal form-text blue-text text-muted mr-3">Forget Password?</a>
              </div> -->
              <div>
                <input type="submit" class="ml-2 log-btn font-weight-bold" name="login" value="LOGIN">
              </div>
            </form>
            <!-- Login Form -->

          </div>
          <div class="tab-pane mb-2" id="register" role="tabpanel">
             
            <!-- SignIn Form -->
            <form method="POST" action="property/register.php" id="register-form">
              <div class="modal-body">
                <div class="form-row mb-2">
                  <div class="col">
                      <!-- First name -->
                      <input type="text" name="reg-firstname" id="reg-firstname" class="form-control" placeholder="First name"><br>
                      <?php if(isset($firstnameError)){echo $firstnameError;}?>
                  </div>
                  <div class="col">
                      <!-- Last name -->
                      <input type="text" name="reg-lastname" id="reg-lastname" class="form-control" placeholder="Last name">
                      <?php if(isset($lastnameError)){echo $lastnameError;}?>
                  </div>
                </div>
                <!-- E-mail -->
                <input type="email" name="reg-email" id="reg-email" class="form-control mb-1" placeholder="E-mail">
                <?php if(isset($emailError)){echo $emailError;}?>

                <!-- Password -->
                <input type="password" name="reg-password" id="reg-password" class="form-control" placeholder="Password" aria-describedby="reg-password">
                <?php if(isset($passwordError)){echo $passwordError;}?>
                <input type="hidden" id="tokenx" name="otp">
                <small id="reg-password" class="form-text text-muted">
                    At least 8 characters and 1 digit
                </small>

                <!-- Phone number -->
                <input type="number" id="reg-phone" name="reg-phone" class="form-control" placeholder="Phone number">

              </div>

              <div>
                <!-- Input trigger modal-->
                <!-- <input type="submit" class="ml-2 log-btn font-weight-bold" id="signin" name="signin" value="SIGN IN"> -->
                <button onclick="submitMyForm()" class="ml-2 log-btn font-weight-bold" id="signin" name="signin">SIGNIN</button>
                <span id="frominfo"></span>
                
                <!-- <span class="spinner"></span> -->
              </div>
            </form>
            <!-- SignIn Form -->            
            <!--Modal: modalConfirmDelete-->
            <div class="modal fade" id="modal-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div role="document" style="width: 30%; margin-left: 550px;margin-top: 150px;">
                <!--Content-->
                <div class="modal-body text-center">
                  <!--Header-->
                  <div class="modal-header justify-content-center" style="background-color: #ff4444;height: 50px;">
                    <p class="heading white-text font-weight-bold">EMAIL VERIFICATION</p>
                  </div>
                  <form method="POST" action="#">  
                    <!--Body-->
                    <div class="modal-body black-text" style="border:1px solid #ff4444; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;background-color: white;">
                      
                      <p style="font-size: 20px;">Please Enter the OTP to Verify Your Account</p>
                      <p style="font-size: 14px;">OTP has been sent on Email</p>
                      <input type="number" id="otp" name="otp" placeholder="XXXXXX" style="width: 200px;"><br>
                      <button type="button" onclick="checkOtp()" class="btn btn-danger red mt-3" style="border-radius: 25px; height: 40px; width: 150px;">validate</button><br>
                      <a href="" class="font-weight-normal mt-2 grey-text">Resend OTP</a>
                    </div>
                  </form>  
                </div>
                <!--/.Content-->
              </div>
            </div>
            <!--Modal: modalConfirmDelete-->
            <!--Modal: modalConfirmDelete-->
            <div class="modal fade" id="modal-popup1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div role="document" style="width: 30%; margin-left: 550px;margin-top: 150px;">
                <!--Content-->
                <div class="modal-body text-center">
                  <!--Header-->
                  <div class="modal-header justify-content-center" style="background-color: #ff4444;height: 50px;">
                    <p class="heading white-text font-weight-bold">warning</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form method="POST" action="">  
                    <!--Body-->
                    <div class="modal-body black-text" style="border:1px solid #ff4444; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;background-color: white;">
                      <p style="font-size: 20px;">Sorry, registration is not success.</p>
                    </div>
                  </form>  
                </div>
                <!--/.Content-->
              </div>
            </div>
            <!--Modal: modalConfirmDelete-->
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main navigation -->
  <!-- body -->
  <!-- top image -->
  <?php 
    $bdsql = "SELECT * FROM basicdetail";
    $lsql = "SELECT * FROM location";
    
    $bdresult = mysqli_query($conn,$bdsql);
    $lresult = mysqli_query($conn,$lsql);

    $queryres = mysqli_num_rows($bdresult);

    $bdrow = mysqli_fetch_assoc($bdresult);
    $lrow = mysqli_fetch_assoc($lresult);
    if($queryres > 0){

      $upbdsql = "SELECT * FROM basicdetail where detailid=$page";
      $upbdresult = mysqli_query($conn,$upbdsql);
      $upbdrow = mysqli_fetch_assoc($upbdresult);

      $uplsql = "SELECT * FROM location where locationid=$page";
      $uplresult = mysqli_query($conn,$uplsql);
      $uplrow = mysqli_fetch_assoc($uplresult);

      $isql = "SELECT * FROM image where imgid=$page";
      $iresult = mysqli_query($conn,$isql);
      $irow = mysqli_fetch_assoc($iresult);
  ?>
  <div class="bg view" style="background-image: url('property/img/<?php echo $irow['pimg']; ?>');height: 255px;">
    <div class="mask pattern-2">  
      <div class="mask rgba-black-strong photo-para">
        <div class="container" style="line-height: 15px;">
          <p class="white-text h1 font-weight-bold"><?php echo ucfirst($upbdrow['pname']); ?></p>
          <p class="white-text font-weight-normal" style="font-size: 16px;"><?php echo ucwords($uplrow['houseno']); ?>
            <a href="#map">
              <i class="fas fa-map-marked-alt mx-2 blue-text"></i><span class="font-weight-bold">Map</span>
            </a> 
          </p>
          <p class="font-weight-normal float-right mt-4 white-text">Posted on <?php echo $upbdrow['date']; ?> by <span class="font-weight-bold"><?php echo ucwords($upbdrow['cname']); ?></span></p>
        </div>
      </div>
    </div>
  </div>
  <!-- top image -->
<?php } ?>
<?php  
  $pdsql = "SELECT * FROM price where priceid=$page";

  $presult = mysqli_query($conn,$pdsql);

  $pqueryres = mysqli_num_rows($presult);

  $prow = mysqli_fetch_assoc($presult);

  if ($pqueryres > 0 ) {

?>
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-8">  
        <div class="row">  
          <div class="col-3" style="line-height: 0px;">
            <h2 class="blue-text mt-1 font-weight-bold"><span class="h5">₹</span><?php echo ($prow['sqprice']*$upbdrow['parea']); ?></h2>
            <span class="grey-text font-weight-normal">Price: ₹ <?php echo $prow['sqprice']."/".$upbdrow['punit']; ?></span>                  
          </div>
          <div class="col-3" style="line-height: 0px;">
            <h6 class="grey-text mt-1 font-weight-normal">Age of Property</h6>
            <h4 class="black-text mt-1 font-weight-normal"><?php echo $upbdrow['page']; ?> years</h4>
          </div>
          <div class="col-3" style="line-height: 0px;">
            <h6 class="grey-text mt-1 font-weight-normal">Floor</h6>
            <h4 class="black-text mt-1 font-weight-normal"><?php echo $upbdrow['floorallow']; ?></h4>
          </div>
          <div class="col-3" style="line-height: 0px;">
            <h6 class="grey-text mt-1 font-weight-normal">Bathroom</h6>
            <h4 class="black-text mt-1 font-weight-normal"><?php echo $upbdrow['bath']; ?></h4>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-2">
            <a href="#overview"><h5 class="inner-start-nav">Overview</h5></a>         
          </div>
          <div class="col-2">
            <a href="#amenities"><h5 class="inner-nav">Amenities</h5></a>                        
          </div>
          <div class="col-3">            
            <a href="#neighbourhood"><h5 class="inner-nav">Neighbourhood</h5></a>            
          </div>
          <div class="col-2">            
            <a href="#similar"><h5 class="inner-nav">Mores</h5></a>            
          </div>
        </div>
  <?php }?>
        <!-- description -->
        <div class="mt-4" id="overview">
          <h4 class="font-weight-normal">Description</h4>
          <p class="mt-3">
            10 min walking from Mankhurdh stn, 5 min walking from sion-panvel highway. Gated compound with, 24 hrs security, cctv camera and parking. Nearby Upcoming Metro project , Market, hospital etc...
          </p>
          <div class="row mt-5">
            <div class="col-3">
              <h6 class="grey-text font-weight-normal" style="line-height: 3px;">Area</h6>
              <h4 class="font-weight-normal"><?php echo $upbdrow['parea']." ".$upbdrow['punit']; ?></h4>
            </div>
            <div class="col-3">
              <h6 class="grey-text font-weight-normal" style="line-height: 6px;">Status</h6>
              <h5 class="font-weight-normal">Furnished</h5>
            </div>
            <div class="col-3">
              <h6 class="grey-text font-weight-normal" style="line-height: 6px;">Total Floor</h6>
              <h5 class="font-weight-normal"><?php echo $upbdrow['floorallow']; ?></h5>
            </div>
          </div>
          <div class="mb-4 mt-4">
            <button class="contact-builder-btn">Request For Site Visit<i class="ml-2 far fa-hand-point-right"></i></button>
          </div>
        </div>
        <hr width="20%" style="height:2px;background-color: purple;border-radius: 25px;">
        <!-- Amenitites -->

        <?php  
          
          $fsql = "SELECT * FROM feature where featureid=$page ";

          $fresult = mysqli_query($conn,$fsql);

          $fqueryres = mysqli_num_rows($fresult);

          $frow = mysqli_fetch_array($fresult);
          $a = $frow['feature'];
          $b = explode(",",$a);
          if ($fqueryres > 0 ) {

        ?>

        <div class="mt-5 font-weight-normal" id="amenities">
          <h4 class="font-weight-normal">Amenities</h4>
          <div class="row mt-5">
            <div class="col-2 center <?php if(in_array("car parking", $b)){ ?>active-facility <?php } else {?> inactive-facility <?php } ?>">
              <p><i class="fas fa-2x fa-parking"></i><br>Car Parking</p>
            </div>
            <div class="col-2 center <?php if(in_array("24X7 Security", $b)){ ?>active-facility <?php } else {?> inactive-facility <?php } ?>">
              <p><i class="fas fa-2x fa-lock"></i><br>24X7 Security</p>
            </div>
            <div class="col-2 center <?php if(in_array("Landscaped Gardens", $b)){ ?>active-facility <?php } else {?> inactive-facility <?php } ?>">
              <p><i class="fas fa-2x fa-tree"></i><br>Landscaped Gardens</p>
            </div>
            <div class="col-2 center <?php if(in_array("childern's play area", $b)){ ?>active-facility <?php } else {?> inactive-facility <?php } ?>">
              <p><i class="fas fa-2x fa-child"></i><br>Childern's play area</p>
            </div>
            <div class="col-2 center <?php if(in_array("Power Backup", $b)){ ?>active-facility <?php } else {?> inactive-facility <?php } ?>">
              <p><i class="fas fa-2x fa-plug"></i><br>Power Backup</p>
            </div>
            <div class="col-2 center <?php if(in_array("Gymnasium", $b)){ ?>active-facility <?php } else {?>inactive-facility
            <?php } ?>">
              <p><i class="fas fa-2x fa-dumbbell"></i><br>Gymnasium</p>
            </div>
          </div>
          <div class="row">
            <div class="col-2 center <?php if(in_array("Swimming Pool", $b)){ ?>active-facility <?php } else {?> inactive-facility <?php } ?>">
              <p><i class="fas fa-2x fa-swimmer"></i><br>Swimming Pool</p>
            </div>
            <div class="col-2 center <?php if(in_array("Club Houses", $b)){ ?>active-facility <?php } else {?> inactive-facility <?php } ?>">
              <p><i class="fas fa-2x fa-gamepad"></i><br>Club Houses</p>
            </div>
            <div class="col-2 center <?php if(in_array("Sports Facility", $b)){ ?>active-facility <?php } else {?> inactive-facility <?php } ?>">
              <p><i class="far fa-2x fa-futbol"></i><br>Sports Facility</p>
            </div>
          </div> 
          <div class="mb-4 mt-4">
            <button class="contact-builder-btn">Request More Details<i class="ml-2 far fa-hand-point-right"></i></button>
          </div>
        </div>
        <?php 
        }
        ?>

        <hr width="20%" style="height:2px;background-color: purple;border-radius: 25px;">
        <!-- Neighbourhood -->
        <div class="mt-5" id="neighbourhood">
          <h4 class="font-weight-normal" id="map">Neighbourhood</h4>
          <div class="card mt-5 map">
            <iframe src="https://www.google.com/maps/d/embed?mid=1Zoc2NfO73289Ycr1WREPRucpWFACj_KD" width="100%" height="480"></iframe>
          </div>
          <script type="text/javascript">
            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -34.397, lng: 150.644},
              zoom: 150
            });
          </script>
        </div>
        <hr width="20%" style="height:2px;background-color: purple;border-radius: 25px;">
        <!-- Similar -->
        <div class="mt-5" id="similar">
          <h4 class="font-weight-normal center">We've found more properties for you</h4>
          <div class="row mt-5">
            <?php 
              $isql = "SELECT * FROM image";
              $iresult = mysqli_query($conn,$isql);
              $iqueryres = mysqli_num_rows($iresult);

              for($i=1, $q=$queryres; $i<=3 ;$i++,$q--){

                $uisql = "SELECT * FROM image where imgid=$q";
                $uiresult = mysqli_query($conn,$uisql);
                $irow = mysqli_fetch_assoc($uiresult);

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
            <div class="col-lg-4">
              <!-- Card -->
              <!-- Card image -->
              <div class="view overlay zoom">
                <img class="card-img-top" src="property/img/<?php echo $irow['pimg']; ?>" alt="Card image cap" height="150px">
                <a href="property.php?basicdetailid=<?php echo $q;?>">
                  <div class="mask rgba-black-strong flex-center"><button class="photo-btn">Read More</button></div>
                </a>
              </div>
              <!-- Card content -->
              <div class=" mt-3">
                <!-- Title -->
                <h4 class="font-weight-normal"><span style="font-size: 15px;">₹</span><?php echo ($uprow['sqprice']*$ubdrow['parea']); ?></h4>
                <!-- Text -->
                <p class="font-weight-normal" style="font-size: 13px;"><?php echo $ubdrow['parea']." ".$ubdrow['punit'];  ?> <br><?php echo $ulrow['houseno']; ?></p>
              </div>
              <!-- Card -->
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- Card -->
      <div class="col-lg-4">
        <div class="card testimonial-card sticky" style="width: 350px;">

          <!-- Background color -->
          <div class="color-card">
            <!-- Avatar -->
            <div class="avatar mx-auto owner-photo">
              <img src="property/img/L.png" class="rounded-circle" alt="woman avatar">
            </div>
          </div>
          <!-- Content -->
          <div class="card-body" style="margin-top: 40px;">
            <!-- Name -->
            <h4 class="card-title text-center mt-3" style="line-height: 10px;"><?php echo $upbdrow['cname']; ?></h4>
            <h6 class="grey-text text-center"><?php echo $upbdrow['ctype']; ?></h6>
            <hr width="250px">
            <h5 class="text-center" style="font-size: 17px;">Connect with the  owner/dealer right now</h5>
            <h5 class="text-center" style="font-size: 17px;">Contact Number : <?php echo $upbdrow['cnumber']; ?></h5>

            <!-- Quotation -->
            <!--Body-->
            <!-- <div class="row">
              <div class="col-lg-6">
                <div class="md-form">
                  <input type="email" id="Form-email1" class="form-control validate">
                  <label data-error="wrong" data-success="right" for="Form-email1">Your Name</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="md-form">
                  <input type="email" id="Form-pass1" class="form-control validate">
                  <label data-error="wrong" data-success="right" for="Form-pass1">Your Email</label>
                </div>
              </div>
            </div> -->
            <!-- <div class="md-form">
              <input type="number" id="Form-pass1" class="form-control validate">
              <label data-error="wrong" data-success="right" for="Form-pass1">Your Mobile</label>
            </div> -->
          </div>
          <!-- <div class="text-center mb-3">
            <button class="contact-builder-btn">Connect Now</button>
          </div> -->
        </div>
      </div>
      <!-- Card -->
    </div>
  </div>
  <!-- middle navbar -->

  <!-- body -->
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
  <!-- Scoll top -->
  <a href="#top" class="to-top"><i class="fas fa-arrow-up"></i></a>
  <!-- Scoll top -->

  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery --> 
  <script type="text/javascript" src="property/js/jquery-3.3.1.min.js"></script>
  <!-- manual Javascript -->
  <script type="text/javascript" src="property/js/script.js"></script>  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="property/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="property/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="property/js/mdb.js"></script>
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
    $('[data-toggle="tooltip"]').tooltip();
    });

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

    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
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
        url: 'property/reg-insert-data.php',
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
          '<img src="property/img/loader.gif" width="50" height="50"/>'
          );
        },
        success: function(data) {
          /*$('#frominfo').html('Registeration is Successfully');*/
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
