<?php
    include '../backend/checkIfLoggedIn.php';
    include '../backend/checkAdmin.php';
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Costume Inventory System | Edit Profile</title>

      <!-- Required header files -->
      <!-- Foundation Javascript -->
      <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
      <!-- End Foundation Javascript-->
      <script src="../lib/js/logout.js" type="text/javascript"></script>
      <script src="../lib/js/edit_profile.js" type="text/javascript"></script>

      <!-- Foundation CSS -->
      <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
      <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
      <!-- End Foundation CSS -->
      <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
      <link rel="stylesheet" href="../lib/css/forms.css" type="text/css">
      <link rel="stylesheet" href="../lib/css/edit_profile.css" type="text/css">

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

      <div class="tabs-row row">

         <!-- Side navigation of Tabs -->
         <ul class="tabs vertical" data-tab>
            <li class="tab-title active"><a href="#edit_profile_panel">Edit Profile Information</a></li>
            <li class="tab-title"><a href="#edit_shipping_panel">Edit Shipping Information</a></li>
            <li class="tab-title"><a href="#edit_billing_panel">Edit Billing Information</a></li>
         </ul>
         <!-- End Side navigation of Tabs -->

         <!-- Edit Profile Content -->
         <div class="tabs-content">
            <div class="content active" id="edit_profile_panel">
               <div class="large-3 large-offset-1 columns">
                  <!-- Display Profile Information -->
                  <div class="form-box">
                     <div id="edit_profile_success" class="hide">Editted!</div>
                     <div class="form_title">Edit Profile</div>
                     <div class="account_info">
                        <?php include '../backend/DisplayProfile.php';?>
                     </div>
                  </div>
                  <!-- End Display Profile Information -->
               </div>

               <!-- Edit Profile Information Form -->
               <div class="large-3 columns">
                  <div class="form-box">
                     <div class="row">
                        <div class="edit_profile_box large-12 columns">

                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="firstname" id="update_firstname" placeholder="First Name" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="lastname" id="update_lastname" placeholder="Last Name" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="Company" id="update_company" placeholder="Company" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="email" id="update_email" placeholder="E-mail" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="phone" id="update_phone" placeholder="Phone" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="fax" id="update_fax" placeholder="Fax" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="password" name="password" id="update_password" placeholder="Password" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 large-centered columns">
                                 <input type="submit" class="button expand" id="update_profile" value="Update Profile"/>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Edit Profile Information Form -->
            </div>
            <!-- End Edit Profile Content -->

            <!-- Edit Shipping Content -->
            <div class="content" id="edit_shipping_panel">
               <div class="large-3 large-offset-1 columns">
                  <!-- Display User Shipping Information -->
                  <div class="form-box">
                     <div id="edit_profile_success" class="hide">Editted!</div>
                     <div class="form_title">Edit Shipping</div>
                     <div class="account_info">
                        <?php include '../backend/DisplayShippingAddress.php'; ?>
                     </div>
                  </div>
                  <!-- End Display User Shipping Information -->
               </div>

               <!-- Edit Shipping Information Form -->
               <div class="large-3 columns">
                  <div class="form-box">
                     <div class="row">
                        <div class="update_shipping_box large-12 columns">
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="updateshippingname" id="update_shipping_name" placeholder="Shipping Attn" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="updateshippingaddress" id="update_shipping_address" placeholder="Shipping Address" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="updateshippingcity" id="update_shipping_city" placeholder="Shipping City" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="updateshippingstate" id="update_shipping_state" placeholder="Shipping State" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="updateshippingzip" id="update_shipping_zip" placeholder="Shipping Zip Code" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="updateshippingcountry" id="update_shipping_country" placeholder="Shipping Country" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 large-centered columns">
                                 <div class="button expand" id="update_shipping_button">Update Shipping Information</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Edit Shipping Information Form -->
            </div>
            <!-- End Edit Shipping Content -->

                <div class="content" id="edit_billing_panel">

                    <div class="large-3 large-offset-1 columns">
                        <div class="form-box">
                            <div id="edit_profile_success" class="hide">Editted!</div>
                            <div class="form_title">Edit Billing</div>
                            <div class="account_info">
                                <?php include '../backend/DisplayBillingAddress.php'; ?>
                            </div>
                        </div>
                    </div>

                        <div class="large-3 columns">
                            <div class="form-box">
                                <div class="row">
                                    <div class="update_billing_box large-12 columns">
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="updatebillingname" id="update_billing_name" placeholder="Billing Attn" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="updatebillingaddress" id="update_billing_address" placeholder="Billing Address" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="updatebillingcity" id="update_billing_city" placeholder="Billing City" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="updatebillingstate" id="update_billing_state" placeholder="Billing State" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="updatebillingzip" id="update_billing_zip" placeholder="Billing Zip Code" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="updatebillingcountry" id="update_billing_country" placeholder="Billing Country" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 large-centered columns">
                                                <div class="button expand" id="update_billing_button">Update Billing Information</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>

    <script>
        $(document).foundation();
    </script>
    </body>

</html>