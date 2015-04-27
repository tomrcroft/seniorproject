<?php
   include '../backend/checkIfLoggedIn.php';
   include '../backend/checkAdmin.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Costume Inventory System | Administrator | Pending Pull Requests</title>

        <!-- Required header files -->
        <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
        <script src="../lib/js/logout.js" type="text/javascript"></script>
        <script src="../lib/js/view_invoices.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/view_invoices.css" type="text/css">

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

         <!-- View Invoices View -->
         <div class="large-12 columns">

            <div class="row">
               <div class="large-10 large-offset-1 columns">
                  <h3>Your Invoices</h3>
               </div>
            </div>

            <!-- View Invoices Section -->
            <div class="row">
               <div class="large-10 large-offset-1 columns" id="invoice_results">

                  <!-- Dummy Data EXPECTED DELIVERY AND RETURN DATE?-->
                  <div class="user_invoice_result panel clearfix" data-invoice-id="xx">
                     <div class="left invoice_title">
                        <div class="invoice_name"><b>NAME</b></div>
                        <div class="production_name">PRODUCTION</div>
                     </div>
                     <div class="left dates text-center">
                        <div class="delivery_date">Expected Delivery Date: MM-DD-YYYY</div>
                        <div class="return_date">Expected Return Date: MM-DD-YYYY</div>
                     </div>
                     <div class="right">
                        <div class="invoice_total"><b>TOTAL:</b> $5000.00</div>
                        <div id="accept_invoice_modal_button" class="accept_invoice_modal_button button success right">Accept</div>
                        <div id="reject_invoice_modal_button" class="reject_invoice_modal_button button alert right">Reject</div>
                     </div>
                  </div>
                  <div class="user_invoice_result panel clearfix" data-invoice-id="xy">
                     <div class="left invoice_title">
                        <div class="invoice_name"><b>NAME</b></div>
                        <div class="production_name">PRODUCTION</div>
                     </div>
                     <div class="left dates text-center">
                        <div class="delivery_date">Expected Delivery Date: MM-DD-YYYY</div>
                        <div class="return_date">Expected Return Date: MM-DD-YYYY</div>
                     </div>
                     <div class="right">
                        <div class="invoice_total"><b>TOTAL:</b> $5000.00</div>
                        <div id="accept_invoice_modal_button" class="accept_invoice_modal_button button success right">Accept</div>
                        <div id="reject_invoice_modal_button" class="reject_invoice_modal_button button alert right">Reject</div>
                     </div>
                  </div>
                  <div class="user_invoice_result panel clearfix" data-invoice-id="xz">
                     <div class="left invoice_title">
                        <div class="invoice_name"><b>NAME</b></div>
                        <div class="production_name">PRODUCTION</div>
                     </div>
                     <div class="left dates text-center">
                        <div class="delivery_date">Expected Delivery Date: MM-DD-YYYY</div>
                        <div class="return_date">Expected Return Date: MM-DD-YYYY</div>
                     </div>
                     <div class="invoice_status_info right">
                        <div class="invoice_total"><b>TOTAL:</b> $5000.00</div>
                        <div class="invoice_status"><b>Approved</b></div>
                     </div>
                  </div>
                  <div class="user_invoice_result panel clearfix" data-invoice-id="yx">
                     <div class="left invoice_title">
                        <div class="invoice_name"><b>NAME</b></div>
                        <div class="production_name">PRODUCTION</div>
                     </div>
                     <div class="left dates text-center">
                        <div class="delivery_date">Expected Delivery Date: MM-DD-YYYY</div>
                        <div class="return_date">Expected Return Date: MM-DD-YYYY</div>
                     </div>
                     <div class="invoice_status_info right">
                        <div class="invoice_total"><b>TOTAL:</b> $5000.00</div>
                        <div class="invoice_status"><b>Rejected</b></div>
                     </div>
                  </div>
                  <!-- End Dummy Data -->

               </div>
            </div>
            <!-- End View Invoices Section -->
         </div>
      </div>

      <!-- Accept Invoice Modal -->
      <div class='reveal-modal' id='accept-invoice-modal' data-reveal>

         <div class="modal_instructions">
            Are you sure you want to <b>accept the invoice</b>?
         </div>

         <div class="button success right" id="accept_invoice_button">Accept Invoice</div>
         <div class="button alert right cancel_modal_button">Cancel</div>

      </div>
      <!-- End Accept Invoice Modal -->

      <!-- Reject Pull Request Modal -->
      <div class='reveal-modal' id='reject-invoice-modal' data-reveal>

         <div class="modal_instructions">
            Are you sure?<br> 
            You will still pay the restocking fee of $<span class="restocking_fee"></span>.
         </div>

         <div class="button alert right" id="reject_invoice_button">Reject Invoice</div>
         <div class="button right cancel_modal_button">Cancel</div>

      </div>
      <!-- End Accept Pull Request Modal -->

    <script>
        $(document).foundation();
    </script>
    </body>

</html>
