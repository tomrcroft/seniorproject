<?php
    include '../backend/checkIfLoggedIn.php';
    include '../backend/checkAdmin.php';
    if(!checkIfAdmin($_SESSION['login_user']))
        header ("Location: ../www/index.php");
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
        <script src="../lib/js/pending_requests.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/pending_requests.css" type="text/css">

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

            <!-- Pending Pull Requests View -->
            <div class="large-12 columns">

                <div class="row">
                    <div class="large-10 large-offset-1 columns">
                        <h3>Pending Pull Requests (<?php include '../backend/GetPendingPullRequestCount.php'; ?>)</h3>
                    </div>
                </div>

                <!-- View of Pending Pull Requests Section -->
                
                <div class="row">
                    <div class="large-10 large-offset-1 columns" id="pending_pull_results">
                        <?php include '../backend/DisplayPendingPullRequests.php'; ?>

                        <!-- Dummy Data -->
<!--                         <div class="admin_pull_results panel clearfix" id="pull_request_idnumber" data-pull-id="xx">
                            <div class="left pull_request_title"><b>PULL REQUEST NAME</b>
                                <div class="date_created">DATE CREATED: MM-DD-YYYY</div>
                                <div class="delivery_date">DELIVERY DATE: MM-DD-YYYY</div>
                            </div>
                            <div class="left notes">NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES </div>
                            
                            <div id="accept_pull_request_button" class="button right">Accept</div>
                            <div id="reject_pull_request_button" class="button right">Reject</div>
                        </div> -->
                        <!-- End Dummy Data -->

                    </div>
                </div>
                <!-- End View of Pending Pull Requests Section -->


            </div>
        </div>

        <!-- Accept Pull Request Modal -->
        <div class='reveal-modal' id='accept-request-modal' data-reveal>

            <div class="modal_instructions">
                <b>To Accept the Pull Request</b> <br>
                Enter the rental fee for these items and any notes
            </div>

            <div class="row">
                <div class="accept_request_box large-12 columns">

                    <div class="row">
                        <div class="large-12 columns">
                            <input type="text" name="rentalfee" id="rental_fee" placeholder="Rental Fee" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-12 columns">
                            <textarea id="pull_request_notes" placeholder="Notes (Optional)"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-12 columns">
                            <div class="button success right" id="accept_pull_request_button">Accept Pull Request</div>

                            <div class="button alert right cancel_modal_button">Cancel</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End Accept Pull Request Modal -->

        <!-- Reject Pull Request Modal -->
        <div class='reveal-modal' id='reject-request-modal' data-reveal>

            <div class="modal_instructions">
                <b>To Reject the Pull Request</b> <br>
                Enter the reason for rejection
            </div>

            <div class="row">
                <div class="reject_request_box large-12 columns">

                    <div class="row">
                        <div class="large-12 columns">
                            <input type="text" name="rejectreason" id="reject_reason" placeholder="Reason" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-12 columns">
                            <div class="button alert right" id="reject_pull_request_button">Reject Pull Request</div>

                            <div class="button right cancel_modal_button">Cancel</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End Accept Pull Request Modal -->

    <script>
        $(document).foundation();
    </script>
    </body>

</html>
