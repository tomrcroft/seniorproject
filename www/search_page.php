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
                        <div class="button" id="logout_button" value="Logout">Logout</div>
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


            <div class="large-10 push-2 columns">
                <div class="row" id="search_results">

                    <div class="inventory_image large-4 small-6 columns">
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

                            <img src="../lib/images/costumes/costume3.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="add_item button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">

                            <img src="../lib/images/costumes/costume4.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="add_item button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume5.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Unavailable</h5>
                            <h6 class="subheader">$000.00</h6>
                            <div class="add_item button">Add Item</div>
                        </div>
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume6.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Unavailable</h5>
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
                    </div>

                    <div class="inventory_image large-4 small-6 columns">
                        <img src="../lib/images/costumes/costume8.jpg">

                        <div class="panel">
                            <h5>Item Name</h5>
                            <h5>Rental Status: Available</h5>
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
                    </div>
                </div>
            </div>

            <div class="large-2 pull-10 columns">
                <ul class="side-nav" id="facets">
                    <li class="facet-category" id="age-facet">
                        <label>Age</label>
                        <li><input id="adult_facet" type="checkbox" value="adult"><label for="adult_facet">Adult</label></li>
                        <li><input id="child_facet" type="checkbox" value="child"><label for="child_facet">Child</label></li>
                    </li>
                    <li class="facet-category" id="gender-facet">
                        <label>Gender</label>
                        <li><input id="male_facet" type="checkbox" value="male"><label for="male_facet">Male</label></li>
                        <li><input id="female_facet" type="checkbox" value="female"><label for="female_facet">Female</label></li>
                    </li>
                    <li class="facet-category" id="price-facet">
                        <label>Rental Fee</label>
                        <li><input id="pricefacet_less25" type="checkbox" value="less25"><label for="pricefacet_less25">Less Than $25.00</label></li>
                        <li><input id="pricefacet_50" type="checkbox" value="25-50"><label for="pricefacet_50">$25.00 - $50.00</label></li>
                    </li>
                    <li class="facet-category" id="group-facet">
                        <label>Costume Group</label>
                        <li><input id="group_facet1" type="checkbox" value="group1"><label for="group_facet1">Into the Woods</label></li>
                        <li><input id="group_facet2" type="checkbox" value="group2"><label for="group_facet2">Ballet</label></li>
                    </li>

                    <li><div class="button" id="filter_button">Filter</div></li>
                </ul>

                <p><img src="http://placehold.it/320x240&text=Ad" /></p>
            </div>
        </div>

    <script>
        $(document).foundation();
    </script>
    </body>

</html>