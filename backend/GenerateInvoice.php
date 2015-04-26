<?php
require('fpdf.php');
include '../backend/GetInvoiceInfo.php';

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../lib/images/CMTlogo.jpg',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(70);
        // Title
        $this->Cell(50,10,'California Musical Theater',0,2,'C');
        $this->SetFont('Arial','',12);
        $this->MultiCell(50,5,"1510 J Street, Suite 200 \n Sacramento, CA 95814 \n (916)446-5880 \n Fax# (916)446-1370",
                0,'C');
        // Line break
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // All the invoice information
    function InvoiceInfo($data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(144,144,144);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
        // Date info
        $this->Cell(30,7,'Date Created: ','LTB',0,'C',true);
        $this->SetFont('');
        $this->Cell(25,7,substr($data['Created_Date'],0,strrpos($data['Created_Date'], " ") + 1),'TB',0,'C',true);
        $this->SetFont('','B');
        $this->Cell(85,7,'Date Range: ','TB',0,'R',true);
        $this->SetFont('');
        $this->Cell(0,7,str_replace('-', '/', $data['Delivery_Date']) . ' - ' . 
                str_replace('-', '/', $data['Expected_Return_Date']),'RTB',1,'C',true);
        
        // Billing and Shipping info
        $this->Ln(3);
        $this->SetFont('','B');
        $this->Cell(35,10,'Production: ','LT',0,'L',true);
        $this->SetFont('');
        $this->Cell(0,10,$data['Production'],'TR',1,'L',true);
        $this->SetFont('','B');
        $this->Cell(35,7,'Billing Address: ','L',0,'L',true);
        $this->SetFont('');
        $this->Cell(60,7,'Attn: ' . $data['Billing_Attn'],'',0,'L',true);
        $this->SetFont('','B');
        $this->Cell(40,7,'Shipping Address: ','',0,'L',true);
        $this->SetFont('');
        $this->Cell(0,7,'Attn: ' . $data['Shipping_Attn'],'R',1,'L',true);
        $this->Cell(35,7,'','L',0,'C',true);//blank cell
        $this->Cell(100,7,$data['Billing_Street_Address'],'',0,'L',true);
        $this->Cell(0,7,$data['Shipping_Street_Address'],'R',1,'L',true);
        $this->Cell(35,7,'','L',0,'C',true);//blank cell
        $this->Cell(100,7,$data['Billing_City'] . ', ' . $data['Billing_State_Province'] . ' ' . 
                $data['Billing_Postal_Code'],'',0,'L',true);
        $this->Cell(0,7,$data['Shipping_City'] . ', ' . $data['Shipping_State_Province'] . ' ' . 
                $data['Shipping_Postal_Code'],'R',1,'L',true);
        $this->Cell(0,3,'','LBR',1,'C',true);//blank cell
        
        // Convert phone and fax to string -- implement
        
        
        // Contact info
        $this->Ln(3);
        $this->SetFont('','B');
        $this->Cell(35,7,'Contact: ','TL',0,'L',true);
        $this->SetFont('');
        $this->Cell(0,7,$data['Contact_Name'],'TR',1,'L',true);
        $this->Cell(35,7,'','L',0,'C',true);//blank cell
        $this->Cell(0,7,$data['Contact_Email'],'R',1,'L',true);
        $this->Cell(35,7,'','L',0,'C',true);//blank cell
        $this->Cell(0,7,$data['Contact_Phone'],'R',1,'L',true);
        $this->Cell(35,7,'','L',0,'C',true);//blank cell
        $this->Cell(0,7,$data['Contact_Fax'],'R',1,'L',true);
        $this->Cell(0,3,'','LBR',1,'C',true);//blank cell
        
        // Special Instructions
        $this->Ln(3);
        $this->SetFont('','B');
        $this->Cell(0,7,'Special Instructions: ','TLR',1,'L',true);
        $this->SetFont('');
        $this->MultiCell(0,7,$data['Special_Instructions'],'LRB','L',true);
        $this->Cell(0,3,'','LBR',1,'C',true);//blank cell
        
        // Line break
        $this->Ln(10);
        
    }
    
    // Colored table
    function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(144,144,144);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header
        $w = array(30, 100, 30, 30);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row['Costume_Key'],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row['Costume_Description'],'LR',0,'L',$fill);
            $this->Cell($w[2],6,'$' . number_format($row['Replacement_Cost'], 2),'LR',0,'R',$fill);
            $this->Cell($w[3],6,'$' . number_format($row['Rental_Fee'], 2),'LR',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
    
    // Total Cost
    function Total()
    {
        
    }
}

//db connection
$server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
$connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195", "ReturnDatesAsStrings"=>"true");
$link = sqlsrv_connect($server, $connectionInfo);

//Checks connection
if (!$link) {
    $output = "Problems with the database connection!"; 
    $json = json_encode($output);
    echo $json;
}
else
{
    $str = "SELECT * FROM cmt..[Costume], cmt..[Invoice_Line]
        WHERE cmt..[Costume].Costume_Key = cmt..[Invoice_Line].Costume_Key AND
        cmt..[Invoice_Line].Created_By = ? AND Invoice_ID = ?";
    //$params = array($_Post['user'], $_POST['ID']);
    $params = array('bigwatts',16);//needs user id
    //run queries
    $invoice = getInfo($link,$params[0],$params[1]);
    $stmt = sqlsrv_query($link,$str,$params);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    //get data
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        if($row === false) {
            die( print_r( sqlsrv_errors(), true));
        }
        $data[] = $row;
    }
    
    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();    
    $pdf->InvoiceInfo($invoice);
    $header = array('Item ID', 'Description', 'Unit Replace.', 'Cost');
    $pdf->FancyTable($header,$data);
    $pdf->Output();
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($link);
}
?>