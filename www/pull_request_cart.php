<?php
    include '../backend/checkIfLoggedIn.php';
    include '../backend/checkAdmin.php';
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Costume Inventory System | Pull Request Cart</title>

      <!-- Required header files -->
      <!-- Foundation Javascript -->
      <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
      <!-- End Foundation Javascript-->
      <script src="../lib/js/logout.js" type="text/javascript"></script>
      <script src="../lib/js/pull_request_cart.js" type="text/javascript"></script>

      <!-- Foundation CSS -->
      <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
      <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
      <!-- End Foundation CSS -->
      <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
      <link rel="stylesheet" href="../lib/css/pull_request_cart.css" type="text/css">

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
      
      <div class="row">    

         <!-- Main Content Section -->
         <div class="large-10 push-2 columns">
            <p>
            Items in your Pull Request<br>
            If you would like to rent these items and checkout, click <b>Send Pull Request.</b><br>
            If you would like to restart your pull request, click <b>Cancel Pull Request</b>
            </p>

            <!-- List of Items in Cart Section -->
            <div class="cart_results">
               <?php include '../backend/viewCart.php';?>
            </div>
            <!-- End List of Items in Cart Section -->

            <!-- Confirmation Modals -->
            <div id="send_pull_request" class="button success right">Send Pull Request</div>
            <div id="cancel_pull_request" class="button alert right">Cancel Pull Request</div>

            <div class='reveal-modal' id='cancel-modal' data-reveal>
               <div class="modal_instructions">
                  Are you sure you want to <b>delete</b> all items from your cart?
               </div>
               <div id="confirm_cancel" class="button alert right">Yes</div>
               <div id="reject_cancel" class="button right">No</div>
            </div>

            <div class='reveal-modal' id='send-modal' data-reveal>
               <div class="modal_instructions">
                  Are you sure you want to <b>send a pull request</b> for all items from your cart?
               </div>
               <div id="confirm_send" class="button success right">Yes</div>
               <div id="reject_send" class="button alert right">No</div>
            </div>
            <!-- End Confirmation Modals -->

         </div>

         <div class="large-2 pull-10 columns">
            <p><img src="http://placehold.it/250x300&text=Ad" /></p>
         </div>
      </div>

    <script>
        $(document).foundation();
    </script>
    </body>

</html>