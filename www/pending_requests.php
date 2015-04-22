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

        <title>Costume Inventory System | Administrator Dashboard</title>

        <!-- Required header files -->
        <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
        <script src="../lib/js/logout.js" type="text/javascript"></script>
        <script src="../lib/js/pending_requests.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/pending_requests.css" type="text/css">

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

            <!-- Pending Pull Requests View -->
            <div class="large-12 columns">

                <div class="row">
                    <div class="large-10 large-offset-1 columns">
                        <h3># Pending Pull Requests</h3>
                    </div>
                </div>

                <!-- Records Results Section -->
                <div class="row">
                    <div class="large-10 large-offset-1 columns" id="pending_pull_results">

                        <div class="admin_pull_results panel clearfix" id="pull_request_idnumber" data-pull-id="xx">
                            <div class="left" id="pull_request_title">PULL REQUEST NAME
                                <div class="date_created">DATE CREATED: MM-DD-YYYY</div>
                            </div>
                            
                            <div id="accept_pull_request_button" class="button right">Accept</div>
                            <div id="reject_pull_request_button" class="button right">Reject</div>
                        </div>

                        <div class="admin_pull_results panel clearfix" id="pull_request_idnumber" data-href="view_pending_request.php?idnumber=xx">
                            <div class="left" id="pull_request_title">PULL REQUEST NAME
                                <div class="date_created">DATE CREATED: MM-DD-YYYY</div>
                            </div>
                            
                            <div id="accept_pull_request_button" class="button right">Accept</div>
                            <div id="reject_pull_request_button" class="button right">Reject</div>
                        </div>

                        <div class="admin_pull_results panel clearfix" id="pull_request_idnumber" data-href="view_pending_request.php?idnumber=xx">
                            <div class="left" id="pull_request_title">PULL REQUEST NAME
                                <div class="date_created">DATE CREATED: MM-DD-YYYY</div>
                            </div>
                            
                            <div id="accept_pull_request_button" class="button right">Accept</div>
                            <div id="reject_pull_request_button" class="button right">Reject</div>
                        </div>

                    </div>
                </div>


            </div>

    <script>
        $(document).foundation();
    </script>
    </body>

</html>