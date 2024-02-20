<?php

 include('../partial/dbconnect.php');
//  $query = "select * from `orders` WHERE order_id=1";
//         $result = mysqli_query($conn, $query); 
//         while ($row = mysqli_fetch_assoc($result)) {
//             $BookID = $row['razorpay_payment_id	'];
//             $bookname = $row['status'];
//             $bookimage = $row['pdfname'];
//             $bookquality = $row['email'];
//             $bookprice = $row['price'];
//             // $pdfname = $row['pdfnamecart'];
//             // $files[] = $pdfname;

        

require('../fpdf186/fpdf.php');

session_start();
$session_user = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM addtocart WHERE username_cart='$session_user'");
$result=mysqli_query($conn,"SELECT name,email FROM book_order WHERE username='$session_user'");
$result3=mysqli_query($conn,"SELECT razorpay_payment_id,order_id FROM orders WHERE user='$session_user'");
// WHERE username='$session_user'

// $invoice = mysqli_fetch_array($query);

$pdf = new FPDF('P', 'mm', 'A3');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(130, 5, 'E-booksell app', 0, 0);
$pdf->Cell(50, 5, 'INVOICE', 0, 1);

$pdf->SetFont('Arial', '', 12);

// $pdf->Cell(130, 5, '', 0, 0); // Replace 'Your Address' with the actual address field from your database
$pdf->Ln(10);
$pdf->Cell(50, 5, 'DATE', 0, 0);
$pdf->Cell(50, 5, date('d/m/Y'), 0, 1);
$pdf->Ln(10);
// $pdf->Cell(50, 5, 'product id:', 0, 0);
// $pdf->Ln(10);
$ro1 = mysqli_fetch_assoc($result);
$ro2 = mysqli_fetch_assoc($result3);    
$pdf->Cell(50, 3, 'order id:', 0, 0);
$pdf->Cell(50, 3, $ro2['order_id'], 0, 0);
$pdf->Ln(10);
$pdf->Cell(50, 3, 'customer name:', 0, 0);
$pdf->Cell(50, 3, $ro1['name'], 0, 0);
$pdf->Ln(10);
$pdf->Cell(50, 3, 'customer email:', 0, 0);
$pdf->Cell(50, 3, $ro1['email'], 0, 0);
$pdf->Ln(10);
$pdf->Cell(50, 3, 'payment id:', 0, 0);
$pdf->Cell(50, 3, $ro2['razorpay_payment_id'], 0, 0);
$pdf->Ln(30); // Add some vertical spacing

$pdf->Cell(130, 5, 'Book List', 0, 0);
$pdf->Ln(10); 
// Table headers
$pdf->Cell(70, 10, 'Book Name', 1);
$pdf->Cell(140, 10, 'Book Pdf', 1);
$pdf->Cell(20, 10, 'Status', 1);
$pdf->Cell(20, 10, 'Price', 1);
$pdf->Ln();

$totalPrice = 0; // Initialize total price variable

while ($row = mysqli_fetch_assoc($query)) {
    $pdf->Cell(70, 10, $row['name'], 1);
    $pdf->Cell(140, 10, $row['pdfnamecart'], 1);
    $pdf->Cell(20, 10, 'Success', 1); // Assuming 'Success' is the desired status value
    $pdf->Cell(20, 10, $row['price'], 1);

    $totalPrice += $row['price']; // Accumulate price for total

    $pdf->Ln();
    echo $row['id'];
}

// Display total price row
$pdf->Cell(230, 10, 'Total Price', 1, 0, 'D '); // Combine cells for 'Total Price'
$pdf->Cell(20, 10, $totalPrice, 1); // Display the total price

$pdf->Ln(); // Move to the next line after the total price
// $pdf->Cell(30, 20, 'Total Price', 1);

//     $pdf->Cell(30, 30,$tot_price, 2);   


$pdf->Output();



    $delete=mysqli_query($conn,"DELETE FROM addtocart WHERE username_cart='$session_user'");
    $result = mysqli_query($conn, $query); 
    

?>














<!-- ?php

 include('../partial/dbconnect.php');
//  $query = "select * from `orders` WHERE order_id=1";
//         $result = mysqli_query($conn, $query); 
//         while ($row = mysqli_fetch_assoc($result)) {
//             $BookID = $row['razorpay_payment_id	'];
//             $bookname = $row['status'];
//             $bookimage = $row['pdfname'];
//             $bookquality = $row['email'];
//             $bookprice = $row['price'];
//             // $pdfname = $row['pdfnamecart'];
//             // $files[] = $pdfname;

        

require('../fpdf186/fpdf.php');

session_start();
$session_user = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM orders WHERE order_id=22;");
// $invoice = mysqli_fetch_array($query);

$pdf = new FPDF('P', 'mm', 'A3');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(130, 5, 'E-booksell app', 0, 0);
$pdf->Cell(50, 5, 'INVOICE', 0, 1);

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(130, 5, 'Your Address', 0, 0); // Replace 'Your Address' with the actual address field from your database
$pdf->Cell(50, 5, 'DATE', 0, 0);
$pdf->Cell(50, 5, date('d/m/Y'), 0, 1); // Use the current date

$pdf->Ln(10); // Add some vertical spacing

// Table headers
$pdf->Cell(80, 10, 'order ID', 1);
$pdf->Cell(150, 10, 'Book Name', 1);
$pdf->Cell(30, 10, 'status', 1);
$pdf->Cell(30, 10, 'Price', 1);
$pdf->Ln();


// Fetch data from the database and add to the table
while ($row = mysqli_fetch_assoc($query)) {
    $pdf->Cell(80, 20, $row['razorpay_payment_id'], 1);
    $pdf->Cell(150,20, $row['pdfname'], 1);
    $pdf->Cell(30, 20, $row['status'], 1);
    $pdf->Cell(30, 20, $row['price'], 1);
   
   
    $pdf->Ln();
    echo $row['id'];

}
        // }
// Output the PDF
$pdf->Output();
?>
 -->


<!-- ?php
require ('../fpdf186/fpdf.php');
include('../partial/dbconnect.php');
session_start();
$session_user = $_SESSION['username'];
$query=mysqli_query($conn,"SELECT * FROM addtocart WHERE username_cart	= '$session_user'");
$invoice=mysqli_fetch_array($query);


$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();



$pdf-> SetFont('Arial','B',14);

$pdf->cell(130 ,5,'booksell app',0,0);
$pdf->cell(50 ,5,'INVOICE',0,1);


$pdf->SetFont('Arial','',12);

$pdf->cell(130 ,5,'$invoice[city,country,ZIP]',0,0);
$pdf->cell(50 ,5,'DATE',0,0);
$pdf->cell(50 ,5,'[dd/mm/yyyy]',0,0);




?> -->
