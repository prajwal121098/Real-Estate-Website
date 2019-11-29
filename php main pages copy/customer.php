<?php 
  //include_once('reg-insert-data.php');
  //session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Customer-pages</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">  
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
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

    /* select button */
    /* HIDE RADIO */
    [type=radio] { 
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* IMAGE STYLES */
    [type=radio] + i {
      cursor: pointer;
      color: grey;
    }

    /* CHECKED STYLES */
    [type=radio]:checked + i {
      color: black;
    }
    .icon-text{
      color: black;
    }
    .icon-text:hover {
      color: grey;
    }
    .next-btn {
      background-color: white;
      border: 2px solid #DF3333;
      color: #DF3333;
      font-size: 16px;
      padding: 10px 30px;
      border-radius: 25px;
    }
    .next-btn:hover {
      background-color: #DF3333;
      color: white;
    }
  </style>
<body>
  <!-- Start your project here-->
  <!-- Main navigation -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark unique-color-dark" style="height: 68px;">
    <a class="navbar-brand" href="#">Title</a>
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
          <form method="" action="">
            <input type="text" class="form-control location" aria-label="Search" placeholder="Search Location in Maharashtra" style="border:1px; width: 400px;height: 26px;background-color: white; text-align: center;">
          </form>
        </div>
        <div class="btn-group pt-4" role="group">
          <button type="button" class="btn btn-primary font-weight-bold" style="height: 40px;">Search</button>
        </div>
      </div>
    </div>
    <!-- Login Button -->
    <div class="mr-4">
      <a href="customer.php">
        <i class="fas fa-2x mr-3 fa-cart-arrow-down white-text" title="add property details" onmouseover=""></i>
      </a>
      <i class="far fa-2x fa-user-circle white-text" title="<?php echo $_SESSION['user_firstname'].' '.$_SESSION['user_lastname'];?>"></i><br>
      <!-- <span class="white-text"><?php echo $_SESSION['user_firstname'];?></span> -->
    </div>
    <form action="logout.php" method="POST">
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
          <button class="tablinks" onclick="openCity(event, 'Property Details')">
            <i class="fas fa-file-alt mr-4"></i>Property Details
          </button>
          <button class="tablinks" onclick="openCity(event, 'Pricing')">
            <i class="fas fa-hand-holding-usd mr-4"></i>Pricing
          </button>
          <button class="tablinks" onclick="openCity(event, 'Features')">
            <i class="fas fa-gift mr-4"></i>Features
          </button>
      </div>  
      <div class="tab-content">
        <div id="Basic Details" class="tabcontent ml-4">
          <form action="" method="">
            
            <div class="h6 mr-4 mt-4">Property Name:</div>
            <!-- Material input with help text -->
            <div class="md-form">
              <input type="text" id="propertyname" class="form-control" aria-describedby="passwordHelpBlockMD">
              <label for="propertyname">Property Name <i class="fas fa-home"></i></label>
            </div>

            <div class="h6 mr-4 mt-2">You are:</div>
            <div class="d-flex">
              <div class="custom-control custom-radio mr-5" style="line-height: 2px;">
                <label>
                  <input type="radio" name="owner" value="">
                  <i class="fas fa-3x fa-home"></i><br>
                  <span class="h6 ml-1 icon-text">Owner</span>
                </label>
              </div>

              <div class="custom-control custom-radio mr-5" style="line-height: 2px;">
                <label>
                  <input type="radio" name="owner" value="">
                  <i class="fas fa-3x fa-handshake"></i><br>
                  <span class="h6 ml-2 icon-text">Dealer</span>
                </label>
              </div>              
            </div>    

            <div class="h6 mr-4 mt-4">Property Type:</div>
            <div class="d-flex" style="border:1px solid grey; padding: 10px;">
              <div class="custom-control custom-radio mr-5" style="line-height: 2px;">
                <label class="type">
                  <input type="radio" name="type" value="">
                  <i class="fas fa-3x fa-building ml-3"></i><br>
                  <span class="h6 icon-text">Apartment/<br>Building</span>
                </label>
              </div>
              <div class="custom-control custom-radio mr-5" style="line-height: 3px;">
                <label class="type">
                  <input type="radio" name="type" value="">
                  <i class="fas fa-3x fa-tree ml-2"></i><br>
                  <span class="h6 ml-2 icon-text">Land</span>
                </label>
              </div>
              <div class="custom-control custom-radio mr-5" style="line-height: 2px;">
                <label class="type">
                  <input type="radio" name="type" value="">
                  <i class="fas fa-3x fa-home"></i><br>
                  <span class="h6 ml-2 icon-text">Home</span>
                </label>
              </div>
            </div> 

            <button type="submit" class="btn next-btn font-weight-bold float-right">NEXT</button>

          </form>
        </div>

        <div id="Location" class="tabcontent ml-4">
          <form method="" action="">
            
            <div class="h5 mt-4">Where is the property located?</div>
            <div class="row">
              <div class="col-6">
                <div class="md-form">
                  <input type="text" id="city" class="form-control" aria-describedby="passwordHelpBlockMD">
                  <label for="city">Enter City <i class="fas fa-map-marker-alt ml-1"></i></label>
                </div>
              </div>
              <div class="col-6">
                <div class="md-form">
                  <input type="text" id="state" class="form-control" aria-describedby="passwordHelpBlockMD" disabled="Maharashtra">
                  <label for="state">Maharashtra state</label>
                </div>
              </div>
            </div>
            <div class="md-form">
              <input type="text" id="houseno" class="form-control" aria-describedby="passwordHelpBlockMD" >
              <label for="houseno">House no./Street Name</label>
            </div>
            <button type="submit" class="btn next-btn font-weight-bold float-right">NEXT</button>
          </form> 
        </div>

        <div id="Property Details" class="tabcontent ml-4">
          <form method="" action="">
            <div class="h5 mt-4">Give us some information about the property</div>
            <div class="row mt-4">
              <div class="col-6" >
                <h6>Plot Area*:</h6>
                <div class="md-form">
                  <input type="text" id="plotarea" class="form-control" aria-describedby="passwordHelpBlockMD" >
                  <label for="plotarea" style="font-size: 12px;">Specify Plot Size Eg: Sq. Ft 1700</label>
                </div>
              </div>
              <div class="col-6">
                <h6>Plot Area*:</h6>
                <div class="input-group mt-4">
                  <select class="custom-select" style="border-right: none;border-left: none;border-top: none;">
                    <option selected>select</option>
                    <option value="1">Sq.Ft.</option>
                    <option value="2">Sq.Yards</option>
                    <option value="3">Sq.Meter</option>
                    <option value="1">Acres</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <div class="h6 mt-4">Floor Allowed :</div>
                <div class="input-group mt-4">
                  <select class="custom-select" style="border-right: none;border-left: none;border-top: none;">
                    <option selected>select</option>
                    <option value="0">none</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                  </select>
                </div>
              </div>
              <div class="col-1"></div>
              <div class="col-3">
                <div class="h6 mt-4">Age of Property :</div>
                <div class="input-group mt-4">
                  <select class="custom-select" style="border-right: none;border-left: none;border-top: none;">
                    <option selected>select</option>
                    <option value="0">none</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                  </select>
                </div>
              </div>
              <div class="col-1"></div>
              <div class="col-3">
                <div class="h6 mt-4">Bathroom :</div>
                <div class="input-group mt-4">
                  <select class="custom-select" style="border-right: none;border-left: none;border-top: none;">
                    <option selected>select</option>
                    <option value="0">none</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="submit" class="btn next-btn font-weight-bold float-right">NEXT</button>
          </form>
        </div>

        <div id="Pricing" class="tabcontent ml-4">
          <form method="" action="">
            <div class="mt-4 h5">Details about Pricing</div>
            <h6 class="mt-3">Expected Price*:</h6>
            <div class="md-form">
              <input type="number" id="eprice" class="form-control" aria-describedby="passwordHelpBlockMD" style="width:30%;">
              <label for="eprice" style="font-size: 12px;">Price</label>
            </div>
            <div class="row">
              <div class="col-6">
                <h6 class="mt-3">Price per sq.ft :</h6>
                <div class="md-form">
                  <input type="number" id="sqftprice" class="form-control" aria-describedby="passwordHelpBlockMD">
                  <label for="sqftprice" style="font-size: 12px;">Price Sq.Ft.</label>
                </div>
              </div>
              <div class="col-6">
                <h6 class="mt-3">Booking Amount :</h6>
                <div class="md-form">
                  <input type="number" id="sqftprice" class="form-control" aria-describedby="passwordHelpBlockMD">
                  <label for="sqftprice" style="font-size: 12px;">Booking Ammount</label>
                </div>
              </div>
            </div>
            <button type="submit" class="btn next-btn font-weight-bold float-right">NEXT</button>
          </form>
        </div>
        
        <div id="Features" class="tabcontent ml-4">
          <h3>Feature</h3>
          <p>Tokyo is the capital of Japan.</p>
        </div>    
      </div>
    </div>

  </div>






</body>
  <!-- JQuery --> 
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- manual Javascript -->
  <script type="text/javascript" src="js/script.js"></script>  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
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
