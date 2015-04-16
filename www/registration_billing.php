<!DOCTYPE html>
<?php 
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
        <script src="../lib/js/registration.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/forms.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">

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

            </section>
        </nav>

        <div class="welcome">
            Costume Inventory<br>
            Welcome to the California Musical Theatre Inventory System.<br>
            <h2 class="text-center">Billing Information</h2>
            <p class="text-center">
            Please <b>continue your registration</b> be entering your <b>Billing information:</b> <br>
            <i>This information may be editted later.</i> 
            </p>
        </div>

        <div class="row">
            <div class="large-3 large-centered columns">
                <div id="registration_billing" class="form-box">
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="billingname" id="billing_name" placeholder="Billing Attn" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="billingaddress" id="billing_address" placeholder="Billing Address" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="billingcity" id="billing_city" placeholder="Billing City" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="billingstate" id="billing_state" placeholder="Billing State" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="billingzip" id="billing_zip" placeholder="Billing Zip Code" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="billingcountry" id="billing_country" placeholder="Billing Country" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="large-12 large-centered columns">
                                    <div class="button expand" id="submit_billing_info_button">Submit Billing Information</div>
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