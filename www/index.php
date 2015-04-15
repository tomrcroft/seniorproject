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
        <script src="../lib/js/login.js" type="text/javascript"></script>
        <script src="../lib/js/registration.js" type="text/javascript"></script>
        <script src="../lib/js/index.js" type="text/javascript"></script>

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
            <p class="text-center">
            You may <b>Log In</b> here.<br>
            Click on <b>Register</b> to create an account.<br>
            Click on <b>Search Inventory</b> to view costumes you can rent.
            </p>
        </div>

        <div class="registration large-3 large-centered columns">
            <div class="form-box">
                <div class="row">
                    <div class="large-12 columns">
                        Registration
                        <form method="POST">
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="firstname" id="signup_firstname" placeholder="First Name" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="lastname" id="signup_lastname" placeholder="Last Name" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="Company" id="signup_company" placeholder="Company" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="email" id="signup_email" placeholder="E-mail" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="username" id="signup_username" placeholder="Username" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="password" name="password" id="signup_password" placeholder="Password" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 large-centered columns">
                                    <input type="submit" class="button expand" id="register_button" value="Register"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="login large-3 large-centered columns">
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
    

    <script>
        $(document).foundation();
    </script>
    </body>

</html>