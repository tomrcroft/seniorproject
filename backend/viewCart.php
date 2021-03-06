<?php

/*
 * Creates the view of all the items currently in your shopping cart
 */
    
    if(!isset($_SESSION['shopping_cart']) && isset($_SESSION['login_user']))
        header ("Location: ../www/search_page.php");
    else
    {
        $cart = $_SESSION['shopping_cart'];
        //$cart = array(17,19,22);
        include '../backend/DBConnection.php';
        $link = connect();

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
            $query = "SELECT Costume_Key,Costume_Image,Costume_Name,Costume_Description,Costume_Type,Costume_Color,Costume_Size,Costume_Group,Rental_Fee 
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
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($link);
            unset($conditions);
        }
    }
    function displayItem($item)
    {
        //convert photo to jpeg
        $dir = '../lib/images/temp/item'.$item['Costume_Key'].'.jpeg';
        if (!file_exists($dir))
            file_put_contents($dir, $item['Costume_Image']);//changing from blob format
        $pic = '<img src="'.$dir.'" alt="Costume Image" class="thumbnail">';
        //what i pulled out <img src="http://placehold.it/250x300&text=Costume Image" alt="Costume Image" 
        echo '
        <div id='. $item['Costume_Key'] .' class="row">
          <div class="cart_item_image large-2 columns">
            <a href="inventory_page.php?idnumber=' . $item['Costume_Key'] . '"> '. $pic .'</a>
          </div>
          <div class="large-10 columns">
            <div class="row">
              <div class="large-12 columns">
                <h5 class="item_name"><a href="inventory_page.php?idnumber=' . $item['Costume_Key'] . '">'. $item['Costume_Name'] .'</a></h5>
                <h6 class="item_type">'. $item['Costume_Type'] .'</h6>
                <p class=".item_description"> '. $item['Costume_Description'] .' </p>

                  <ul class="large-block-grid-2">
                    <li>
                      <ul>
                        <li><strong>Color:</strong> '. $item['Costume_Color'] .'</li>
                        <li><strong>Size:</strong> '. $item['Costume_Size'] .'</li>
                        <li><strong>Group:</strong> '. $item['Costume_Group'] .'</li>

                      </ul>
                    </li>
                  </ul>
                  <div class="button right remove_item">Remove Item</div>
              </div>
            </div>
          </div>
          <hr>
        </div>';
    }
?>
