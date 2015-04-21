<?php
    include '../backend/checkIfLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CMT | Costume Inventory System | Dashboard</title>

        <!-- Required header files -->
        <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
        <script src="../lib/js/logout.js" type="text/javascript"></script>
        <script src="../lib/js/search.js" type="text/javascript"></script>
        <script src="../lib/js/order_status.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/order_status.css" type="text/css">

    </head>

    <body>
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <!-- <img src="../lib/images/smallCMTlogo.jpg" alt="CMT" style="width:100px;height:110px">-->
                <li class="name">
                    <h1><a href="index.php">Costume Inventory System</a></h1>
                </li>
            </ul>

            <section class="top-bar-section">
                    <!-- Left Nav Section -->
                <ul class="left">
                  <li class="divider"></li>
                    <?php 
                        if(isset($_SESSION['login_user'])) { 
                    ?>
                        <li class="has-dropdown">
                            <a href="#">Welcome, <?=$_SESSION['login_user']?>!</a>
                        <ul class="dropdown">
                            <li><a href="edit_profile.php">Edit Profile</a></li>
                        </ul>
                        </li>
                    <?php 
                        }
                        else { 
                    ?>
                        <li>
                            <div id="anonymous_login">Welcome, Anonymous!</div>
                        </li>
                    <?php 
                        }
                    ?>
                    <li class="divider"></li>
                    <li>
                        <a href="pull_request_cart.php">Pull Request Cart<?php include '../backend/cartSize.php';?></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#1">Pull an entire set</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="order_status.php">Current Order Status</a>
                    </li>
                </ul>

                <!-- Right Nav Section -->
                <ul class="right">
                    <li class="has-form">
                        <a href="search_page.php" class="button alert">Search Inventory</a>
                    </li>
                    <li class="has-form">
                        <div class="button" id="logout_button" value="Logout">Logout</div>
                    </li>
                </ul>
            </section>
        </nav>

        <div class="main-content row">    

            <!-- Main Content Section -->
            <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->

          <div class="large-10 push-2 columns">
              <p>
                Here is the status of your pull requests.<br>
              </p>
              <div class="pull_request_results">
                <ul class="accordion" data-accordion>
                  <li class="accordion-navigation">
                    <a href="#pull_request_1">
                      <div class="pull_request_name">PULL REQUEST NAME - DATE SUBMITTED: 05-05-2015 <div class="availability right">Pending</div></div>
                    </a>
                    <div id="pull_request_1" class="content active">
                      Panel 1. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                  </li>
                  <li class="accordion-navigation">
                    <a href="#pull_request_2">
                      <div class="pull_request_name">PULL REQUEST NAME - DATE SUBMITTED: 05-05-2015 <div class="availability right">Rejected</div></div>
                    </a>
                    <div id="pull_request_2" class="content">
                      Panel 2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                  </li>
                  <li class="accordion-navigation">
                    <!-- If approved, a href should link to view invoice page. -->
                    <a href="#pull_request_3">
                      <div class="pull_request_name">PULL REQUEST NAME - DATE SUBMITTED: 05-05-2015 <div class="availability right">Approved</div></div>
                    </a>
                    <div id="pull_request_3" class="content">
                      This pull request is approved, <a href="view_invoice.php">View Invoice Here</a>!
                    </div>
                  </li>
                </ul>
              </div>
          </div>
    
          <div class="large-2 pull-10 columns">
              <p><img src="http://placehold.it/250x300&text=Ad" /></p>
          </div>
        </div>



        <!--
      <div class="row ">
        <div class="large-2 columns">
          <a href="#"> <span> </span><img src="http://placehold.it/250x300&text=Costume Image" alt="Costume Image" class=" thumbnail"></a>
        </div>
        <div class="large-10 columns">
          <div class="row">
            <div class=" large-9 columns">
              <h5><a href="#">Costume Name</a></h5>
              <p>Costume Type</p>
            </div>
            <div class=" large-3 columns">
              <div class="button expand medium remove_item">Remove Item</div>
               
            </div>
            <div class="row">
              <div class=" large-12 columns">
                <ul class="large-block-grid-2">
                  <li>
                    <ul>
                      <li><strong>Color:</strong> Black</li>
                      <li><strong>Size:</strong> Large</li>
                      <li><strong>Group:</strong> Star Wars</li>
                      
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li><strong>Rental Fee:</strong> $000.00</li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
      <div class="row ">
        <div class="large-2 columns">
          <a href="#"> <span> </span><img src="http://placehold.it/250x300&text=Costume Image" alt="Costume Image" class=" thumbnail"></a>
        </div>
        <div class="large-10 columns">
          <div class="row">
            <div class=" large-9 columns">
              <h5><a href="#">Costume Name</a></h5>
              <p>Costume Type</p>
            </div>
            <div class=" large-3 columns">
              <div class="button expand medium remove_item">Remove Item</div>
               
            </div>
            <div class="row">
              <div class=" large-12 columns">
                <ul class="large-block-grid-2">
                  <li>
                    <ul>
                      <li><strong>Color:</strong> Black</li>
                      <li><strong>Size:</strong> Large</li>
                      <li><strong>Group:</strong> Star Wars</li>
                      
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li><strong>Rental Fee:</strong> $000.00</li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
    -->

    <script>
        $(document).foundation();
    </script>
    </body>

</html>