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
        <script src="../lib/js/forgot_password.js" type="text/javascript"></script>

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
                        <a href="index.php" class="button">Login</a>
                    </li>
                </ul>
            </section>
        </nav>

        <div class="login large-3 large-centered columns">
            <div class="form-box">
                <div class="row">
                    <div class="large-12 columns">
                    Forgot Password?

                        <form method="post">
                            <div class="row">
                                <div class="large-12 columns">
                                    <input type="text" name="email" id="reset_email" placeholder="E-Mail" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 large-centered columns">

                                    <input type="submit" class="button expand" id="reset_email_button" value="Reset Password"/>

                                </div>
                            </div>
                        </form>
                        <form action="index.php">
                            <div class="row">
                                <div class="large-12 large-centered columns">
                                    <input type="submit" class="button expand" value="Cancel"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script>
        $(document).foundation();
    </script>
    </body>

</html>