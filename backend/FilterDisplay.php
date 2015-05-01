<?php filterDisplay();

/*
 * filterDisplay will take a search term if one exists and display a filter by categories with the current results
 */
function filterDisplay()
{
    //if empty have the filter show all filter possibilities
    if(!isset($_POST['searchterm']))
    {
        $server = 'CMT-CIMS\CIMS';
        $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
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
        $search = array($_POST['searchterm']);//the value in the search box
        $server = 'CMT-CIMS\CIMS';
        $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
        $link = sqlsrv_connect($server, $connectionInfo);
        
        //Checks connection
        if (!$link) {
            $output = "Problems with the database connection!"; 
            $json = json_encode($output);
            echo $json;
        }        
        else
        {
            //displays the age
            $query = "{call dbo.Distinct_Search_Filter(?, 'Adult_or_Child')}";
            $stmt = sqlsrv_query($link,$query,$search);//runs first query
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                if($row === NULL) {
                    exit("No results from search.");
                }
                $filterAge[] = $row['Adult_or_Child'];
            }
            sqlsrv_free_stmt($stmt);
            
            //displays the genders
            $query2 = "{call dbo.Distinct_Search_Filter(?, 'Costume_Gender')}";
            $stmt2 = sqlsrv_query($link,$query2,$search);//runs first query
            if( $stmt2 === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            while( $row2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) {
                if($row2 === NULL) {
                    exit("No results from search.");
                }
                $filterGender[] = $row2['Costume_Gender'];
            }
            sqlsrv_free_stmt($stmt2);
            
            //displays the type
            $query3 = "{call dbo.Distinct_Search_Filter(?, 'Costume_Type')}";
            $stmt3 = sqlsrv_query($link,$query3,$search);//runs first query
            if( $stmt3 === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            while( $row3 = sqlsrv_fetch_array( $stmt3, SQLSRV_FETCH_ASSOC) ) {
                if($row3 === NULL) {
                    exit("No results from search.");
                }
                $filterType[] = $row3['Costume_Type'];
            }
            sqlsrv_free_stmt($stmt3);
            
            //displays the group
            $query4 = "{call dbo.Distinct_Search_Filter(?, 'Costume_Group')}";
            $stmt4 = sqlsrv_query($link,$query4,$search);//runs second query
            if( $stmt4 === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            while( $row4 = sqlsrv_fetch_array( $stmt4, SQLSRV_FETCH_ASSOC) ) {
                if($row4 === NULL) {
                    exit("No results from search.");
                }
                $filterGroup[] = $row4['Costume_Group'];
            }
            sqlsrv_free_stmt($stmt4);
            
        }
    }
    if(!empty($filterAge) || !empty($filterGender) || !empty($filterGroup) || !empty($filterType))
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
                        echo '<li><input id="age_facet" type="radio" name="age" value="'.$value1.'"><label for="'.$value1.'_facet">'.$value1.'</label></li>';
                }
                //<li><input id="adult_facet" type="radio" value="adult"><label for="adult_facet">Adult</label></li>
                //<li><input id="child_facet" type="radio" value="child"><label for="child_facet">Child</label></li>
            echo '</li>
            <li class="facet-category" id="gender-facet">
                <label>Gender</label>';
                foreach($gender as $value2) {
                    if(!empty($value2))
                        echo '<li><input id="gender_facet" type="radio" name="gender" value="'.$value2.'"><label for="'.$value2.'_facet">'.$value2.'</label></li>';
                }
                //<li><input id="male_facet" type="radio" value="male"><label for="male_facet">Male</label></li>
                //<li><input id="female_facet" type="radio" value="female"><label for="female_facet">Female</label></li>
            echo '</li>
            <li class="facet-category" id="type-facet">
                <label>Costume Type</label>';
                foreach($type as $value3) {
                    if(!empty($value3))
                        echo '<li><input id="type_facet" type="radio" name="type" value="'.$value3.'"><label for="typefacet_'.$value3.'">'.$value3.'</label></li>';
                }
                //<li><input id="typefacet_hat" type="radio" value="hat"><label for="typefacet_hat">hat</label></li>
            echo '</li>
            <li class="facet-category" id="group-facet">
                <label>Costume Group</label>';
                foreach($group as $value4) {
                    if(!empty($value4))
                        echo '<li><input id="group_facet" type="radio" name="group" value="'.$value4.'"><label for="groupfacet_'.$value4.'">'.$value4.'</label></li>';
                }
                //<li><input id="groupfacet_2" type="radio" value="group2"><label for="groupfacet_2">Ballet</label></li>
            echo '</li>
            <li><div class="button" id="filter_button">Filter</div></li>
        </ul>';
}
?>
