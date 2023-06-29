<?php



function add(){
  $contents = '';
  include 'includes/dbcon.php';
  if(isset($_GET['id'])){
     $tno = $_GET['id'];
    
        //use for MySQLi OOP

 }
 return $contents;
}

function generateRow(){
  $contents = '';
  include 'includes/dbcon.php';
  if(isset($_GET['id'])){
     $tno = $_GET['id'];
     $sql = "SELECT * FROM rec_list WHERE tno='$tno' ";
    // $q = "SELECT SUM(quantity) FROM rec_list WHERE tno='$tno' ";

		//use for MySQLi OOP
     $query = mysqli_query($con,$sql);
     while($row = mysqli_fetch_array($query)){
         $contents .= '
         <tr>
         <td>'.$row["sn"].'</td>
         <td>'.$row["pics"].' '.$row['brand'].'</td>

         <td>'.$row["description"].'</td>
         <td>'.$row["quantity"].'</td>
         <td style="text-align:right;">'.$row["cost"].'.00</td>
         </tr>
         ';

     }

 }
 return $contents;
}




function generateU(){
  $contents = '';
  include 'includes/dbcon.php';
  if(isset($_GET['id'])){
     $tno = $_GET['id'];
     $sql = "SELECT * FROM transfer_tbl WHERE tno='$tno' ";
		//use for MySQLi OOP
     $query = mysqli_query($con,$sql);
     while($row = mysqli_fetch_array($query)){
         $contents .= '
         <b>______________Order #: '.$row['tno'].'_______________</b><br>
         <table cellspacing="0" cellpadding=""> 
         <tr>  
         <th></th>
         <th></th>
         <th></th>
         <th width="45px;"style=" text-align:left; font-weight: bold;"></th>
         <th width="25"><b>Total:</b></th>
         <th>  '.$row['tcost'].'</th>
         </tr>
         <h4>CUSTOMER DETAILS</h4> 
         <tr>  
         <th width="120;">FULL NAME</th>
         <th width="5px;"style=" text-align:left; font-weight: bold;">:</th>
         <th width="120;"style=" text-align:left; border-bottom: solid; border-bottom-width: 1px;">  '.$row['tfrom'].' '.$row['tto'].'</th>
         </tr> 

         <tr>  
         <th width="120">BIRTH DATE</th>
         <th width="5px;"style=" text-align:left; font-weight: bold;">:</th>
         <th width="120;"style=" text-align:left; border-bottom: solid; border-bottom-width: 1px;">  '.$row['tfpos'].'</th>
         </tr> 

         <tr>  
         <th width="120;">ADDRESS</th>
         <th width="5px;"style=" text-align:left; font-weight: bold;">:</th>
         <th width="120px;"style=" text-align:left; border-bottom: solid; border-bottom-width: 1px;">  '.$row['ttopos'].' </th>
         </tr> 

         <tr>  
         <th width="120">CONTACT NUMBER</th>
         <th width="5px;"style=" text-align:left; font-weight: bold;">:</th>
         <th width="120;"style=" text-align:left; border-bottom: solid; border-bottom-width: 1px;">  '.$row['sector'].' </th>
         </tr> 

         <tr>  
         <th width="120;">IDENTIFICATION NUMBER</th>
         <th width="5px;"style=" text-align:left; font-weight: bold;">:</th>
         <th width="120;"style=" text-align:left; border-bottom: solid; border-bottom-width: 1px;">  '.$row['office'].'</th>
         </tr> 
         <tr>  
         <th width="120;">DATE SOLD</th>
         <th width="5px;"style=" text-align:left; font-weight: bold;">:</th>
         <th width="120;"style=" text-align:left; border-bottom: solid; border-bottom-width: 1px;">  '.$row['dte'].'</th>
         </tr> 
         <tr>  
         <th width="120;">SIGNATURE</th>
         <th width="5px;"style=" text-align:left; font-weight: bold;">:</th>
         <th width="120;"style=" text-align:left; border-bottom: solid; border-bottom-width: 1px;"></th>
         </tr> 

         ';
     }

 }
 return $contents;
}

require_once('tcpdf/tcpdf.php');  
$pdf = new TCPDF('P','mm', array(112,200), true, 'UTF-8', false);  
$pdf->SetCreator(PDF_CREATOR);  
$pdf->SetTitle("Generated PDF using TCPDF");  
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$pdf->SetDefaultMonospacedFont('helvetica');  
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
$pdf->setPrintHeader(false);  
$pdf->setPrintFooter(false);  
$pdf->SetAutoPageBreak(TRUE, 10);  
$pdf->SetFont('helvetica', '', 9);  
$pdf->AddPage();  

    //Item/Equipment
$content = '';  
$content .= '

<table cellspacing="0" cellpadding="0" >  
<tr>  
<th width="100%" style=" text-align: center; font-weight: bold; font-size:12px;">JCBO | PHARMACY</th>
</tr>
<tr>  
<td width="100%" style=" text-align: center; font-size:8px;;">2039 San Andres cor. Angel Linao Malate Manila</td>
</tr>
<tr>
<td width="100%" style=" text-align: center; font-size:8px;;">Malate, NCR, CITY Of Manila, First District</td>
</tr> 
</table>
<br>
<h4>PRODUCT DETAILS:</h4>
<b>______________________________________________</b><br>
<table border="0" cellspacing="0" cellpadding="3" align="center">  
<tr>  
<th style=" text-align: center; font-weight: bold;">Product #</th>
<th  style=" text-align: center; font-weight: bold;">Product<br>name</th>

<th width="25%" style=" text-align: center; font-weight: bold;">Description</th>
<th width="20%" style=" text-align: center; font-weight: bold;">Quantity</th>
<th width="15%" style=" text-align: center; font-weight: bold;">Cost</th>

</tr> ';
$content .= generateRow();  
$content .= '</table>';  
$pdf->writeHTML($content); 

    //Transfer Personnel
    $content = '';//separator
    $content .= '';//separator
    $content .= generateU();   
    $content .= '</table>';  

    $pdf->writeHTML($content);  


    $content = '';  
    $content .= '
    <div></div>
    <div></div>
    <table cellspacing="0" cellpadding="3" >  
    <tr>  
    <td width="100%" style=" text-align: right; font-size: 8px;"><strong>_______________</strong>
    <p>Cashier Signature</p>
    </td>
    </tr> 

    ';
    //$content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content); 

    
    $pdf->Output();




    ?>