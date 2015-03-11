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
                    <li>
                        <a href="#">Make a Pull Request</a>
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
                        <form method="GET">
                            <input type="submit" class="button" id="logout_button" value="Logout"></input>
                        </form>
                    </li>
                </ul>
            </section>
        </nav>

        <div class="row collapse">
            <div class="large-8 small-9 columns">
                <input type="text" id="search_term" placeholder="Search Inventory Database">
            </div>
            <div class="large-4 small-3 columns">
                <input class="alert button expand postfix" id="search_page_form" value="Search"></input>
            </div>
        </div>

        <div class="row">    

            <!-- Main Content Section -->
            <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->


            <div class="large-9 push-3 columns">
                <div class="row">

                    <div class="thumbnail large-4 small-6 columns">
                            <img src="../lib/images/costumes/costume1.jpg">
                        <div class="panel clearfix centered">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="thumbnail large-4 small-6 columns">

                            <img src="../lib/images/costumes/costume2.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Unavailable</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">

                            <img src="../lib/images/costumes/costume3.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">

                            <img src="../lib/images/costumes/costume4.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume5.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Unavailable</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume6.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Unavailable</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume7.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume8.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume9.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume10.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume11.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume12.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume13.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="button">Add Item</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="large-3 pull-9 columns">
                <ul class="side-nav">
                    <li><a href="#">Section 1</a></li>
                    <li><a href="#">Section 2</a></li>
                    <li><a href="#">Section 3</a></li>
                    <li><a href="#">Section 4</a></li>
                    <li><a href="#">Section 5</a></li>
                    <li><a href="#">Section 6</a></li>
                </ul>

                <p><img src="http://placehold.it/320x240&text=Ad" /></p>
                </div>
            </div>

    <script>
        $(document).foundation();
    </script>
    </body>

</html>