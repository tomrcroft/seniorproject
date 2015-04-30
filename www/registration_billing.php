<?php
    include '../backend/checkIfLoggedIn.php';
    include '../backend/checkAdmin.php';
?>
<!DOCTYPE html>

<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>California Musical Theatre | Registration</title>

      <!-- Required header files -->
      <!-- Foundation Javascript -->
      <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
      <!-- End Foundation Javascript-->
      <script src="../lib/js/registration.js" type="text/javascript"></script>

      <!-- Foundation CSS -->
      <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
      <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
      <!-- End Foundation CSS -->
      <link rel="stylesheet" href="../lib/css/forms.css" type="text/css">
      <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
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
            <h2 class="text-center">Billing Information</h2>
            <p class="text-center">
               Please <b>continue your registration</b> be entering your <b>Billing information:</b> <br>
               <i>This information may be editted later.</i> 
            </p>
            <div class="progress large-8 large-offset-2 success round">
               <span class="meter" style="width: 70%"></span>
            </div>
         </div>
      </div>
      <!-- End Instruction Section -->

      <!-- Billing Form -->
      <div class="row">
         <div class="large-3 large-centered columns">
            <div id="registration_billing" class="form-box">
               <div class="row">
                  <div class="large-12 columns">
                     <form id="registration_billing_form" data-abide="ajax">
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="billingname" id="billing_name" placeholder="Billing Attn" required />
                              <small class="error">Billing Attn is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="billingaddress" id="billing_address" placeholder="Billing Address" required />
                              <small class="error">Billing Address is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="billingcity" id="billing_city" placeholder="Billing City" required />
                              <small class="error">Billing City is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="billingstate" id="billing_state" placeholder="Billing State" required />
                              <small class="error">Billing State is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="billingzip" id="billing_zip" placeholder="Billing Zip Code" required pattern="zip" />
                              <small class="error">5 Digit Zip is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 columns">
                              <input type="text" name="billingcountry" id="billing_country" placeholder="Billing Country" required />
                              <small class="error">Billing Country is required.</small>
                           </div>
                        </div>
                        <div class="row">
                           <div class="large-12 large-centered columns">
                              <button type="submit" class="button expand" id="submit_billing_info_button_button">Submit Billing</button>
                              <!-- <div class="button expand" id="submit_billing_info_button">Submit Billing Information</div> -->
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Billing Form -->

   <script>
      $(document).foundation();
   </script>
   </body>

</html>