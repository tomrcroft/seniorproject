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
        <script src="../lib/js/pull_request_cart.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../lib/foundation/css/foundation.css" type="text/css">
        <link rel="stylesheet" href="../lib/foundation/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/main.css" type="text/css">
        <link rel="stylesheet" href="../lib/css/pull_request_cart.css" type="text/css">

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
                        <a href="pull_request_cart.php">Pull Request Cart
                        <?php 
                        if(isset($_SESSION['login_user']))
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

        <div class="main-content row">    

            <!-- Main Content Section -->
            <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->

          <div class="large-10 push-2 columns">
              <p>
                Items in your Pull Request<br>
                If you would like to rent these items and checkout, click <b>Send Pull Request.</b><br>
                If you would like to restart your pull request, click <b>Cancel Pull Request</b>
              </p>
              <div class="pull-results">

              <?php include '../backend/viewCart.php';?>

              </div>
              <div id="send_pull_request" class="button right">Send Pull Request</div>
              <div id="cancel_pull_request" class="button right">Cancel Pull Request</div>

              <div class='reveal-modal' id='cancel-modal' data-reveal>
                Are you sure you want to delete all items from your cart?
                <div id="confirm_cancel" class="button right">Yes</div>
                <div id="reject_cancel" class="button right">No</div>
              </div>

              <div class='reveal-modal' id='send-modal' data-reveal>
                Are you sure you want to send a pull request for all items from your cart?
                <div id="confirm_send" class="button right">Yes</div>
                <div id="reject_send" class="button right">No</div>
              </div>

              

<!--               <div id="cancel_confirmation" class="reveal-modal" data-reveal aria-labelledby="cancel_modal" aria-hidden="true" role="dialog">
                <h2 id="cancel_modal">Are you sure you want to cancel your pull request?</h2>
                <p>Reveal makes these very easy to summon and dismiss. The close button is simply an anchor with a unicode character icon and a class of. Clicking anywhere outside the modal will also dismiss it.</p>
                <p>Finally, if your modal summons another Reveal modal, the plugin will handle that for you gracefully.</p>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
              </div> -->
    
          </div>
          <div class="large-2 pull-10 columns">
              <p><img src="http://placehold.it/250x300&text=Ad" /></p>
          </div>
        </div>



        <!--
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



    <script>
        $(document).foundation();
    </script>
    </body>

</html>