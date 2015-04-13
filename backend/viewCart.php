<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    
    start_session();
    if(!isset($_SESSION['shopping_cart']))
        header ("Location: ../www/search_page.php");
    $cart = $_SESSION['shopping_cart'];
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);

    //make query array from cart
    foreach ($cart as $value) {
        $conditions[] = "Costume_Key = $value";
    }
    
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        //need image,name,type(join),color,size,group,fee
        $query = "SELECT Costume_Image,Costume_Name,Costume_Type,Costume_Color,Costume_Size,Costume_Group,Rental_Fee
            FROM dbo.[Costume], dbo.[Dic_Costume_Type], dbo.[Dic_Costume_Color] WHERE
            dbo.[Costume].Costume_Type_Key = dbo.[Dic_Costume_Type].Costume_Type_Key
            AND dbo.[Costume].Costume_Color_Key = dbo.[Dic_Costume_Color].Costume_Color_Key";
        //add str to query
        $str = $query;
        if (count($conditions) > 0) {
            $str .= " AND ( " . implode(' OR ', $conditions) . " )";
        }
        echo $str;
        /*echo '<hr>
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
          </div>';*/
    }
?>
