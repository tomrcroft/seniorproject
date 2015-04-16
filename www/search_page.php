<?php session_start();?>
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
        <script src="../lib/js/logout.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
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
                    <div class="row collapse">
                        <div class="large-8 small-9 columns">
                            <input type="text" id="search_term" placeholder="Search Inventory Database">
                        </div>
                        <div class="large-4 small-3 columns">
                            <input class="alert button expand" id="search_page_form" value="Search"></input>
                        </div>
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

<!--         <div class="row collapse">
            <div class="large-8 small-9 columns">
                <input type="text" id="search_term" placeholder="Search Inventory Database">
            </div>
            <div class="large-4 small-3 columns">
                <input class="alert button postfix" id="search_page_form" value="Search"></input>
            </div>
        </div> -->

        <div class="row">    
     
            <!-- Main Content Section -->
            <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
            <div class="large-10 push-2 columns">
                <div class="row" id="search_results">
                    <?php
                    if(!empty($_GET['status'])){
                        echo  'You have been logged out';
                    }
                    ?>   
                    <p> 
                        There are no results to display.<br>
                        You may search costumes by name in the <b>Search Form</b> in the top bar.
                    </p>
<!--                     <div class="inventory_image large-4 small-6 columns">
                            <img src="../lib/images/costumes/18.jpg">
                        <div class="panel clearfix centered">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="add_item button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">

                            <img src="../lib/images/costumes/costume2.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Unavailable</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="add_item button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume9.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="add_item button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume10.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="add_item button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume11.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="add_item button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume12.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="add_item button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="http://placehold.it/320x240&text=Item">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="add_item button">Add Item</div>
                        </div>
                    </div> -->
                </div>
            </div> 
            
            <div class="filter-facets large-2 pull-10 columns">
                <!-- include search filter php file -->
                <!-- <div class="button" id="filter_button">Filter</div> -->
                <!-- where php ends -->
                <p><img src="http://placehold.it/320x240&text=Ad" /></p>
            </div>
            
        </div>

    <script>
        $(document).foundation();
    </script>
    </body>

</html>