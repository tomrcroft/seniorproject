<?php
    include '../backend/checkIfLoggedIn.php';
    include '../backend/checkAdmin.php';
    if(!checkIfAdmin($_SESSION['login_user']))
        header ("Location: ../www/index.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Costume Inventory System | Administrator | Pending Pull Requests</title>

        <!-- Required header files -->
        <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
        <script src="../lib/js/logout.js" type="text/javascript"></script>
        <script src="../lib/js/view_pending_request.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/view_pending_request.css" type="text/css">

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
                <ul class="left">
                    <li class="divider"></li>
                    <li>
                        <a href="add_administrator.php">Add Administrator</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="pending_requests.php">Pending Pull Requests (#)</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="view_master_records.php">View Master Records</a>
                    </li>
                    <li class="divider"></li>
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

        <div class="row">    

            <!-- Pull Request View -->
            <div class="large-12 columns">

                <div class="row">
                    <div class="large-10 large-offset-1 columns">
                        <h3>Pull Request for Company (ID #)?</h3>
                    </div>
                </div>

                <!-- Pull Request Items IMAGE, NAME, DESCRIPTION, LOCATION-->
                <div class="row">
                    <div class="large-10 large-offset-1 columns" id="pending_pull_results">
                <table>
                    <thead>
                        <tr>
                        <th width="25%">Item Image</th>
                        <th width="25%">Item Name</th>
                        <th width="30%">Item Description</th>
                        <th width="20%">Item Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Content Goes Here</td>
                            <td><h4><a href="inventory_page.php?idnumber=xx">Item Name</a></h4></td>
                            <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                        </tr>
                         <tr>
                            <td>Content Goes Here</td>
                            <td><h4><a href="inventory_page.php?idnumber=xx">Item Name</a></h4></td>
                            <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                        </tr>
                         <tr>
                            <td>Content Goes Here</td>
                            <td><h4><a href="inventory_page.php?idnumber=xx">Item Name</a></h4></td>
                            <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                        </tr>
                    </tbody>
                </table>
                    </div>
                </div>


            </div>

    <script>
        $(document).foundation();
    </script>
    </body>

</html>