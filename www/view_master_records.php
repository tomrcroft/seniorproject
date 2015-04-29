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

        <title>Costume Inventory System | Administrator Dashboard</title>

        <!-- Required header files -->
        <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
        <script src="../lib/js/logout.js" type="text/javascript"></script>
        <script src="../lib/js/view_master_records.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/view_master_records.css" type="text/css">

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
            <div class="large-12 columns">
                
                <!-- 
                Search Records Form
                Consider Putting Search form in line with text. Do not have time to put that there now 
                -->
                <!-- <form> -->
                <div class="row">
                    <div class="large-12 columns" id="search_user_form">
                        <h3 class="text-center">Search records by <b>Company</b> name</h3>
                        <div class="row collapse">
                            <div class="large-6 small-10 large-offset-2 columns">
                                <input type="text" name="company" id="search_company" placeholder="Search for records by Company" />
                                <!-- <small class="error">Alphanumeric characters only.</small> -->
                            </div>
                            <div class="large-2 small-2 columns left">
                              <!-- <button type="submit" name="companySearch" class="button postfix">Search</button> -->
                                <div id="find_records_button" class="button postfix">Search</div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- </form> -->

                <!-- Records Results Section -->
                <?php// if(isset($_POST['companySearch'])){?>
                <div class="row">
                    <div class="large-4 large-offset-1 columns" id="pull_records_results">

<!--                         <div class="admin_pull_results panel" data-pull-id="1">
                            <h5>PULL REQUEST NAME</h5> 
                            DATE MODIFIED: MM-DD-YYYY
                        </div>
                        <div class="admin_pull_results panel" id="pull_request_2">
                            <h5>PULL REQUEST NAME</h5> 
                            DATE MODIFIED: MM-DD-YYYY
                        </div> -->

                    </div>
                    <div class="large-4 large-offset-2 columns left" id="invoice_records_results">
<!--                         <h5>COMPANYNAME View Invoice Records for USER (2 Results)</h5>
                        <div class="admin_invoice_results panel" id="pull_request_1">
                            <h5>INVOICE NAME</h5> 
                            DATE MODIFIED: MM-DD-YYYY
                        </div>
                        <div class="admin_invoice_results panel" id="pull_request_2">
                            <h5>INVOICE NAME</h5> 
                            DATE MODIFIED: MM-DD-YYYY
                        </div> -->

                    </div>
                </div>


            </div>

    <script>
        $(document).foundation();
    </script>
    </body>

</html>