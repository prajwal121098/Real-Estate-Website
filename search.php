<?php 
  //include_once('reg-insert-data.php');
  session_start();
  include_once('search/database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Search-pages</title>
  <link rel="icon" type="logo.png" href="property/img/logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="search/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="search/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="search/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Start your project here-->
  <!-- Main navigation -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark unique-color-dark" style="height: 64px;">
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
            <input type="search" class="form-control location" name="search" placeholder="Search Location in Maharashtra" style="border:1px; width: 400px;height: 26px;background-color: white; text-align: center;">
          </form>
        </div>
        <div class="btn-group pt-4" role="group">
          <button type="button" class="btn btn-primary font-weight-bold" style="height: 40px;">Search</button>
        </div>
      </div>
    </div>


    <?php 
      if (isset($_SESSION['user_email'])) {
        ?>
        <div class="mr-4 mt-3">
          <a href="customer.php">
            <i class="fas fa-2x mr-3 fa-home white-text" title="add property details"></i>
          </a>
          <i class="far fa-2x fa-user-circle white-text" title="<?php echo $_SESSION['user_firstname'].' '.$_SESSION['user_lastname'];?>"></i><br>
          <!-- <span class="white-text"><?php echo $_SESSION['user_firstname'];?></span> -->
        </div>
        <form action="search/logout.php" method="POST">
          <button type="submit" name="logout" class="float-left btn btn1">Logout</button>
        </form>
        <?php
      }else{
        ?>
        <i class="fas fa-2x fa-home white-text mr-5 mt-2" title="add property details" onclick="document.getElementById('id01').style.display='block'"></i>
        <!-- Login Button -->
        <button class="float-left btn btn1" onclick="document.getElementById('id01').style.display='block'">Login</button>
        <?php
      }
    ?>
    <!-- Popup Login Form -->
    <div id="id01" class="popup-modal">
      <!-- Modal Content -->
      <div class="modal-content animate">
        <ul class="nav nav-tabs ml-2 mt-2" id="myTab" role="tablist">
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
          <div class="tab-pane fade show active" id="signin" role="tabpanel">  
            <form method="post" action="search/login.php">
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
                <button type="submit" class="btn log-btn font-weight-bold" name="login">Login</button>   
              </div>
            </form>
          </div>
          <div class="tab-pane" id="register" role="tabpanel">
            <form method="POST" action="search/register.php" id="register-form">

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
                <input type="password" name="reg-password" id="reg-password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                <small id="reg-password" class="form-text text-muted">
                    At least 8 characters and 1 digit
                </small>

                <!-- Phone number -->
                <input type="number" id="reg-phone" name="reg-phone" class="form-control" placeholder="Phone number">

              </div>
              <div>
                <button type="submit" onclick="submitMyForm()" id="signin" name="signin" class="btn log-btn font-weight-bold">SIGN IN</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main navigation -->
  
  <!-- Main body -->
  <div class="container mt-5">
    <h2></h2>
    <div class="row">
      <div class="col-md-2" style="">
        <!-- <div class="mt-3">
          <span class="grey-text font-weight-bold" style="font-size: 12px;">BHK</span>
          <div class="row">
            <div class="col-4">
              <button type="button" class="bhk-btn px-3 py-2 h6">1 BHK<br><span class="grey-text" style="font-size: 10px;">0-10L</span></button>
            </div>
            <div class="col-4">
              <button type="button" class="bhk-btn px-3 py-2 h6">2 BHK<br><span class="grey-text" style="font-size: 10px;">0-20L</span></button>
            </div>
            <div class="col-4">
              <button type="button" class="bhk-btn px-3 py-2 h6">3 BHK<br><span class="grey-text" style="font-size: 10px;">11-30L</span></button>          
            </div>
          </div>
        </div>   -->

        <!-- <div class="mt-4">
          <span class="grey-text font-weight-bold" style="font-size: 12px;">BUDGET</span>
          <div class="row">
            <div class="col-lg-5">
              <select class="custom-select grey-text">
                <option selected>Min</option>
                <option value="1">5 lacs</option>
                <option value="2">10 lacs</option>
                <option value="3">15 lacs</option>
                <option value="4">20 lacs</option>
                <option value="5">25 lacs</option>
                <option value="6">30 lacs</option>
                <option value="7">40 lacs</option>
                <option value="8">45 lacs</option>
                <option value="9">50 lacs</option>
                <option value="10">55 lacs</option>
                <option value="11">60 lacs</option>
                <option value="12">70 lacs</option>
                <option value="13">75 lacs</option>
                <option value="14">80 lacs</option>
                <option value="15">85 lacs</option>
                <option value="16">90 lacs</option>
                <option value="17">1 crore</option>
              </select>
            </div>
            <div class="col-lg-2">
              <hr class="grey accent-2 mb-4 mt-0 d-inline-block mt-3" style="width: 15px;">
            </div>
            <div class="col-lg-5">
              <select class="custom-select grey-text">
                <option selected>Max</option>
                <option value="1">5 lacs</option>
                <option value="2">10 lacs</option>
                <option value="3">15 lacs</option>
                <option value="4">20 lacs</option>
                <option value="5">25 lacs</option>
                <option value="6">30 lacs</option>
                <option value="7">40 lacs</option>
                <option value="8">45 lacs</option>
                <option value="9">50 lacs</option>
                <option value="10">55 lacs</option>
                <option value="11">60 lacs</option>
                <option value="12">70 lacs</option>
                <option value="13">75 lacs</option>
                <option value="14">80 lacs</option>
                <option value="15">85 lacs</option>
                <option value="16">90 lacs</option>
                <option value="17">1 crore</option>
                <option value="17">1.5 crores</option>
                <option value="17">3 crores</option>
                <option value="17">5 crores</option>
              </select>
            </div>
          </div>
        </div>

        <div class="mt-3">
          <span class="grey-text font-weight-bold text-uppercase" style="font-size: 12px;">Property Type</span>
          <div class="row" style="height: 50px;">
            <div class="col-lg-6">
              <form method="post" action="">
              <button type="button" class="res-type-btn pt-2 pb-2 h6" name="apartment" value="apartment" id="apartment" onclick="">Apartment</button></form>
            </div>
            <div class="col-lg-6">
              <button type="button" class="res-type-btn pt-2 pb-2 h6">Home</button>
            </div>
          </div>
          <div class="row" style="height: 50px;">
            <div class="col-lg-6">
              <button type="button" class="res-type-btn pt-2 pb-2 h6">Land</button>
            </div>
          </div>
        </div>

        <div class="posted-box mt-5">
          <span class="grey-text font-weight-normal text-uppercase ml-3" style="font-size: 12px;">Posted By</span>
          <div class="mt-1 py-2 pl-3">  
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="posted-dealer custom-control-input" id="defaultInline1">
                <label class="custom-control-label font-weight-normal" for="defaultInline1">Owner</label>
            </div>
            <div class="custom-control custom-checkbox">   
                <input type="checkbox" class="custom-control-input" id="defaultInline3">
                <label class="custom-control-label font-weight-normal" for="defaultInline3">Dealer</label>
            </div>
          </div>
          <hr>
          <span class="grey-text font-weight-normal text-uppercase ml-3" style="font-size: 12px;">Area</span>
          <div class="row mt-2">
            <div class="col-4 ml-2">
              <input type="text" name="min" placeholder="min" style="border:1px solid #E6B8B8;height:25px;width:80px;">
            </div>
            <div class="col-2 ml-3">
              <hr class="grey accent-2 mb-4 mt-0 d-inline-block mt-3" style="width: 14px;">
            </div>
            <div class="col-4">
              <input type="text" name="max" placeholder="max" style="border: 1px solid #E6B8B8;height:25px;width:80px;">
            </div>
          </div> 
          <div class="row">
            <div class="input-group pl-5" style="width: 200px;">
              <select class="custom-select" style="height: 30px; color: grey;">
                <option selected>select</option>
                <option value="1">Sq.Ft.</option>
                <option value="2">Sq.Meter</option>
                <option value="3">Acres</option>
              </select>
              <div class="input-group-append">
                <span class="input-group-text lighten-2 font-weight-bold" id="basic-text1" style="font-size: 12px;background-color: #877373;color: white;">GO</span>
              </div>
            </div>
          </div>
        </div> -->
        <script type="text/javascript" language="javascript">
          var aax_size='160x600';
          var aax_pubname = 'pk00704-21';
          var aax_src='302';
        </script>
        <script type="text/javascript" language="javascript" src="http://c.amazon-adsystem.com/aax2/assoc.js"></script>
      </div>
      <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <div class="md-form mb-5">
                <i class="fas fa-envelope prefix grey-text"></i>
                <input type="email" id="defaultForm-email" class="form-control validate">
                <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
              </div>

              <div class="md-form mb-4">
                <i class="fas fa-lock prefix grey-text"></i>
                <input type="password" id="defaultForm-pass" class="form-control validate">
                <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
              </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-default">Login</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10">

        <?php 
          if (isset($_GET['search']) && !empty($_GET['search'])) {
    
            $search = mysqli_real_escape_string($conn, $_GET['search']);
            $bdsql = "SELECT * FROM basicdetail WHERE pname LIKE '%$search%' OR ctype LIKE '%$search%' OR cname LIKE '%$search%' OR ptype LIKE '%$search%' OR parea LIKE '%$search%' OR punit LIKE '%$search%'";

            $lsql = "SELECT * FROM location WHERE city LIKE '%$search%' OR houseno LIKE '%$search%'";

            /*$bdstmt = mysqli_stmt_init($conn);
            $lstmt = mysqli_stmt_init($conn);
          
            if(!mysqli_stmt_prepare($bdstmt, $bdsql) || !mysqli_stmt_prepare($lstmt , $lsql)){ //prepared statement.
            
              echo "&#x2716; SQL error";
            
            } else {
              mysqli_stmt_execute($bdstmt);
              mysqli_stmt_execute($lstmt);

              $bdresult = mysqli_stmt_get_result($bdstmt);
              $bdqueryres = mysqli_num_rows($bdresult);
              echo $bdqueryres;

              $lresult = mysqli_stmt_get_result($lstmt);
              $lqueryres = mysqli_num_rows($lresult);
              echo $lqueryres;*/

              $bdresult = mysqli_query($conn, $bdsql);
              $lresult = mysqli_query($conn, $lsql);
              $bdqueryres = mysqli_num_rows($bdresult);
              $lqueryres = mysqli_num_rows($lresult);

              if($bdqueryres){
                $queryres = $bdqueryres;
                $result = $bdresult;
                $c = 1;
              } else {
                $queryres = $lqueryres;
                $result = $lresult;
                $c = 0;
              }
              if ($queryres > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                  if($c == 1){
                    $id =  $row['detailid'];
                  } else {
                    $id = $row['locationid'];
                  }
                  
                  $isql ="SELECT * FROM image WHERE imgid = $id";
                  $iresult = mysqli_query($conn,$isql);
                  $irow = mysqli_fetch_assoc($iresult);

                  $psql ="SELECT * FROM price WHERE priceid = $id";
                  $presult = mysqli_query($conn,$psql);
                  $prow = mysqli_fetch_assoc($presult);

                  $idlsql ="SELECT * FROM location WHERE locationid = $id";
                  $idlresult = mysqli_query($conn,$idlsql);
                  $idlrow = mysqli_fetch_assoc($idlresult);

                  $idbdsql ="SELECT * FROM basicdetail WHERE detailid = $id";
                  $idbdresult = mysqli_query($conn,$idbdsql);
                  $idbdrow = mysqli_fetch_assoc($idbdresult);

          ?>

          <!-- Card -->
          <div class="card mb-3">
            <div class="row">
              <div class="col-3">
                <!-- Card image -->
                <a href="property.php?basicdetailid=<?php echo $id;?>">
                  <img class="property-img" src="customer/img/<?php echo $irow['pimg']; ?>" alt="Card image cap">
                </a>
              </div>
              <div class="col-9">
                <span class="grey-text text-size"><?php echo ucwords($idbdrow['ptype']); ?> in <?php echo ucwords($idlrow['city']) ?></span><br>
                <span class="blue-text"><?php echo ucwords($idbdrow['pname']); ?></span><br>
                <div class="row">
                  <div class="col-3" style="line-height: 0px;">
                    <h5 class="blue-text mt-1 font-weight-normal">₹<?php echo /*$prow['sqprice']*/($prow['sqprice']*$idbdrow['parea']); ?></h5>
                    <span class="grey-text square-foot">₹<?php echo $prow['sqprice']."/".$idbdrow['punit']; ?></span>                  
                  </div>
                  <div class="col-3" style="line-height: 0px;">
                    <h6 class="black-text mt-1 font-weight-normal"><?php echo $idbdrow['parea']." ".$idbdrow['punit']; ?></h6>
                    <span class="grey-text square-foot">Super Built-Up Area</span>                  
                  </div>
                  <!-- <div class="col-3" style="line-height: 0px;">
                    <h6 class="blue-text mt-1 font-weight-normal"><?php echo $bd ?>Year</h6>
                    <span class="grey-text square-foot"><?php echo $bdrow['bath']; ?> Bath</span>                  
                  </div> -->
                  <div class="col-3" style="line-height: 0px;">
                                 
                  </div>
                </div>
                <!-- Text -->
                <p class="card-text desc-text-size mt-4">A beautiful <?php echo $idbdrow['ptype']; ?> in <?php echo ucwords($idlrow['houseno']); ?>. The <?php echo $idbdrow['ctype']; ?> of the property is <?php echo $idbdrow['cname']; ?>. It is a resale property in a promising locality.</p>
                <!-- <a class="red-text p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse" href="#collapseContent" aria-expanded="false" aria-controls="collapseContent">+ more</a> -->
                <!-- Button -->
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 ml-3" style="height: 40px;">
                <a href="property.php?basicdetailid=<?php echo $id;?>">
                  <button type="button" class="contact-builder-btn float-right mr-5 px-3 py-1" data-toggle="modal" data-target="#modalLoginForm">Read More</button>
                </a>
                <span class="post-font grey-text">Posted on <?php echo $idbdrow['date']; ?> by  <span class="builder-name brown-text"><?php echo ucwords($idbdrow['cname']); ?></span> (<?php echo $idbdrow['ctype']; ?>)</span>
              </div>
            </div>
          </div>

          <?php }
              }
          }/*else {

            }
          }else{

          }*/ ?>
        <!-- Card -->
      </div>
    </div>
  </div>
  <!-- Main body -->
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
  <script type="text/javascript" src="search/js/jquery-3.3.1.min.js"></script>
  <!-- manual Javascript -->
  <script type="text/javascript" src="search/js/javascript.js"></script>  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="search/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="search/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="search/js/mdb.js"></script>
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

    // Material Select Initialization
    $(document).ready(function() {
      $('.mdb-select').materialSelect();
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
        url: 'search/reg-insert-data.php',
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
          '<img src="search/img/loader.gif" width="50" height="50"/>'
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

    /*var submitapart = function(){
      var apartment;
      apartment = $('#apartment').val();

      $.ajax({
        url : 'search/search-a-ptpye.php',
        method : 'post',
        data : {
          'apartment' : apartment
        },
        success: function(data) {
          console.log(data);
        },
        error: function(e){
          console.log(e);
        }
      });
    }*/
  </script>
</body>

</html>