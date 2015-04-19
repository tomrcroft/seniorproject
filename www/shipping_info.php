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
        <script src="../lib/js/edit_profile.js" type="text/javascript"></script>
        <script src="../lib/js/shipping_info.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/forms.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        
        <link rel="stylesheet" href="../lib/css/shipping_info.css" type="text/css">
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
                        <div class="form_title">Shipping Information</div>
                        <div class="account_info">
                            <?php include '../backend/DisplayShippingAddress.php'; ?>
                        </div>
<!--                         Shipping Attn: <br> 
                        Shipping Address: <br> 
                        Shipping City: <br> 
                        Shipping State: <br> 
                        Shipping Zip Code: <br> 
                        Shipping Country: <br> -->

                        <div id="update_shipping_modal_button" class="button right">Update Shipping Information</div>

                    </div>
                </div>
            </div>
        </div>

        <div class="large-4 columns">
            <div class="form-box">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="form_title">Billing Information</div>
                        <div class="account_info">
                            <?php include '../backend/DisplayBillingAddress.php'; ?>
                        </div>
<!--                         Billing Attn: <br> 
                        Billing Address: <br> 
                        Billing City: <br> 
                        Billing State: <br> 
                        Billing Zip Code: <br> 
                        Billing Country: <br> -->

                        <div id="update_billing_modal_button" class="button right">Update Billing Information</div>
                        
                            
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="large-8 large-centered columns">
            <div class="button right" id="submit_pull_request_button">Submit Pull Request</div>
            <div class="button right" id="go_back">Go Back</div>
        </div>
    </div>

    <div class='reveal-modal' id='shipping-modal' data-reveal>
        Edit Shipping Information:
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
                <div class="large-12 columns">
                    <div class="button right" id="update_shipping_button">Update Shipping Information</div>

                    <div class="button right cancel_update">Cancel</div>
                </div>
            </div>


        </div>
    </div>

    <div class='reveal-modal' id='billing-modal' data-reveal>
        Edit Billing Information:
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
                <div class="large-12 columns">
                    <div class="button right" id="update_billing_button">Update Billing Information</div>

                    <div class="button right cancel_update">Cancel</div>
                </div>
            </div>

        </div>
    </div>
    

    <script>
        $(document).foundation();
    </script>
    </body>

</html>