<!DOCTYPE html>
<?php 
session_start();
// require_once '../backend/login.php'; 
?>

<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>California Musical Theatre | Costume Inventory System</title>

        <!-- Required header files -->
        <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
        <script src="../lib/js/shipping_info.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/forms.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/shipping_info.css" type="text/css">


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

        <div class="welcome">
            Please enter your billing information, shipping information, and contact information.<br>
            After this step, you must confirm your pull request order and information that you entered before the pull request is sent.
        </div>
    <div class="row">

        <div class="large-4 large-offset-2 columns">
            <div class="form-box">
                <div class="row">
                    <div class="large-12 columns">
                        Enter your Billing information: <br> 

                        Billing Attn: <br> 
                        Billing Address: <br> 
                        Billing City: <br> 
                        Billing State: <br> 
                        Billing Zip Code: <br> 
                        Billing Country: 
                            
                    </div>
                </div>
            </div>
        </div>

        <div class="large-4 columns">
            <div class="form-box">
                <div class="row">
                    <div class="large-12 columns">
                        Enter your Shipping information: <br> 

                        Shipping Attn: <br> 
                        Shipping Address: <br> 
                        Shipping City: <br> 
                        Shipping State: <br> 
                        Shipping Zip Code: <br> 
                        Shipping Country: 

                    </div>
                </div>
            </div>
        </div>

    </div>

<!--         <div class="login large-3 large-centered columns">
            <div class="login-box">
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
        </div> -->
    

    <script>
        $(document).foundation();
    </script>
    </body>

</html>