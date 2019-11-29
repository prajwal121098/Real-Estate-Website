<!DOCTYPE html>

<?php include_once('database.php');?>



<html lang="en">
    

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>home page</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
  <link href="customer/css/bootstrap.min.css" rel="stylesheet">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <aside class="mdc-persistent-drawer mdc-persistent-drawer--open">
      <nav class="mdc-persistent-drawer__drawer">
        <div class="mdc-persistent-drawer__toolbar-spacer">
            <a href="home.php" class="brand-logo">
                <img src="images/logo.png.png" alt="logo">
					</a>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="property.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                Property Details
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="pages/forms/basic-forms.html">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">person</i>
                User Details
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item" href="#" data-toggle="expansionPanel" target-panel="ui-sub-menu">
              <a class="mdc-drawer-link" href="#">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">person</i>
                Dealer Details
                <i class="mdc-drawer-arrow material-icons">arrow_drop_down</i>
              </a>
            </div>            
          </nav>
        </div>
      </nav>
    </aside>
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    <header class="mdc-toolbar mdc-elevation--z4 mdc-toolbar--fixed">
      <div class="mdc-toolbar__row">
        <section class="mdc-toolbar__section mdc-toolbar__section--align-start">
          <a href="#" class="menu-toggler material-icons mdc-toolbar__menu-icon">menu</a>
          <span class="mdc-toolbar__input">
            <div class="mdc-text-field">
              <input type="text" class="mdc-text-field__input" id="css-only-text-field-box" placeholder="Search anything...">
            </div>
          </span>
        </section>
        <section class="mdc-toolbar__section mdc-toolbar__section--align-end" role="toolbar">
          <div class="mdc-menu-anchor">
            <a href="#" class="mdc-toolbar__icon toggle mdc-ripple-surface" data-toggle="dropdown" toggle-dropdown="notification-menu" data-mdc-auto-init="MDCRipple">
              <i class="material-icons">notifications</i>
              <span class="dropdown-count">3</span>
            </a>
            <div class="mdc-simple-menu mdc-simple-menu--right" tabindex="-1" id="notification-menu">
              <ul class="mdc-simple-menu__items mdc-list" role="menu" aria-hidden="true">
                <li class="mdc-list-item" role="menuitem" tabindex="0">
                  <i class="material-icons mdc-theme--primary mr-1">email</i>
                  One unread message
                </li>
                <li class="mdc-list-item" role="menuitem" tabindex="0">
                  <i class="material-icons mdc-theme--primary mr-1">group</i>
                  One event coming up
                </li>
                <li class="mdc-list-item" role="menuitem" tabindex="0">
                  <i class="material-icons mdc-theme--primary mr-1">cake</i>
                  It's Aleena's birthday!
                </li>
              </ul>
            </div>
          </div>
          <div class="mdc-menu-anchor">
            <a href="#" class="mdc-toolbar__icon mdc-ripple-surface" data-mdc-auto-init="MDCRipple">
              <i class="material-icons">widgets</i>
            </a>
          </div>
          <div class="mdc-menu-anchor mr-1">
            <a href="#" class="mdc-toolbar__icon toggle mdc-ripple-surface" data-toggle="dropdown" toggle-dropdown="logout-menu" data-mdc-auto-init="MDCRipple">
              <i class="material-icons">more_vert</i>
            </a>
            <div class="mdc-simple-menu mdc-simple-menu--right" tabindex="-1" id="logout-menu">
                <ul class="mdc-simple-menu__items mdc-list" role="menu" aria-hidden="true">
                  <li class="mdc-list-item" role="menuitem" tabindex="0">
                    <i class="material-icons mdc-theme--primary mr-1">settings</i>
                    Settings
                  </li>
                  <li class="mdc-list-item" role="menuitem" tabindex="0">
                    <i class="material-icons mdc-theme--primary mr-1">power_settings_new</i>
                    Logout
                  </li>
                </ul>
            </div>
          </div>
        </section>
      </div>
    </header>
    <!-- partial -->
    <div class="page-wrapper mdc-toolbar-fixed-adjust">
      <main class="content-wrapper">
        <div class="col-md-12">

        <?php 

        $bdsql = "SELECT * FROM basicdetail";  

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $bdsql)){
          echo "SQL statment failed";
        } else {
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          $queryres = mysqli_num_rows($result);


          if ($queryres > 0) {
            
            while ($bdrow = mysqli_fetch_assoc($result)) {
              $q = $bdrow['detailid'];
              $id = $bdrow['detailid'];
              
              $isql ="SELECT * FROM image WHERE imgid = $id";
              $iresult = mysqli_query($conn,$isql);
              $irow = mysqli_fetch_assoc($iresult);

              $psql ="SELECT * FROM price WHERE priceid = $id";
              $presult = mysqli_query($conn,$psql);
              $prow = mysqli_fetch_assoc($presult);

              $lsql ="SELECT * FROM location WHERE locationid = $id";
              $lresult = mysqli_query($conn,$lsql);
              $lrow = mysqli_fetch_assoc($lresult);

          ?>

            <!-- Card -->
            <div class="card mb-3">
              <div class="row">
                <div class="col-4 view zoom">
                  <!-- Card image -->
                  <a href="property.php?basicdetailid=<?php echo $q;?>">
                    <img class="property-img" src="customer/img/<?php echo $irow['pimg']; ?>" alt="Card image cap">           
                  </a>
                </div>
                <div class="col-8">
                  <span class="grey-text text-size"><?php echo ucwords($bdrow['ptype']); ?> in <?php echo ucwords($lrow['city']) ?></span><br>
                  <span class="blue-text h4"><?php echo ucwords($bdrow['pname']); ?></span><br>
                  <div class="row">
                    <div class="col-3" style="line-height: 0px;">
                      <h5 class="blue-text mt-1 font-weight-normal">₹<?php echo /*$prow['tprice']*/($prow['sqprice']*$bdrow['parea']); ?></h5>
                      <span class="grey-text square-foot">₹<?php echo $prow['sqprice']."/".$bdrow['punit']; ?></span>                  
                    </div>
                    <div class="col-3" style="line-height: 0px;">
                      <h6 class="black-text mt-1 font-weight-normal"><?php echo $bdrow['parea']." ".$bdrow['punit']; ?></h6>
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
                  <p class="card-text desc-text-size mt-4">A beautiful <?php echo $bdrow['ptype']; ?> in <?php echo ucwords($lrow['houseno']); ?>. The <?php echo $bdrow['ctype']; ?> of the property is <?php echo $bdrow['cname']; ?>. It is a resale property in a promising locality.</p>
                  <!-- <a class="red-text p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse" href="#collapseContent" aria-expanded="false" aria-controls="collapseContent">+ more</a> -->
                  <!-- Button -->
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 ml-3" style="height: 40px;">
                  <a href="property.php?basicdetailid=<?php echo $q;?>"><button type="button" class="contact-builder-btn float-right mr-5 px-3 py-1">More Info.</button></a>
                  <span class="post-font grey-text">Posted on <?php echo $bdrow['date']; ?> by  <span class="builder-name brown-text"><?php echo ucwords($bdrow['cname']); ?></span> (<?php echo $bdrow['ctype']; ?>)</span>
                </div>
              </div>
            </div>

        <?php 
            $q--;
            }
          }
        }
        ?>
        </div>
      </main>
      <!-- partial:partials/_footer.html -->
      <footer>
        <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">
            
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6 d-flex justify-content-end">
              <span class="mt-0 text-right">Hand-crafted &amp; made with <i class="mdi mdi-heart text-red"></i></span>
            </div>
          </div>
        </div>
      </footer>
      <!-- partial -->
    </div>
  </div>
  <!-- body wrapper -->
  <!-- plugins:js -->
  <script src="node_modules/material-components-web/dist/material-components-web.min.js"></script>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="node_modules/progressbar.js/dist/progressbar.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/misc.js"></script>
  <script src="js/material.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  
  <!-- End custom js for this page-->
</body>

</html>