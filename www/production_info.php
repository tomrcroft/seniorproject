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
        <script src="../lib/js/production_info.js" type="text/javascript"></script>

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
            <h2 class="text-center">Production Information</h2>
            <p class="text-center">
            Please <b>continue your pull request</b> by entering your <b>Production Information:</b> <br>
            </p>
        </div>

        <div class="row">
            <div class="large-3 large-centered columns">
                <div id="production_info" class="form-box">
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="productionname" id="production_name" placeholder="Production Name" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="deliverydate" id="delivery_date" placeholder="Delivery Date (YYYY-MM-DD)" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="productionopendate" id="production_open_date" placeholder="Production Open Date (YYYY-MM-DD)" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="productionclosedate" id="production_close_date" placeholder="Production Close Date (YYYY-MM-DD)" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="dateofreturn" id="date_of_return" placeholder="Expected Date of Return" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="notes" id="notes" placeholder="Notes" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="large-12 large-centered columns">
                                    <div class="button expand" id="submit_production_info_button">Submit Production Information</div>
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