<?php
    include '../backend/checkLoginAtIndex.php';
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>California Musical Theatre | Costume Inventory System</title>

      <!-- Required header files -->

      <!-- Foundation Javascript -->
      <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
      <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
      <!-- End Foundation Javascript-->
      <script src="../lib/js/login.js" type="text/javascript"></script>
      <script src="../lib/js/registration.js" type="text/javascript"></script>
      <script src="../lib/js/index.js" type="text/javascript"></script>

      <!-- Foundation CSS -->
      <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
      <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
      <!-- End Foundation CSS -->
      <link rel="stylesheet" href="../lib/css/forms.css" type="text/css">
      <link rel="stylesheet" href="../lib/css/main.css" type="text/css">

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
         </ul>

         <section class="top-bar-section">

            <!-- Right Nav Section -->
            <ul class="right">
               <li class="has-form">
                  <a href="search_page.php" class="button alert">Search Inventory</a>
               </li>
               <li class="has-form">
                  <div id="register_tab" class="button">Register</div>
               </li>
               <li class="has-form">
                  <div id="login_tab" class="button">Login</div>
               </li>
            </ul>
            <!-- End Right Nav Section -->
         </section>

      </nav>
      <!-- End Top Navigation -->

      <!-- Welcome Message -->
      <div class="welcome">
         <h1 class="text-center">Welcome to the California Musical Theatre Inventory System!</h1>
         <p class="text-center">
            You may <b>Log In</b> here.<br>
            Click on <b>Register</b> to create an account.<br>
            Click on <b>Search Inventory</b> to view costumes you can rent.
         </p>
      </div>
      <!-- End Welcome Message -->

      <!-- Registration Form -->
      <?php
         if(!empty($_GET['form'])){
            if($_GET['form'] == "register"){
      ?>
               <div class="registration large-3 large-centered columns">
      <?php
            }
         }
         else{          
      ?>
            <div class="hide registration large-3 large-centered columns">
      <?php 
         } 
      ?>
                  <div id="registration_box" class="form-box">
                     <div class="row">
                        <div class="large-12 columns">
                           Registration
                           <form id="myForm" data-abide="ajax">
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="firstname" id="signup_firstname" placeholder="First Name" required />
                                 <small class="error">Name is required and must be a string.</small>
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="lastname" id="signup_lastname" placeholder="Last Name" required />
                                 <small class="error">Name is required and must be a string.</small>
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="Company" id="signup_company" placeholder="Company" required />
                                 <small class="error">Name is required and must be a string.</small>
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="email" id="signup_email" placeholder="E-mail" required />
                                 <small class="error">Name is required and must be a string.</small>
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="phone" id="signup_phone" placeholder="Phone" required />
                                 <small class="error">Name is required and must be a string.</small>
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="fax" id="signup_fax" placeholder="Fax" required />
                                 <small class="error">Name is required and must be a string.</small>
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="text" name="username" id="signup_username" placeholder="Username" required />
                                 <small class="error">Name is required and must be a string.</small>
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 columns">
                                 <input type="password" name="password" id="signup_password" placeholder="Password" required />
                                 <small class="error">Name is required and must be a string.</small>
                              </div>
                           </div>
                           <div class="row">
                              <div class="large-12 large-centered columns">
                                 <button type="submit" class="button expand" id="register_button">Register</button>
                                 <!-- <div class="button expand" id="register_button">Register</div> -->
                              </div>
                           </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
      <!-- End Registration Form -->

      <!-- Login Form -->
      <?php
         if(!empty($_GET['form'])){
            if($_GET['form'] == "register"){
      ?>
               <div class="hide login large-3 large-centered columns">
      <?php
            }
         }
         else{          
      ?>
            <div class="login large-3 large-centered columns">
      <?php 
         } 
      ?>
         <div class="form-box">
            <div class="row">
               <div class="large-12 columns">
                  Login
                  <div class="row">
                     <div class="large-12 columns">
                        <input type="text" name="username" id="login_username" placeholder="Username" />
                     </div>
                  </div>
                  <div class="row">
                     <div class="large-12 columns">
                        <input type="password" name="password" id="login_password" placeholder="Password" />
                     </div>
                  </div>
                  <div class="row">
                     <div class="large-12 large-centered columns">
                        <input type="submit" class="button expand" id="login_button" value="Log In"/>
                     </div>
                  </div>
                  <a href="forgot_password.php" class="button expand">Forgot Password?</a>
               </div>
            </div>
         </div>
      </div>
      <!-- End Login Form -->

      <script>
         $(document).foundation();
      </script>
   </body>
</html>