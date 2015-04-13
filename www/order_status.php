<?php
    include '../backend/checkIfLoggedIn.php';
?>
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
        <script src="../lib/js/search.js" type="text/javascript"></script>
        <script src="../lib/js/order_status.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/order_status.css" type="text/css">

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
                    <li class="divider"></li>
                    <li>
                        <a href="search_page.php">Search</a>
                    </li>
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


            <div class="large-9 push-3 columns">
                <div class="row results">
  <div class="large-12 columns ">
    <div class="row">
      <div class="large-12 columns">
        <p>Items in Your Pull Request</p>
      </div>
<!--       <div class="large-3 columns">
        <select name="sortOptions">
          <option value="sortby">Sort By</option>
          <option value="cats">Cats</option>
          <option value="title">Title</option>
          <option value="author">Author</option>
          <option value="mrecats">More Cats</option>
        </select>
      </div> -->
    </div>
    
    
    <div class="pull-results">
    <?php include '../backend/viewCart.php';?>    
        <!--
      <div class="row ">
        <div class="image large-2 columns">
          <a href="#"><img src="http://placehold.it/250x300&text=Costume Image" alt="costume image" class="thumbnail"></a>
        </div>
        <div class="large-10 columns">
          <div class="row">
            <div class=" large-9 columns">
              <h5><a href="#">Costume Name</a></h5>
              <p>Costume Type</p>
            </div>
            <div class=" large-3 columns">
              <div class="button expand medium remove_item">Remove Item</div>
               
            </div>
            <div class="row">
              <div class=" large-12 columns">
                <ul class="large-block-grid-2">
                  <li>
                    <ul>
                      <li><strong>Color:</strong> Black</li>
                      <li><strong>Size:</strong> Large</li>
                      <li><strong>Group:</strong> Star Wars</li>
                      
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li><strong>Rental Fee:</strong> $000.00</li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
      <div class="row ">
        <div class="large-2 columns">
          <a href="#"> <span> </span><img src="http://placehold.it/250x300&text=Costume Image" alt="Costume Image" class=" thumbnail"></a>
        </div>
        <div class="large-10 columns">
          <div class="row">
            <div class=" large-9 columns">
              <h5><a href="#">Costume Name</a></h5>
              <p>Costume Type</p>
            </div>
            <div class=" large-3 columns">
              <div class="button expand medium remove_item">Remove Item</div>
               
            </div>
            <div class="row">
              <div class=" large-12 columns">
                <ul class="large-block-grid-2">
                  <li>
                    <ul>
                      <li><strong>Color:</strong> Black</li>
                      <li><strong>Size:</strong> Large</li>
                      <li><strong>Group:</strong> Star Wars</li>
                      
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li><strong>Rental Fee:</strong> $000.00</li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
      <div class="row ">
        <div class="large-2 columns">
          <a href="#"> <span> </span><img src="http://placehold.it/250x300&text=Costume Image" alt="Costume Image" class=" thumbnail"></a>
        </div>
        <div class="large-10 columns">
          <div class="row">
            <div class=" large-9 columns">
              <h5><a href="#">Costume Name</a></h5>
              <p>Costume Type</p>
            </div>
            <div class=" large-3 columns">
              <div class="button expand medium remove_item">Remove Item</div>
               
            </div>
            <div class="row">
              <div class=" large-12 columns">
                <ul class="large-block-grid-2">
                  <li>
                    <ul>
                      <li><strong>Color:</strong> Black</li>
                      <li><strong>Size:</strong> Large</li>
                      <li><strong>Group:</strong> Star Wars</li>
                      
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li><strong>Rental Fee:</strong> $000.00</li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
      <div class="row ">
        <div class="large-2 columns">
          <a href="#"> <span> </span><img src="http://placehold.it/250x300&text=Costume Image" alt="Costume Image" class=" thumbnail"></a>
        </div>
        <div class="large-10 columns">
          <div class="row">
            <div class=" large-9 columns">
              <h5><a href="#">Costume Name</a></h5>
              <p>Costume Type</p>
            </div>
            <div class=" large-3 columns">
              <div class="button expand medium remove_item">Remove Item</div>
               
            </div>
            <div class="row">
              <div class=" large-12 columns">
                <ul class="large-block-grid-2">
                  <li>
                    <ul>
                      <li><strong>Color:</strong> Black</li>
                      <li><strong>Size:</strong> Large</li>
                      <li><strong>Group:</strong> Star Wars</li>
                      
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li><strong>Rental Fee:</strong> $000.00</li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
    -->
    </div>
    <div id="send_pull_request" class="button right"> Send Pull Request</div>
    <div id="cancel_pull_request" class="button right"> Cancel Pull Request</div>
    
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

                <p><img src="http://placehold.it/250x300&text=Ad" /></p>
                </div>
            </div>


    <script>
        $(document).foundation();
    </script>
    </body>

</html>