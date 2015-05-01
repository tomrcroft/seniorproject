<?php
require('fpdf.php');
include '../backend/GetInvoiceInfo.php';
include '../backend/checkAdmin.php';
session_start();
class PDF extends FPDF
{
    private $RentalFee = 0;
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
        $this->SetFillColor(168,168,168);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
        // Date info
        $this->Cell(30,7,'Date Created: ','LTB',0,'C',true);
        $this->SetFont('');
        $this->Cell(25,7,date_format($data['Created_Date'],'m/d/y'),'TB',0,'C',true);
        $this->SetFont('','B');
        $this->Cell(85,7,'Date Range: ','TB',0,'R',true);
        $this->SetFont('');
        $this->Cell(0,7,date_format($data['Delivery_Date'],'m/d/y') . ' - ' . 
                date_format($data['Expected_Return_Date'],'m/d/y'),'RTB',1,'C',true);
        
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
        
        // Convert phone and fax to string
        $phone = strval($data['Contact_Phone']);
        $fax = strval($data['Contact_Fax']);
        $formattedPhone = '(' . substr($phone, 0, 3) . ')' . substr($phone, 3, 3) . '-' . substr($phone, 6);
        $formattedFax = '(' . substr($fax, 0, 3) . ')' . substr($fax, 3, 3) . '-' . substr($fax, 6);
        
        
        // Contact info
        $this->Ln(3);
        $this->SetFont('','B');
        $this->Cell(35,7,'Contact: ','TL',0,'L',true);
        $this->SetFont('');
        $this->Cell(0,7,$data['Contact_Name'],'TR',1,'L',true);
        $this->Cell(35,7,'','L',0,'C',true);//blank cell
        $this->Cell(0,7,$data['Contact_Email'],'R',1,'L',true);
        $this->Cell(35,7,'','L',0,'C',true);//blank cell
        $this->Cell(0,7,$formattedPhone,'R',1,'L',true);
        $this->Cell(35,7,'','L',0,'C',true);//blank cell
        $this->Cell(0,7,$formattedFax,'R',1,'L',true);
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
        $this->SetFillColor(168,168,168);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header
        $w = array(20, 120, 30, 20);
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
            $this->Cell($w[0],7,$row['Costume_Key'],'LR',0,'L',$fill);
            
            $this->Cell($w[1],7,$row['Costume_Name'] . ' - Type: ' . $row['Costume_Type'] . 
                    ' - Color: ' . $row['Costume_Color'],'LR',0,'L',$fill);
            
            $this->Cell($w[2],7,'$' . number_format($row['Replacement_Cost'], 2),'LR',0,'R',$fill);
            $this->Cell($w[3],7,'$' . number_format($row['Rental_Fee'], 2),'LR',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;
            $this->RentalFee += $row['Rental_Fee'];
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
        $this->Ln(10);
    }
    
    // Total Cost
    function Total($invoice)
    {
        // Colors, line width and bold font
        $this->SetFillColor(168,168,168);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
        $this->Cell(120,7,'',0,0,'C');
        $this->Cell(45,7,'Description',1,0,'C',true);
        $this->Cell(25,7,'Total',1,1,'C',true);
        
        $this->SetFont('');
        //rental cost
        if ($invoice['Status'] == 'Pending' || $invoice['Status'] == 'Accepted'){
            $this->Cell(120,7,'',0,0,'C');
            $this->Cell(45,7,'Rentals',1,0,'L');
            $this->Cell(25,7,'$'.number_format($this->RentalFee,2),1,1,'R');
            if($this->RentalFee > $invoice['Total_Rental_Fee'])//price reduction -- will need to change
            {
                $this->Cell(120,7,'',0,0,'C');
                $this->Cell(45,7,'Price Reduction',1,0,'L');
                $this->Cell(25,7,'($'. number_format($this->RentalFee - $invoice['Total_Rental_Fee'],2) .')',1,1,'R');
            }
            else if ($this->RentalFee < $invoice['Total_Rental_Fee'])//added cost -- will need to change
            {
                $this->Cell(120,7,'',0,0,'C');
                $this->Cell(45,7,'Additional Costs',1,0,'L');
                $this->Cell(25,7,'$'.number_format($invoice['Total_Rental_Fee'] - $this->RentalFee,2),1,1,'R');
            }
        }
        //restocking cost
        if ($invoice['Status'] == 'Rejected' || $invoice['Status'] == 'Pending'){
            $this->Cell(120,7,'',0,0,'C');
            $this->Cell(45,7,'Restocking Fee',1,0,'L');
            $this->Cell(25,7,'$'.number_format($invoice['Total_Restocking_Fee'],2),1,1,'R');
        }
        //price change have if statement to see if rent total is different than overall total
        $this->Ln(10);
        
        if ($invoice['Status'] == 'Accepted' || $invoice['Status'] == 'Pending')
        {
            $total = $invoice['Total_Rental_Fee'];
        }
        else
        {
            $total = $invoice['Total_Restocking_Fee'];
        }
        $this->SetFont('','B');
        $this->Cell(150,7,'',0,0,'C');
        $this->Cell(15,7,'Total','LTB',0,'R',true);
        $this->SetFont('');
        $this->Cell(25,7,'= $' . $total,'RTB',1,'L',true);
    }
}

include '../backend/DBConnection.php';
$link = connect();

//Checks connection
if (!$link) {
    $output = "Problems with the database connection!"; 
    $json = json_encode($output);
    echo $json;
}
else
{
    $str = "SELECT * FROM cmt..[Costume], cmt..[Invoice_Line], cmt..[Dic_Costume_Type], dbo.[Dic_Costume_Color]
        WHERE cmt..[Costume].Costume_Key = cmt..[Invoice_Line].Costume_Key AND
        Invoice_ID = ? AND dbo.[Costume].Costume_Type_Key = dbo.[Dic_Costume_Type].Costume_Type_Key
        AND dbo.[Costume].Costume_Color_Key = dbo.[Dic_Costume_Color].Costume_Color_Key";
    $params = array($_GET['invoiceID']);
    //$params = array(19);//needs user id
    //run queries
    $invoice = getInfo($link,$params[0]);
    
    $stmt = sqlsrv_query($link,$str,$params);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    //get data
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        if($row === false) {
            die( print_r( sqlsrv_errors(), true));
        }
        if ($row['Source_Deleted'] == 0)
            $data[] = $row;
    }
    if($_SESSION['login_user'] == $invoice['Username'] || checkIfAdmin($_SESSION['login_user']))
    {
        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();    
        $pdf->InvoiceInfo($invoice);
        $header = array('Item ID', 'Description', 'Unit Replace.', 'Cost');
        $pdf->FancyTable($header,$data);
        $pdf->Total($invoice);
        $pdf->Output();
    }
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($link);
}
?>