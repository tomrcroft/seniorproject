<?php
/*
 * Filter Search will take in the categories selected field and narrow the search
 * results based on the filter
 */    
     $search = 'nun';
     $by_age = 'Adult';
     $by_sex = 'F';
     $by_type = 'Hat';
     $by_group = '';

    //$search = trim($_POST['searchterm']);
    //$by_age = trim($_POST['age_facet']);
    $age_flag = 0;
    //$by_sex = trim($_POST['gender_facet']);
    $sex_flag = 0;
    //$by_type = trim($_POST['type_facet']);
    $type_flag = 0;
    //$by_group = trim($_POST['group_facet']);
    $group_flag = 0;
    
    //$query = "SELECT * FROM dbo.[Costume], dbo.[Dic_Costume_Type]";//destroy
    //$conditions = array('dbo.[Costume].Costume_Type_Key = dbo.[Dic_Costume_Type].Costume_Type_Key');//destroy

    /*if($search !=""){//destroy
        $conditions[] = "Costume_Name LIKE '%$search%'";//destroy
    }//destroy*/
    if($by_age !="") {
        //$conditions[] = "Adult_or_Child='$by_age'";//destroy
        $age_flag = 1;
    }
    if($by_sex !="") {
        //$conditions[] = "Costume_Gender='$by_sex'";//destroy
        $sex_flag = 1;
    }
    if($by_type !="") {
        //$conditions[] = "Costume_Type='$by_type'";//destroy
        $type_flag = 1;
    }
    if($by_group !="") {
        //$conditions[] = "Costume_Group='$by_group'";//destroy
        $group_flag = 1;
    }

    //echo $age_flag . '-' . $sex_flag . '-' . $type_flag . '-' . $group_flag;
    /*$sql = $query;
    if (count($conditions) > 1) {
      $sql .= " WHERE " . implode(' AND ', $conditions);//destroy
    }*/
    // echo $sql;
    
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);
    $sql = "{call dbo.Filter_Search(?,?,?,?,?,?,?,?,?)}";
    $params = array($search,$age_flag,$by_age,$sex_flag,$by_sex,$type_flag,$by_type,$group_flag,$by_group);
    foreach ($params as $value) {
        echo $value . '-';
    }
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }   
    
    $stmt = sqlsrv_query($link,$sql,$params);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    
    $rows = array();
    $num_items_returned = 0;
    $dir = '../lib/images/temp';
    
    while($result = sqlsrv_fetch_array( $stmt , SQLSRV_FETCH_ASSOC ))
    {
        // display results however we want photos format will be changed
        $rows[] = $result;
        $dir = '../lib/images/temp/item'.$result['Costume_Key'].'.jpeg';
        if (!file_exists($dir)){
            $temp = $rows[$num_items_returned]['Costume_Image'];
            file_put_contents($dir, $temp);
        }
        $rows[$num_items_returned]['Costume_Image'] = $dir;

        $num_items_returned++;
    }
    
    echo json_encode(array("searchterm"=> $search, "results"=>$rows, "numItems"=>$num_items_returned));
    
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($link);
                

?>