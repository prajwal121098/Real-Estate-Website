<?php 
  //include_once('reg-insert-data.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Customer-pages</title>
  <link rel="icon" type="logo.png" href="customer/img/logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">  
  <!-- Bootstrap core CSS -->
  <link href="customer/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="customer/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="customer/css/style.css" rel="stylesheet">
</head>
  <style type="text/css">
    .tab {
      float: left;
      background-color: #FF8800;
      width: 24%;
    }

    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      color: black;
      padding: 22px 16px;
      width: 100%;
      border: none;
      text-align: left;
      transition: 0.3s;
      font-size: 20px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      float: left;
      padding: 0px 12px;
      border-left: none;
      width: 600px;
    }
    </style>
<body>
  <!-- Start your project here-->
  <!-- Main navigation -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark unique-color-dark" style="height: 68px;">
    <a class="navbar-brand font-weight-normal" href="index.php" style="font-size: 30px;"><img src="index/img/logo.png" width="40px" height="40px" class="mr-2">Magic Bricks</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
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
    <!-- Login Button -->
    <div class="mr-4">
      <a href="propertylist.php">
        <i class="fas fa-2x mr-3 fa-book white-text" title="All PROPERTIES" onmouseover=""></i>
      </a>
      <i class="far fa-2x fa-user-circle white-text" title="<?php echo $_SESSION['user_firstname'].' '.$_SESSION['user_lastname'];?>"></i><br>
      <!-- <span class="white-text"><?php echo $_SESSION['user_firstname'];?></span> -->
    </div>
    <form action="customer/logout.php" method="POST">
      <button type="submit" name="logout" class="float-left mr-1 btn btn1">Logout</button>
    </form>
  </nav>  

  <div class="container mt-5" style="border:1px solid black;">

    <div class="row">
      <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'Basic Details')" id="defaultOpen">
            <i class="far fa-file-alt mr-4"></i>Basic Details
          </button>
          <button class="tablinks" onclick="openCity(event, 'Location')">
            <i class="fas fa-map-marker-alt mr-4"></i>Location
          </button>
          <button class="tablinks" onclick="openCity(event, 'Pricing')">
            <i class="fas fa-hand-holding-usd mr-4"></i>Pricing
          </button>
          <button class="tablinks" onclick="openCity(event, 'Image Upload')">
            <i class="fas fa-image mr-4"></i>Image Upload
          </button>
          <button class="tablinks" onclick="openCity(event, 'Features')">
            <i class="fas fa-gift mr-4"></i>Features
          </button>
      </div>  
      <div class="tab-content">
        <div id="Basic Details" class="tabcontent ml-4">
          <form action="" method="POST">
            
            <div class="h6 mr-4 mt-4">Property Name:</div>
            <!-- Material input with help text -->
            <div class="md-form">
              <input type="text" id="pn" class="form-control" name="pn" >
              <label for="pn">Property Name <i class="fas fa-home"></i></label>
            </div>

            <div class="h6 mr-4 mt-2">You are:</div>
            <div class="d-flex">
              <div class="custom-control custom-radio mr-5" style="line-height: 2px;">
                <label>
                  <input type="radio" name="you" value="owner" id="you">
                  <i class="fas fa-3x fa-home"></i><br>
                  <span class="h6 ml-1 icon-text">Owner</span>
                </label>
              </div>

              <div class="custom-control custom-radio mr-5" style="line-height: 2px;">
                <label>
                  <input type="radio" name="you" value="dealer" id="you">
                  <i class="fas fa-3x fa-handshake"></i><br>
                  <span class="h6 ml-2 icon-text">Dealer</span>
                </label>
              </div>

              <!-- Material input with help text -->
              <div class="md-form ml-4">
                <input type="text" id="cname" class="form-control" name="cname">
                <label for="cname">Name(owner/dealer) <i class="fas fa-user"></i></label>
              </div>
            </div>    

            <div class="h6 mr-4 mt-4">Customer Number:</div>
            <div class="md-form row ml-2">
              <input type="number" id="cnumber" class="form-control" name="cnumber">
              <label for="cnumber">Customer number<i class="fas fa-phone"></i></label>
            </div>

            <div class="h6 mr-4 mt-4">Property Type:</div>
            <div class="d-flex" style="border:1px solid grey; padding: 10px;">
              <div class="custom-control custom-radio mr-5" style="line-height: 2px;">
                <label class="type">
                  <input type="radio" name="type" value="apartment" id="type">
                  <i class="fas fa-3x fa-building ml-3"></i><br>
                  <span class="h6 icon-text">Apartment</span>
                </label>
              </div>
              <div class="custom-control custom-radio mr-5" style="line-height: 3px;">
                <label class="type">
                  <input type="radio" name="type" value="land" id="type">
                  <i class="fas fa-3x fa-tree ml-2"></i><br>
                  <span class="h6 ml-2 icon-text">Land</span>
                </label>
              </div>
              <div class="custom-control custom-radio mr-5" style="line-height: 2px;">
                <label class="type">
                  <input type="radio" name="type" value="home" id="type">
                  <i class="fas fa-3x fa-home"></i><br>
                  <span class="h6 ml-2 icon-text">Home</span>
                </label>
              </div>
            </div>
            <div class="h5 mt-4">Give us some information about the property</div>
            <div class="row mt-4">
              <div class="col-6" >
                <h6>Plot Area*:</h6>
                <div class="md-form">
                  <input type="number"  class="form-control" name="pa" id="pa" >
                  <label for="pa" style="font-size: 12px;">Specify Plot Size Eg: Sq. Ft 1700</label>
                </div>
              </div>
              <div class="col-6">
                <h6>Plot Unit*:</h6>
                <!-- <div class="md-form mt-4">
                   <input type="text" id="propertyname" class="form-control" name="pu" id="pu">
                   <label for="pu" style="font-size: 12px;">Specify Plot Unit Eg: Sq.Ft.</label>
                </div> -->
                <div class="input-group mt-4">
                  <select class="custom-select" name="pu" id="pu" style="border-right: none;border-left: none;border-top: none;">
                    <option selected>select</option>
                    <option value="sq.ft.">Sq.Ft.</option>
                    <option value="sq.yards">Sq.Yards</option>
                    <option value="sq.meter">Sq.Meter</option>
                    <option value="acres">Acres</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <div class="h6 mt-4">Floor Allowed :</div>
                <div class="md-form mt-4">
                   <input type="number"  class="form-control" name="fa" id="fa">
                </div>
              </div>
              <div class="col-1"></div>
              <div class="col-3">
                <div class="h6 mt-4">Age of Property :</div>
                <div class="md-form mt-4">
                   <input type="number" class="form-control" name="age" id="age">
                </div>
              </div>
              <div class="col-1"></div>

              <div class="col-1"></div>
              <div class="col-3">
                <div class="h6 mt-4">Bathroom :</div>
                <div class="md-form mt-4">
                 <input type="number" class="form-control" name="bath" id="bath">
                </div>
              </div>
            </div>
            <button type="button" class="btn next-btn font-weight-bold float-right" onclick="submitCBD()">NEXT
            </button>

          </form>
        </div>

        <div id="Location" class="tabcontent ml-4">
          <form method="" action="">
            
            <div class="h5 mt-4">Where is the property located?</div>
            <div class="row">
              <div class="col-6">
                <div class="md-form">
                  <input type="text" id="city" name="city" class="form-control">
                  <label for="city">Enter City <i class="fas fa-map-marker-alt ml-1"></i></label>
                </div>
              </div>
              <div class="col-6">
                <div class="md-form">
                  <input type="text" id="state" name="state" value="Maharashtra" class="form-control" disabled="Maharashtra">
                </div>
              </div>
            </div>
            <div class="md-form">
              <input type="text" id="houseno" name="houseno" class="form-control" >
              <label for="houseno">House no./Street Name</label>
            </div>
            <input type="hidden" id="fk" name="fk">
            <button type="button" class="btn next-btn font-weight-bold float-right" onclick="submitCL();">NEXT</button>
          </form> 
        </div>

        <div id="Pricing" class="tabcontent ml-4">
          <form method="" action="">
            <div class="mt-4 h5">Details about Pricing</div>
            <h6 class="mt-3">Price per sq.ft :</h6>
            <div class="md-form">
              <input type="number" id="sqftprice" class="form-control">
              <label for="sqftprice" style="font-size: 12px;">Price Sq.Ft.</label>
            </div>
            <div class="row">
              <div class="col-6">
                <h6 class="mt-3">Expected Price*:</h6>
                <div class="md-form">
                  <input type="number" id="tprice" class="form-control" style="width:30%;" readonly>
                  <label for="eprice" style="font-size: 12px;">Price</label>
                </div>
              </div>
              <div class="col-6">
                <h6 class="mt-3">Booking Amount :</h6>
                <div class="md-form">
                  <input type="number" id="bookamt" class="form-control">
                  <label for="bookamt" style="font-size: 12px;">Booking Ammount</label>
                </div>
              </div>
              <input type="hidden" id="fk" name="fk">
            </div>
            <button type="button" class="btn next-btn font-weight-bold float-right" onclick="submitCP()">NEXT</button>
          </form>
        </div>

        <div id="Image Upload" class="tabcontent ml-4">
         
          <form action="" method="post" enctype="multipart/form-data">
            <div class="md-form">
              <h6 class="mt-3">Add Property Images :</h6>
              <input type="file" name="file" id="file" class="input-default-js">
            </div>
            <div class="md-form">
              <h6 class="mt-3">Add owner/dealer Images :</h6>
              <input type="file" name="opfile" id="odfile" class="input-default-js">
            </div> 
            <input type="hidden" id="fk" name="fk">  
            <input type="button" class="btn btn-primary" value="Upload Image" name="submit" onclick="submitCIU()">
            <button type="button" class="btn next-btn font-weight-bold float-right" onclick="openCity(event,'Features');">NEXT</button>
          </form>
        </div>    
        
        <div id="Features" class="tabcontent ml-4">
          <div class="mt-4 h5">Features</div>
          <form action="" method="post">
            <div class="row mt-5">
              <div class="col-2">
                <label>
                  <input type="checkbox" name="feature" value="car parking" class="feature">
                  <i class="fas fa-2x fa-parking"></i><br>
                  <span class="h6 icon-text">Car<br>Parking</span>
                </label>
              </div>
              <div class="col-2">
                <label>
                  <input type="checkbox" name="feature" value="24X7 Security" class="feature">
                  <i class="fas fa-2x fa-lock"></i><br>
                  <span class="h6 icon-text">24X7<br>Security</span>
                </label>
              </div>
              <div class="col-2">
                <label>
                  <input type="checkbox" name="feature" value="childern's play area" class="feature">
                  <i class="fas fa-2x fa-child"></i><br>
                  <span class="h6 icon-text">Childern's <br> play area</span>
                </label>
              </div>
              <div class="col-2">
                <label>
                  <input type="checkbox" name="feature" value="Landscaped Gardens" class="feature">
                  <i class="fas fa-2x fa-tree"></i><br>
                  <span class="h6 icon-text">Landscaped<br>Gardens</span>
                </label>
              </div>
              <div class="col-2">
                <label>
                  <input type="checkbox" name="feature" value="Power Backup" class="feature">
                  <i class="fas fa-2x fa-plug"></i><br>
                  <span class="h6 icon-text">Power <br>Backup</span>
                </label>
              </div>
              <div class="col-2">
                <label>
                  <input type="checkbox" name="feature" value="Gymnasium" class="feature">
                  <i class="fas fa-2x fa-dumbbell"></i><br>
                  <span class="h6 icon-text">Gymnasium</span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <label>
                  <input type="checkbox" name="feature" value="Swimming Pool" class="feature">
                  <i class="fas fa-2x fa-swimmer"></i><br>
                  <span class="h6 icon-text">Swimming <br>Pool</span>
                </label>
              </div>
              <div class="col-2">
                <label>
                  <input type="checkbox" name="feature" value="Club Houses" class="feature">
                  <i class="fas fa-2x fa-gamepad"></i><br>
                  <span class="h6 icon-text">Club <br>Houses</span>
                </label>
              </div>
              <div class="col-2">
                <label>
                  <input type="checkbox" name="feature" value="Sports Facility" class="feature">
                  <i class="fas fa-2x fa-futbol"></i><br>
                  <span class="h6 icon-text">Sports <br>Facility</span>
                </label>
              </div>
              <input type="hidden" id="fk" name="fk">
            </div>
            <button type="submitCF" class="btn next-btn font-weight-bold float-right" onclick="submitCF()">Submit
            </button>
          </form>
        </div>    
      </div>
    </div>

  </div>






</body>
  <!-- JQuery --> 
  <script type="text/javascript" src="customer/js/jquery-3.3.1.min.js"></script>
  <!-- manual Javascript -->
  <script type="text/javascript" src="customer/js/script.js"></script>  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="customer/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="customer/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="customer/js/mdb.js"></script>
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

    var submitCBD = function(){
      var pname,ctype,cname,cnumber,ptype,parea,punit,floorallow,page,bath,fk;
      pname = $('#pn').val();
      ctype = $('#you').val();
      cname = $('#cname').val();
      cnumber = $('#cnumber').val();
      ptype = $('#type').val();
      parea = $('#pa').val();
      punit = $('#pu').val();
      floorallow = $('#fa').val();
      page = $('#age').val();
      bath = $('#bath').val();
      
      $.ajax({
        url:'customer/customer-bd-data.php',
        method:'POST',
        data:{
          'pname': pname,
          'ctype': ctype,
          'cname': cname,
          'cnumber' : cnumber,
          'ptype': ptype,
          'parea': parea,
          'punit': punit,
          'floorallow': floorallow,
          'page': page,
          'bath': bath
        },
        success: function(data) {
          
          if (data.status == 1) {
            fk = data.fk;
            $('#fk').val(fk);
            openCity(event,'Location');
          } 
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    var submitCL = function(){
      var city,state,houseno;
      city = $('#city').val();
      state = $('#state').val();
      houseno = $('#houseno').val();
      
      $.ajax({
        url:'customer/customer-loc-data.php',
        method:'POST',
        data:{
          'city': city,
          'state': state,
          'houseno': houseno
        },
        success: function(data) {
          console.log(data);
          if (data == 1) {
            openCity(event,'Pricing');
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    var submitCP = function(){
      var city,state,houseno;
      sqprice = $('#sqftprice').val();
      bookamt = $('#bookamt').val();
      
      $.ajax({
        url:'customer/customer-price-data.php',
        method:'POST',
        data:{
          'sqprice': sqprice,
          'bookamt': bookamt
        },
        success: function(data) {
          console.log(data);
          if (data.status == 1) {
            alert('Your Property Price is '+data.tprice);
            openCity(event,'Image Upload');
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    var submitCIU = function(){
      
      var fd = new FormData();
      var pfiles = $('#file')[0].files[0];     
      var odfiles = $('#odfile')[0].files[0];  
      fd.append('file',pfiles);
      fd.append('opfile',odfiles);

      $.ajax({
        url:'customer/customer-img-data.php',
        method:'POST',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
          console.log(data);
          if (data == 1) {
            //openCity(event,'Image Upload');
            alert('Image Uploaded Successfully');
          } else {
            alert('Image Uploaded not Successfully');
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    } 

    var submitCF = function(){      
      var feature = [];
      $('.feature').each(function(){
        if($(this).is(':checked')){
          feature.push($(this).val());
        }
      });
      feature = feature.toString();     

      $.ajax({
        url:'customer/customer-feat-data.php',
        method:'POST',
        data:{
          'feature': feature
        },
        success: function(data) {
          console.log(data);
          if (data == 1) {
            alert('Submit Successfully');
            openCity(event,'Basic Details');
          }
        },
        error: function(e) {
          console.log(e);
          alert('Submit Unsuccessfully');
        }
      });
    } 

  </script>
  <script type="text/javascript">
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>
</body>

</html>