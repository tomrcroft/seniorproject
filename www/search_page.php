<?php 
    session_start();
    include '../backend/checkAdmin.php';
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Costume Inventory System | Search Page</title>

      <!-- Required header files -->

      <!-- Foundation Javascript -->
      <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
      <!-- End Foundation Javascript-->
      <script src="../lib/js/search.js" type="text/javascript"></script>
      <script src="../lib/js/logout.js" type="text/javascript"></script>

      <!-- Foundation CSS -->
      <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
      <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
      <!-- End Foundation CSS -->
      <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
      <link rel="stylesheet" href="../lib/css/search_page.css" type="text/css">

      <!-- End header files -->
   </head>

   <body>
      <nav class="top-bar" data-topbar role="navigation">

         <ul class="title-area">
            <!-- <img src="../lib/images/smallCMTlogo.jpg" alt="CMT" style="width:100px;height:110px">-->
            <li class="name">
               <h1><a href="index.php">Costume Inventory System</a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
         </ul>

         <section class="top-bar-section">
            <!-- Left Nav Section -->
            <ul class="left">

               <li class="divider"></li>

               <!-- Welcome User Section -->
               <?php 
                  if(isset($_SESSION['login_user'])) { 
               ?>
                  <li class="has-dropdown">
                     <a href="#">Welcome, <?=$_SESSION['login_user']?>!</a>
                     <ul class="dropdown">
                        <li><a href="edit_profile.php">Edit Profile</a></li>
               <?php
                  if(checkIfAdmin($_SESSION['login_user'])) {
               ?>
                  <li><a href="add_administrator.php">Add Administrator</a></li>
               <?php 
                  }
               ?>
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
               <!-- End Welcome User Section -->

               <!-- Admin Navigation -->
               <?php
                  if(isset($_SESSION['login_user']))
                     if(checkIfAdmin($_SESSION['login_user'])) {
               ?>
                     <li class="divider"></li>
                     <li>
                        <a href="pending_requests.php">Pending Pull Requests (<?php include '../backend/GetPendingPullRequestCount.php'; ?>)</a>
                     </li>

                     <li class="divider"></li>
                     <li>
                        <a href="view_master_records.php">View Master Records</a>
                     </li>
               <?php 
                     }
               ?>
               <!-- End Admin Navigation -->

               <li class="divider"></li>
               <li>
                  <a href="pull_request_cart.php">Pull Request Cart<?php include '../backend/cartSize.php';?></a>
               </li>

               <li class="divider"></li>
               <li>
                  <a href="order_status.php">Order Status</a>
               </li>

               <li class="divider"></li>
            </ul>
            <!-- End Left Nav Section -->

            <!-- Right Nav Section -->
            <ul class="right">
               <li class="has-form">
                  <div class="row collapse">
                     <div class="large-8 small-9 columns">
                        <input type="text" id="search_term" placeholder="Search Inventory Database">
                     </div>
                     <div class="large-4 small-3 columns">
                        <input class="alert button expand" id="search_page_form" value="Search"></input>
                     </div>
                  </div>
               </li>
               <?php
                  if(isset($_SESSION['login_user'])) { 
               ?>
                  <li class="has-form">
                     <div class="button" id="logout_button" value="Logout">Logout</div>
                  </li>
               <?php 
                  }
                  else { 
               ?>
                  <li class="has-form">
                     <a href="index.php?form=register" class="button">Register</a>
                  </li>
                  <li class="has-form">
                     <a href="index.php" class="button">Login</a>
                  </li>
               <?php 
                  }
               ?>
            </ul>
            <!-- End Right Nav Section -->

         </section>
      </nav>

      <div class="row">    
     
         <!-- Search Results Section -->
         <div class="large-10 push-2 columns">
            <div class="row" id="search_results">
               <?php
                  if(!empty($_GET['status']))
                     if($_GET['status'] == "LoggedOut")
                        echo  'You have been logged out';
                  
               ?>   
               <p> 
                  There are no results to display.<br>
                  You may search costumes by name in the <b>Search Form</b> in the top bar.
               </p>
               <!-- Dummy data for search results DELETE THIS BEFORE INSTALLATION -->             
<!--              <div class="inventory_image large-4 small-6 columns">
                     <img src="../lib/images/costumes/18.jpg">
                     <div class="panel clearfix centered">
                        <h5>Item Name</h5>
                        <h5>Rental Status: Available</h5>
                        <h6 class="subheader">$000.00</h6>
                        <div class="add_item button">Add Item</div>
                     </div>
                  </div> -->
               <!-- End Dummy data -->
            </div>
         </div> 
         <!-- End Search Results Section -->

         <!-- Filter Sidebar -->   
         <div class="filter-facets large-2 pull-10 columns">
            <!-- INCLUDE FILE HERE SORRY IT GOT DELETED -->
            <!-- <div class="button" id="filter_button">Filter</div> -->
            <p><img src="http://placehold.it/320x240&text=Ad" /></p>
         </div>
         <!-- End Filter Sidebar -->

      </div>

      <script>
         $(document).foundation();
      </script>
   </body>
</html>