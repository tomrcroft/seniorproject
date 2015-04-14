<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    
    //if(!isset($_SESSION['shopping_cart']))
        //header ("Location: ../www/search_page.php");
    //$cart = $_SESSION['shopping_cart'];
    $cart = array(17,19,22);
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
        //need id,image,name,type(join),color,size,group,fee
        $query = "SELECT Costume_Key,Costume_Image,Costume_Name,Costume_Type,Costume_Color,Costume_Size,Costume_Group,Rental_Fee 
                    FROM CMT..[Costume], CMT..[Dic_Costume_Type], CMT..[Dic_Costume_Color] 
                    WHERE CMT..[Costume].Costume_Type_Key = CMT..[Dic_Costume_Type].Costume_Type_Key 
                    AND CMT..[Costume].Costume_Color_Key = CMT..[Dic_Costume_Color].Costume_Color_Key";
        //add str to query
        $str = $query;
        if (count($conditions) > 0) {
            $str .= " AND ( " . implode(' OR ', $conditions) . " )";
        }
        
        //run query
        $stmt = sqlsrv_query($link,$str);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            if($row === false) {
                die( print_r( sqlsrv_errors(), true));
            }
            displayItem($row);
        }
    }
    function displayItem($item)
    {
        //convert photo to jpeg
        file_put_contents('../lib/images/temp/temp_photo.jpeg', $item['Costume_Image']);//changing from blob format
        $pic = '<img src="../lib/images/temp/temp_photo.jpeg" alt="Costume Image" class="thumbnail">';
        //what i pulled out <img src="http://placehold.it/250x300&text=Costume Image" alt="Costume Image" 
        echo '
        </div>
        <div class="row ">
          <div class="large-2 columns">
            <a href="#"> <span> </span> '. $pic .'</a>
          </div>
          <div class="large-10 columns">
            <div class="row">
              <div class=" large-9 columns">
                <h5><a href="#">'. $item['Costume_Name'] .'</a></h5>
                <p>'. $item['Costume_Type'] .'</p>
              </div>
              <div class=" large-3 columns">
                <div class="button right remove_item">Remove Item</div>

              </div>
              <div class="row">
                <div class=" large-12 columns">
                  <ul class="large-block-grid-2">
                    <li>
                      <ul>
                        <li><strong>Color:</strong> '. $item['Costume_Color'] .'</li>
                        <li><strong>Size:</strong> '. $item['Costume_Size'] .'</li>
                        <li><strong>Group:</strong> '. $item['Costume_Group'] .'</li>

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
            <hr>
          </div>';
    }
?>
