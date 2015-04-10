<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);

    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        echo '<hr>
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
        </div>';
    }
?>
