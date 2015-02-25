<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CMT | Costume Inventory System | Dashboard</title>

        <!-- Required header files -->
        <script src="../lib/foundation/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/vendor/modernizr.js" type="text/javascript"></script>
        <script src="../lib/foundation/js/foundation.min.js" type="text/javascript"></script>
        <script src="../lib/js/logout.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
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
                        <a href="#2">Current Order Status</a>
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



        <div class="row">
            <div class="large-1 columns">
                <ul class="side-nav">
                    <li class="active"><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                </ul>
            </div>
<!--             <div class="large-11 columns">
                <input type="text" placeholder="Find Stuff">
                <a href="#" class="alert button expand">Search</a>
            </div> -->
        </div>
<!--             <div class="row collapse">
                <div class="large-8 small-9 columns">
                    <input type="text" placeholder="Find Stuff">
                </div>
                <div class="large-4 small-3 columns">
                    <a href="#" class="alert button expand">Search</a>
                </div>
            </div> -->


    <script>
        $(document).foundation();
    </script>
    </body>

</html>