<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CMT | Costume Inventory System | Inventory Page</title>

        <!-- Required header files -->
        <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
        <script src="../lib/js/logout.js" type="text/javascript"></script>
        <script src="../lib/js/inventory_page.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/inventory_page.css" type="text/css">

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
                    <?php session_start();
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
                        <div class="row collapse">
                            <li class="has-form">
                                <a href="search_page.php" class="button alert">Search Inventory</a>
                            </li>
                        </div>
                    </li>
                    <?php
                        if(isset($_SESSION['login_user'])) { 
                    ?>
                    <li class="has-form">
                        <div class="button" id="logout_button" value="Logout">Logout</div>
                    </li>
                    <?php 
                    }
                        else { 
                    ?>
                    <li class="has-form">
                        <a href="index.php" class="button">Register</a>
                    </li>
                    <li class="has-form">
                        <a href="index.php" class="button">Login</a>
                    </li>
                    <?php 
                        }
                    ?>
                </ul>
            </section>
        </nav>

        <div class="row">    

            <!-- Main Content Section -->
            <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
            <?php include '../backend/itemView.php';?>
            
            <!-- Nav Sidebar -->
            <!-- This is source ordered to be pulled to the left on larger screens -->
            <div class="large-3 pull-9 columns">

            <p><img src="http://placehold.it/320x240&text=Ad" /></p>

            </div>
        </div>


        <!-- Footer -->

        <footer class="row">
        <div class="large-12 columns">
        <hr />
        <div class="row">
        <div class="large-6 columns">
        <p>&copy; Copyright no one at all. Go to town.</p>
        </div>
        <div class="large-6 columns">
        <ul class="inline-list right">
        <li><a href="#">Section 1</a></li>
        <li><a href="#">Section 2</a></li>
        <li><a href="#">Section 3</a></li>
        <li><a href="#">Section 4</a></li>
        </ul>
        </div>
        </div>
        </div> 
        </footer>

    <script>
        $(document).foundation();
    </script>
    </body>

</html>