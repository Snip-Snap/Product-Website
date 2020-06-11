<?php
session_start();
//call the FPDF library
require('fpdf/fpdf.php'); 
require_once('database/connect.php'); 

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(200,8,"",0,1,"L");

    $pdf->Cell(200,8,"",0,1,"L");
       
$pdf->Image('snipSnap.png',10,10,30,20);
$pdf->Ln(2);
$pdf->Cell(130 ,5,'Snip Snap.CO',0,0);

$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'9001 Stockdale Hwy',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'Bakersfields, CA, 93311',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
date_default_timezone_set('America/Los_Angeles');
$currentDate = date("n/j/Y H:i:s");
$pdf->Cell(12 ,5,$currentDate,0,1);
//$pdf->Cell(34 ,5,'[dd/mm/yyyy]',0,1);//end of line

$pdf->Cell(130 ,5,'Phone 661-654-2782',0,0);
/*$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line*/

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
$pdf->Cell(25 ,5,'Customer ID:  ',0,0);

$pdf->Cell(34 ,5,$_SESSION['cli_id'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->SetFont('Arial','B',12);

        $pdf->Cell(100 ,5,'Bill to',0,1);//end of line
        $pdf->SetFont('Arial','',12);

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$data1=$_SESSION['firstN'];
$data2=$_SESSION['last'];

//$_SESSION['last']=$data['lastname'];
//$pdf->Cell(90 ,5,'[Name]',0,1);
$pdf->Cell(90,5,$data1." ".$data2,0,1);
//$pdf->Cell(40,5, $_SESSION['firstN'], 0,1,);

/*$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Company Name]',0,1);*/

$pdf->Cell(10 ,5,'',0,0);
//this works within the if isset button or with the session above the if statement
$pdf->Cell(90 ,5, $_SESSION['address'],0,1);
//$pdf->Cell(90 ,5,'[Address]',0,1);

$pdf->Cell(10 ,5,'',0,0);
//$pdf->Cell(90 ,5,'[Phone]',0,1);
$pdf->Cell(90 ,5, $_SESSION['phone'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);
/*$pdf->Cell(10 ,5,'ID',1,0);*/
$pdf->Cell(90 ,5,'Product',1,0);
$pdf->Cell(25 ,5,'Qty',1,0);
$pdf->Cell(34 ,5,'Price',1,1);//end of line

$pdf->SetFont('Arial','',12);
/*
select c.firstname,c.lastname, c.phonenumber,co.address,co.state,co.city,co.zip from cli_order as co,composed_of as cf, client as c  
 where co.clientid=c.clientid AND co.orderid=cf.orderid;
select c.firstname,c.lastname, c.phonenumber,co.address,co.state,co.city,co.zip from cli_order as co,composed_of as cf, client as c  
 where co.clientid=c.clientid AND co.orderid=cf.orderid AND orderid='1';
*/
$query='SELECT * FROM product ORDER by productid ASC';
$result=pg_query($connect,$query); 

//Numbers are right-aligned so we give 'R' after new line parameter
//work on using the new query to get the data for the table to show
while($data=pg_fetch_assoc($result)){
    /*$pdf->Cell(10 ,5,$data['productid'],1,0);*/
    $pdf->Cell(90 ,5,$data['product_name'],1,0);
    $pdf->Cell(25 ,5,$data['quantity'],1,0);
    $pdf->Cell(34 ,5,$data['price'],1,1,'R');//end of line 
}
//if(isset($_POST['submit1'])){
//this works within the if isset button or with the session above the if statement
//$pdf->Cell(12 ,5, $_SESSION['address'],0,1);
//}
//var_dump($_POST);

/*$pdf->Cell(130 ,5,'UltraCool Fridge',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'3,250',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Supaclean Diswasher',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,200',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Something Else',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,000',1,1,'R');//end of line
*/
//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line
//output the result
$pdf->SetDrawColor(128,128,128);
        $pdf->SetLineWidth(2);
        $pdf->Line(-140, 80,650, 80); 
$pdf->Output();
?>