<?php

 require('../../fpdf183/fpdf.php');
 require_once '../includes/dbh.inc.php';
 require_once('../includes/functions.inc.php');

 $order_id = $_GET['id'];
 $customer_id = $_GET['cid'];
 $customer_name = $_GET['name'];
 $address1 = $_GET['address1'];
 $address2 = $_GET['address2'];
 $address3 = $_GET['address3'];
 $address4 = $_GET['address4'];
 $customer_phone = $_GET['phone'];
 $total = $_GET['total'];
 $date = $_GET['date'];
 
//  echo  $customer_id; 
//  echo " ";
//  echo $customer_name;
//  echo " ";
//db connection
// $con = mysqli_connect('localhost','root','');
// mysqli_select_db($con,'invoicedb');


$sql ="SELECT * 
FROM orderdetails 
INNER JOIN product ON orderdetails.ProductId  =product.productId
WHERE orderId= $order_id  ;";

$query =mysqli_query($conn, $sql);

//get invoices data
// $query = mysqli_query($conn,"SELECT * from orders
// 	inner join orderdetails using(orderId)
// 	where
// 	orderId = $order_id");
$invoice = mysqli_fetch_array($query);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'Dip Products (Pvt) Ltd.',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'Katuwawala',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Boralasgamuwa, Sri Lanka.',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,$date,0,1);//end of line

$pdf->Cell(130	,5,'Phone +94 112 509 788',0,0);
$pdf->Cell(25	,5,'Invoice ID',0,0);
$pdf->Cell(34	,5,$order_id,0,1);//end of line

// $pdf->Cell(130	,5,'Fax [+12345678]',0,0);
// $pdf->Cell(25	,5,'Customer ID',0,0);
// $pdf->Cell(34	,5,$customer_id,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to :',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$customer_name,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$address1,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$address2,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$address3,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$address4,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$customer_phone,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Quantity',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

	
$sql ="SELECT * 
FROM orderdetails 
INNER JOIN product ON orderdetails.ProductId  =product.productId
WHERE orderId= $order_id  ;";

$query =mysqli_query($conn, $sql);
$invoice = mysqli_fetch_array($query);

//items

$sql ="SELECT * 
FROM orderdetails 
INNER JOIN product ON orderdetails.ProductId  =product.productId
WHERE orderId= $order_id  ;";

$query =mysqli_query($conn, $sql);
$tax = 0; //total tax
$amount = 0; //total amount

//display the items
while($item = mysqli_fetch_array($query)){
	$pdf->Cell(130	,5,$item['productName'],1,0);
	//add thousand separator using number_format function
	$pdf->Cell(25	,5,number_format($item['qty']),1,0);
	$pdf->Cell(34	,5,number_format($item['price']),1,1,'R');//end of line
	//accumulate tax and amount
	// $tax += $item['tax'];
	// $amount += $item['price'];
}
//summary
// $pdf->Cell(130	,5,'',0,0);
// $pdf->Cell(25	,5,'Subtotal',0,0);
// $pdf->Cell(4	,5,'$',1,0);
// $pdf->Cell(30	,5,number_format($amount),1,1,'R');//end of line

// $pdf->Cell(130	,5,'',0,0);
// $pdf->Cell(25	,5,'Taxable',0,0);
// $pdf->Cell(4	,5,'$',1,0);
// $pdf->Cell(30	,5,number_format($tax),1,1,'R');//end of line

// $pdf->Cell(130	,5,'',0,0);
// $pdf->Cell(25	,5,'Tax Rate',0,0);
// $pdf->Cell(4	,5,'$',1,0);
// $pdf->Cell(30	,5,'10%',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Grand Total',0,0);
$pdf->Cell(8	,5,'Rs.',1,0);
$pdf->Cell(26	,5,$total,1,1,'R');//end of line

$pdf->Output();
?>
