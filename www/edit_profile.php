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
        <link rel="stylesheet" href="../lib/css/edit_profile.css" type="text/css">

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

        <div class="row">

            <ul class="tabs vertical" data-tab>
                <li class="tab-title active"><a href="#edit_profile_panel">Edit Profile Information</a></li>
                <li class="tab-title"><a href="#edit_shipping_panel">Edit Shipping Information</a></li>
                <li class="tab-title"><a href="#edit_billing_panel">Edit Billing Information</a></li>
            </ul>
            <div class="tabs-content">
                <div class="content active" id="edit_profile_panel">

                    <div class="large-3 large-offset-1 columns">
                        <div class="form-box">
                            <div id="edit_profile_success" class="hide">Editted!</div>
                                <div class="form_title">Edit Profile</div>
                                <div class="account_info">
                                    <?php include '../backend/DisplayProfile.php';?>
                                </div>
                        </div>
                    </div>

<!--                 <div class="large-3 large-offset-1 columns">
                        <div class="form-box">
                            <div id="edit_profile_success" class="hide">Editted!</div>
                                <div class="form_title">Edit Profile</div>
                                <div class="account_info">
                                    <div id="account_username">Username: </div>
                                    <div id="account_first_name">First Name: </div>
                                    <div id="account_last_name">Last Name: </div>
                                    <div id="account_company">Company: </div>
                                    <div id="account_email">E-mail: </div>
                                    <div id="account_phone">Phone: </div>
                                    <div id="account_fax">Fax: </div>
                                </div>
                        </div>
                    </div> -->

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
                </div>
                <div class="content" id="edit_shipping_panel">

                    <div class="row">
                        <div class="large-3 large-centered columns">
                            <div id="registration_shipping" class="form-box">
                                <div class="row">
                                    <div class="large-12 columns">
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="shippingname" id="shipping_name" placeholder="Shipping Attn" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="shippingaddress" id="shipping_address" placeholder="Shipping Address" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="shippingcity" id="shipping_city" placeholder="Shipping City" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="shippingstate" id="shipping_state" placeholder="Shipping State" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="shippingzip" id="shipping_zip" placeholder="Shipping Zip Code" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <input type="text" name="shippingcountry" id="shipping_country" placeholder="Shipping Country" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="large-12 large-centered columns">
                                                <div class="button expand" id="submit_shipping_info_button">Submit Shipping Information</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<!--         <div class="registration large-3 large-centered columns">
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
        </div> -->

    <script>
        $(document).foundation();
    </script>
    </body>

</html>