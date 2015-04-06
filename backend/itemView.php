<?php itemView();

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function itemView()
{
    // $id = array(17);
    $id = array($_GET['idnumber']);// whatever variable name it is
    
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
        //Search for costume
        $str = "SELECT * FROM dbo.[Costume], dbo.[Dic_Costume_Type], dbo.[Dic_Costume_Color] WHERE Costume_Key = ? 
            AND dbo.[Costume].Costume_Type_Key = dbo.[Dic_Costume_Type].Costume_Type_Key
            AND dbo.[Costume].Costume_Color_Key = dbo.[Dic_Costume_Color].Costume_Color_Key";

        $query = sqlsrv_query($link,$str,$id);//runs statement
        if( $query === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        //change result into an array
        $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);
        if( $row['Rentable'] === 1 && !empty($row['Storage_Location']))//checking if item is available
            $availability = '<span style="color: green">Available</span>';
        else 
            $availability = '<span style="color: red">Not Available</span>';
        
        file_put_contents('../lib/images/temp/temp_photo.jpeg', $row['Costume_Image']);//changing from blob format
        $pic = '<img src="../lib/images/temp/temp_photo.jpeg" alt="Temp Photo">';
        //print item      
        echo'<!-- Main Content Section -->
            <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
            <div class="large-9 push-3 columns">
                <h3>'. $row['Costume_Name'] .'          <small>'. $row['Costume_Type'] .'</small></h3>
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="left inventory_image">
                                <img src="../lib/images/temp/temp_photo.jpeg">
                            </div>
                            '. $row['Costume_Description'] .'
                            <div class="button">Add Item</div>
                        </div>
                    </div>

                <p>
                    COLOR: '. $row['Costume_Color'] .'<br>
                    GROUP: '. $row['Costume_Group'] .'<br>
                    FABRIC: '. $row['Costume_Fabric'] .'<br>
                    TIME PERIOD: '. $row['Costume_Time_Period'] .'<br>
                    ADULT/CHILD: '. $row['Adult_or_Child'] .'<br>
                    SIZE: '. $row['Costume_Size'] .'<br>
                    GENDER: '. $row['Costume_Gender'] .'<br>
                    DESIGNER: '. $row['Costume_Designer'] .'<br>
                    CHEST: '. $row['Chest'] .'<br>
                    WAIST: '. $row['Waist'] .'<br>
                    HIPS: '. $row['Hips'] .'<br>
                    GIRTH: '. $row['Girth'] .'<br>
                    NECK: '. $row['Neck'] .'<br>
                    SLEEVES: '. $row['Sleeves'] .'<br>
                    NECK TO WAIST: '. $row['Neck_to_Waist'] .'<br>
                    WAIST TO HEM: '. $row['Waist_to_Hem'] .'<br>
                    INSEAM: '. $row['Inseam'] .'<br>
                    RENT STATUS: '. $availability .'<br>
                    RENTAL FEE: $'. $row['Rental_Fee'] .'<br>
                </p>

            
                
            </div>';

        
        
        sqlsrv_free_stmt($query);//frees statement
        sqlsrv_close($link);
    }
}
?>