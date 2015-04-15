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
        <script src="../lib/js/shipping_info.js" type="text/javascript"></script>

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
                </ul>

            </section>
        </nav>

        <div class="welcome">
            Please enter your billing information, shipping information, and contact information.<br>
            After this step, you must confirm your pull request order and information that you entered before the pull request is sent.
        </div>
    <div class="row">

        <div class="large-4 columns">
            <div class="form-box">
                <div class="row">
                    <div class="large-12 columns">
                        Enter your Billing information: 
                            
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
                    </div>
                </div>
            </div>
        </div>

        <div class="large-4 columns">
            <div class="form-box">
                <div class="row">
                    <div class="large-12 columns">
                        Enter your Shipping information: 
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
                                <div class="large-12 columns">
                                    <input type="text" name="pickupdate" id="pickup_date" placeholder="Pickup Date" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="returndate" id="return_date" placeholder="Expected Return Date" />
                                </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="large-4 columns">
            <div class="form-box">
                <div class="row">
                    <div class="large-12 columns">
                        Enter your Contact information: 
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="contactproduction" id="contact_production" placeholder="Production" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="contactcode" id="contact_code" placeholder="Code" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="contactname" id="contact_name" placeholder="Name" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="contactemail" id="contact_email" placeholder="E-mail" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="contactphone" id="contact_phone" placeholder="Phone" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="contactfax" id="contact_fax" placeholder="Fax" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="contactbilling" id="contact_billing" placeholder="Billing" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="paymenttype" id="payment_type" placeholder="Payment Type" />
                                </div>
                            </div>
                           <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="contactdescription" id="contact_description" placeholder="Description" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="contactsalesperson" id="contact_salesperson" placeholder="Salesperson" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="rentalfee" id="rental_fee" placeholder="Rental Fee" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="large-12 large-centered columns">
                                    <div class="button expand" id="submit_info_button">Submit Information</div>
                                </div>
                            </div>
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