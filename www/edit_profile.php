<?php
    include '../backend/checkIfLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Costume Inventory System | Dashboard</title>

        <!-- Required header files -->
        <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
        <script src="../lib/js/search.js" type="text/javascript"></script>
        <script src="../lib/js/edit_profile.js" type="text/javascript"></script>
        <script src="../lib/js/logout.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/forms.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/search_page.css" type="text/css">

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
                    <?php
                        if(isset($_SESSION['login_user'])) { 
                    ?>
                        <li class="has-dropdown">
                            <a href="#">Welcome, <?=$_SESSION['login_user']?>!</a>
                        <ul class="dropdown">
                            <li><a href="edit_profile.php">Edit Profile</a></li>
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
                    <li class="divider"></li>
                    <li>
                        <a href="pull_request_cart.php">Pull Request Cart
                        <?php 
                        if(isset($_SESSION['login_user']))
                            if(count($_SESSION['shopping_cart']) > 0)
                                echo '(' . count($_SESSION['shopping_cart']) . ')';
                        ?></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#1">Pull an entire set</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="order_status.php">Current Order Status</a>
                    </li>
                    <li class="divider"></li>
                </ul>

                <!-- Right Nav Section -->
                <ul class="right">
                    <li class="has-form">
                        <div class="button" id="logout_button" value="Logout">Logout</div>
                    </li>
                </ul>
            </section>
        </nav>

        <div class="registration large-3 large-centered columns">
            <div class="form-box">
                <div class="row">
                    <div class="edit_profile_box large-12 columns">
                        <div id="edit_profile_success" class="hide">Editted!</div>
                        <div class="form_title">Edit Profile</div>
                        <div class="account_info">
                            <div id="account_username">Username: </div>
                            <div id="account_first_name">First Name: </div>
                            <div id="account_last_name">Last Name: </div>
                            <div id="account_email">E-mail: </div>
                            <div id="account_company">Company: </div>
                            
                        </div>

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
                                    <input type="password" name="password" id="update_password" placeholder="Password" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 large-centered columns">
                                    <input type="submit" class="button expand" id="update_button" value="Update Profile"/>
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