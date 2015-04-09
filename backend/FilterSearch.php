<!DOCTYPE html>
<html>
<body>
<?php
    
    // $search = 'men';
    // $by_age = 'Adult';
    // $by_sex = 'Male';
    // $by_type = 'Vest';
    // $by_group = '';

    $search = $_POST['searchterm'];
    $by_age = $_POST['age_facet'];
    $by_sex = $_POST['gender_facet'];
    $by_type = $_POST['type_facet'];
    $by_group = $_POST['group_facet'];

    $query = "SELECT * FROM dbo.[Costume], dbo.[Dic_Costume_Type]";
    $conditions = array('dbo.[Costume].Costume_Type_Key = dbo.[Dic_Costume_Type].Costume_Type_Key');

    if($search !=""){
        $conditions[] = "Costume_Name LIKE '%$search%'";
    }
    if($by_age !="") {
        $conditions[] = "Adult_or_Child='$by_age'";
    }
    if($by_sex !="") {
        $conditions[] = "Costume_Gender='$by_sex'";
    }
    if($by_type !="") {
        $conditions[] = "Costume_Type='$by_type'";
    }
    if($by_group !="") {
        $conditions[] = "Costume_Group='$by_group'";
    }

    $sql = $query;
    if (count($conditions) > 0) {
      $sql .= " WHERE " . implode(' AND ', $conditions);
    }
    echo $sql;
    
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);

    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }   
    
    $stmt = sqlsrv_query($link,$sql);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    
    $rows = array();
    $num_items_returned = 0;
    $dir = '../lib/images/temp';
    
    while($result = sqlsrv_fetch_array( $stmt , SQLSRV_FETCH_ASSOC ))
    {
        // display results however we wan
        $rows[] = $result;
        $temp = $rows[$num_items_returned]['Costume_Image'];
        file_put_contents($dir.'/test'.$num_items_returned.'.jpeg', $temp);
        $rows[$num_items_returned]['Costume_Image'] = $dir.'/test'.$num_items_returned.'.jpeg';

        $num_items_returned++;
    }
    
    echo json_encode(array("searchterm"=> $search, "results"=>$rows, "numItems"=>$num_items_returned));
    
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($link);
                

?>
</body>
</html>
