<?php filterDisplay();

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function filterDisplay()
{
    //if empty have the filter show all filter possibilities
    if(!isset($_POST['searchterm']))
    {
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
            $filterAge = array('Adult', 'Child');
            $filterGender = array('Female', 'Male');
            $query3 = 'SELECT DISTINCT Costume_Type FROM dbo.[Dic_Costume_Type] ORDER BY Costume_Type';
            $query4 = 'SELECT DISTINCT Costume_Group FROM dbo.[Costume] ORDER BY Costume_Group';
            
            $stmt3 = sqlsrv_query($link,$query3);//runs first query
            if( $stmt3 === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            while( $row3 = sqlsrv_fetch_array( $stmt3, SQLSRV_FETCH_NUMERIC) ) {
                $filterType[] = $row3[0];
            }
            sqlsrv_free_stmt($stmt3);
            
            $stmt4 = sqlsrv_query($link,$query4);//runs second query
            if( $stmt4 === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            while( $row4 = sqlsrv_fetch_array( $stmt4, SQLSRV_FETCH_NUMERIC) ) {
                $filterGroup[] = $row4[0];
            }
            sqlsrv_free_stmt($stmt4);
            
        }
    }
    else//run queries for each of the 4 with the search term
    {
        $search = trim($_POST['searchterm']);//the value in the search box
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
            $query = "SELECT DISTINCT Adult_or_Child FROM dbo.[Costume] WHERE Costume_Name LIKE '%$search%' ORDER BY Adult_or_Child";
            $stmt = sqlsrv_query($link,$query);//runs first query
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
                $filterAge[] = $row[0];
            }
            sqlsrv_free_stmt($stmt);
            
            $query2 = "SELECT DISTINCT Costume_Gender FROM dbo.[Costume] WHERE Costume_Name LIKE '%$search%' ORDER BY Costume_Gender";
            $stmt2 = sqlsrv_query($link,$query2);//runs first query
            if( $stmt2 === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            while( $row2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_NUMERIC) ) {
                $filterGender[] = $row2[0];
            }
            sqlsrv_free_stmt($stmt2);
            
            $query3 = "SELECT DISTINCT Costume_Type FROM dbo.[Dic_Costume_Type], dbo.[Costume] 
                WHERE Costume_Name LIKE '%$search%' AND dbo.[Costume].Costume_Type_Key = dbo.[Dic_Costume_Type].Costume_Type_Key ORDER BY Costume_Type";
            $stmt3 = sqlsrv_query($link,$query3);//runs first query
            if( $stmt3 === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            while( $row3 = sqlsrv_fetch_array( $stmt3, SQLSRV_FETCH_NUMERIC) ) {
                $filterType[] = $row3[0];
            }
            sqlsrv_free_stmt($stmt3);
            
            $query4 = "SELECT DISTINCT Costume_Group FROM dbo.[Costume] WHERE Costume_Name LIKE '%$search%' ORDER BY Costume_Group";
            $stmt4 = sqlsrv_query($link,$query4);//runs second query
            if( $stmt4 === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            while( $row4 = sqlsrv_fetch_array( $stmt4, SQLSRV_FETCH_NUMERIC) ) {
                $filterGroup[] = $row4[0];
            }
            sqlsrv_free_stmt($stmt4);
            
        }
    }
    printFilter($filterAge, $filterGender, $filterType, $filterGroup);
}

function printFilter($age, $gender, $type, $group)
{
    //print the search filter
    echo '<ul class="side-nav" id="facets">
            <li class="facet-category" id="age-facet">
                <label>Age</label>';
                foreach($age as $value1) {
                    if(!empty($value1))
                        echo '<li><input id="'.$value1.'_facet" type="radio" value="'.$value1.'"><label for="'.$value1.'_facet">'.$value1.'</label></li>';
                }
                //<li><input id="adult_facet" type="radio" value="adult"><label for="adult_facet">Adult</label></li>
                //<li><input id="child_facet" type="radio" value="child"><label for="child_facet">Child</label></li>
            echo '</li>
            <li class="facet-category" id="gender-facet">
                <label>Gender</label>';
                foreach($gender as $value2) {
                    if(!empty($value2))
                        echo '<li><input id="'.$value2.'_facet" type="radio" value="'.$value2.'"><label for="'.$value2.'_facet">'.$value2.'</label></li>';
                }
                //<li><input id="male_facet" type="radio" value="male"><label for="male_facet">Male</label></li>
                //<li><input id="female_facet" type="radio" value="female"><label for="female_facet">Female</label></li>
            echo '</li>
            <li class="facet-category" id="type-facet">
                <label>Costume Type</label>';
                foreach($type as $value3) {
                    if(!empty($value3))
                        echo '<li><input id="typefacet_'.$value3.'" type="radio" value="'.$value3.'"><label for="typefacet_'.$value3.'">'.$value3.'</label></li>';
                }
                //<li><input id="typefacet_hat" type="radio" value="hat"><label for="typefacet_hat">hat</label></li>
            echo '</li>
            <li class="facet-category" id="group-facet">
                <label>Costume Group</label>';
                foreach($group as $value4) {
                    if(!empty($value4))
                        echo '<li><input id="groupfacet_'.$value4.'" type="radio" value="'.$value4.'"><label for="groupfacet_'.$value4.'">'.$value4.'</label></li>';
                }
                //<li><input id="groupfacet_2" type="radio" value="group2"><label for="groupfacet_2">Ballet</label></li>
            echo '</li>
            <li><div class="button" id="filter_button">Filter</div></li>
        </ul>';
}
?>
