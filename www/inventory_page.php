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



        <div class="row collapse">
            <div class="large-8 small-9 columns">
                <input type="text" placeholder="Find Stuff">
            </div>
            <div class="large-4 small-3 columns">
                <a href="#" class="alert button expand">Search</a>
            </div>
        </div>

        <div class="row">    

            <!-- Main Content Section -->
            <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
            <div class="large-9 push-3 columns">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="left inventory_image">
                            <img src="../lib/images/costumes/costume1.jpg" alt="Yoda">
                        </div>
                        INVENTORY DESCRIPTION HERE
                    </div>
                </div>

            <h3>Page Title <small>Page subtitle</small></h3>

            <p>Bacon ipsum dolor sit amet salami ham hock biltong ball tip drumstick sirloin pancetta meatball short loin. Venison tail chuck pork chop, andouille ball tip beef ribs flank boudin bacon. Salami andouille pork belly short ribs flank cow. Salami sirloin turkey kielbasa. Sausage venison pork loin leberkas chuck short loin, cow ham prosciutto pastrami jowl. Ham hock jerky tri-tip, fatback hamburger shoulder swine pancetta ground round. Tri-tip prosciutto meatball turkey, brisket spare ribs shankle chuck cow chicken ham hock boudin meatloaf jowl.</p>

            <p>Ground round pastrami pork loin tenderloin jerky. Jerky spare ribs biltong, ham hock ham capicola pork. Jerky turducken pork, meatloaf sausage capicola swine corned beef turkey short loin. Tongue prosciutto pork loin, ground round spare ribs venison kielbasa strip steak.</p>

            <p>Hamburger bresaola turkey t-bone, leberkas salami pork chop ham hock beef ribs. Rump biltong meatball venison, short ribs pork loin shank shankle corned beef beef. Cow salami jowl short loin hamburger fatback. Short ribs pork belly shoulder pastrami drumstick salami corned beef ham hock bresaola. Swine filet mignon cow sausage ball tip. Cow ribeye ground round, sausage pork loin pig beef ball tip turkey boudin.</p>

            <p>Prosciutto ball tip filet mignon andouille frankfurter chicken rump sausage meatball. Filet mignon meatloaf ground round andouille ham hock pork. Bresaola short loin meatball chuck hamburger pig. Turkey venison chuck, tongue fatback tail swine jerky corned beef shank kielbasa prosciutto ribeye ham tri-tip. Rump bacon pork belly meatloaf shoulder short loin meatball kielbasa pork loin tongue bresaola brisket corned beef jowl prosciutto. Beef ribs shankle short ribs pork belly corned beef fatback pork chop tongue biltong boudin strip steak sirloin meatloaf pancetta.</p>
                
            </div>


            <!-- Nav Sidebar -->
            <!-- This is source ordered to be pulled to the left on larger screens -->
            <div class="large-3 pull-9 large-uncentered columns">

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