<?php
    include '../backend/checkIfLoggedIn.php';
    include '../backend/checkAdmin.php';
?>
<!DOCTYPE html>

<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>California Musical Theatre | Production Information </title>

      <!-- Required header files -->
      <!-- Foundation Javascript -->
      <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
      <!-- End Foundation Javascript-->
      <script src="../lib/js/logout.js" type="text/javascript"></script>
      <script src="../lib/js/production_info.js" type="text/javascript"></script>

      <!-- Foundation CSS -->
      <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
      <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
      <!-- End Foundation CSS -->
      <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
      <link rel="stylesheet" href="../lib/css/forms.css" type="text/css">
      <link rel="stylesheet" href="../lib/css/production_info.css" type="text/css">

      <!-- End header files -->
   </head>

   <body>
      
      <!-- Top Navigation -->
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
                  <a href="pull_request_cart.php">Pull Request Cart <span id="cart_size"><?php include '../backend/cartSize.php';?></span></a>
               </li>

               <li class="divider"></li>
               <li>
                  <a href="order_status.php">Order Status</a>
               </li>

               <li class="divider"></li>
               <li>
                  <a href="view_invoices.php">View Invoices</a>
               </li>

               <li class="divider"></li>
            </ul>
            <!-- End Left Nav Section -->

            <!-- Right Nav Section -->
            <ul class="right">
              <li class="has-form">
                  <a href="search_page.php" class="button alert">Search Inventory</a>
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
      <!-- End Top Navigation -->

      <!-- Instruction Section -->
      <div class="row">
         <div class="large-6 large-offset-3 columns">
            <div class="instructions text-center">
               <div id="step_one">1. Please confirm your <b>billing information</b> and <b>shipping information</b>.</div>
               <div id="step_two">2. Enter your <b>production information</b> before submitting your pull request.</div>
            </div>
            <div class="progress large-8 large-offset-2 success round">
               <span class="meter" style="width: 70%"></span>
            </div>
         </div>
      </div>
      <!-- End Instruction Section -->

      <!-- User Production Information Form -->
      <div class="row">
         <div class="large-3 large-centered columns">
            <div id="production_info" class="form-box">
               <div class="row">
                  <div class="large-12 columns">
                     <form id="production_form" data-abide="ajax">
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="productionname" id="production_name" placeholder="Production Name" required />
                              <small class="error">Production Name is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="deliverydate" id="delivery_date" placeholder="Delivery Date (YYYY-MM-DD)" required pattern="date" />
                              <small class="error">Delivery Date in YYYY-MM-DD format is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="productionopendate" id="production_open_date" placeholder="Production Open Date (YYYY-MM-DD)" required pattern="date" />
                              <small class="error">Production Open Date in YYYY-MM-DD format is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="productionclosedate" id="production_close_date" placeholder="Production Close Date (YYYY-MM-DD)" required pattern="date" />
                              <small class="error">Production Close Date in YYYY-MM-DD format is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="dateofreturn" id="date_of_return" placeholder="Expected Date of Return (YYYY-MM-DD)" required pattern="date" />
                              <small class="error">Expected date of Return in YYYY-MM-DD format is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 columns">
                              <textarea rows="3" id="notes" placeholder="Notes (Optional)"></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 large-centered columns">
                              <button type="submit" class="button expand" id="submit_pull_request_button">Submit Pull Request</button>
                              <!-- <div class="button expand" id="submit_pull_request_button">Submit Pull Request</div> -->
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
         <!-- End User Production Information Form -->

   <script>
      $(document).foundation();
   </script>
   </body>
</html>