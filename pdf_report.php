<?php
require_once('tcpdf/tcpdf.php');  
$pdf = new TCPDF('P','mm', array(215.9,355.6), true, 'UTF-8', false);  
$pdf->SetCreator(PDF_CREATOR);  
$pdf->SetTitle("Sales Report");  
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$pdf->SetDefaultMonospacedFont('helvetica');  
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$pdf->SetMargins(PDF_MARGIN_LEFT, '0', PDF_MARGIN_RIGHT);  
$pdf->setPrintHeader(false);  
$pdf->setPrintFooter(false);  
$pdf->SetAutoPageBreak(TRUE, 10);  
$pdf->SetFont('helvetica', '', 8);  
$pdf->AddPage();  




function generateRow(){
    $contents = '';
    include 'includes/dbcon.php';
    if(isset($_POST['export']))
    {
        $mnth = trim($_POST['mnth']);
        $yr = trim($_POST['yr']);

        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];

        if($date1 && $date2)
        {
            $sql = "SELECT * FROM rp_view WHERE date(rp_view.dte) BETWEEN '$date1' AND '$date2' ORDER BY dte DESC";
            
            
            $query = mysqli_query($con,$sql);

            while($row = mysqli_fetch_array($query))
            {
                $contents .= '
                <tr>
            
            <td>'.$row['sn'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['brand'].'</td>
            <td>'.$row['stock'].'</td>
            <td>'.$row['sold'].'</td>

            <td>'.$row['cp'].'</td>
            <td>'.$row['sp'].'</td>
            <td>'.$row['capital'].'</td>
            <td>'.$row['income'].'</td>
            <td>'.$row['dte'].'</td>
            
            </tr>
                ';
            }
        }
    elseif($mnth && $yr){
          $sql = "SELECT * FROM rp_view WHERE mnth='$mnth' AND yr='$yr' ORDER BY dte DESC ";
          
          
          $query = mysqli_query($con,$sql);

          while($row = mysqli_fetch_array($query))
          {
            $contents .= '
            <tr>
            
            <td>'.$row['sn'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['brand'].'</td>
            <td>'.$row['stock'].'</td>
            <td>'.$row['sold'].'</td>

            <td>'.$row['cp'].'</td>
            <td>'.$row['sp'].'</td>
            <td>'.$row['capital'].'</td>
            <td>'.$row['income'].'</td>
            <td>'.$row['dte'].'</td>
            
            </tr>
            ';
        }
    }
   elseif($yr){
          $sql = "SELECT * FROM rp_view where yr = '$yr' ORDER BY dte DESC";
          
          
          $query = mysqli_query($con,$sql);

          while($row = mysqli_fetch_array($query))
          {
            $contents .= '
           
            <tr>
            
            <td>'.$row['sn'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['brand'].'</td>
            <td>'.$row['stock'].'</td>
            <td>'.$row['sold'].'</td>

            <td>'.$row['cp'].'</td>
            <td>'.$row['sp'].'</td>
            <td>'.$row['capital'].'</td>
            <td>'.$row['income'].'</td>
            <td>'.$row['dte'].'</td>
            
            </tr>
            
            
            ';
        }
    }else{
          $sql = "SELECT * FROM rp_view ORDER BY dte DESC";
          
          
          $query = mysqli_query($con,$sql);

          while($row = mysqli_fetch_array($query))
          {
            $contents .= '
           
            <tr>
            
            <td>'.$row['sn'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['brand'].'</td>
            <td>'.$row['stock'].'</td>
            <td>'.$row['sold'].'</td>

            <td>'.$row['cp'].'</td>
            <td>'.$row['sp'].'</td>
            <td>'.$row['capital'].'</td>
            <td>'.$row['income'].'</td>
            <td>'.$row['dte'].'</td>
            
            </tr>
            
            
            ';
        }
    

    }

}
return $contents;
}


function gendate(){
    $contents = '';
    include 'includes/dbcon.php';
    if(isset($_POST['export'])){

        $mnth = $_POST['mnth'];
        $yr = $_POST['yr'];

        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];

        if($date1 && $date2)
        {
            $date1 = date("m-d", strtotime($_POST['date1']));
            $date2 = date("m-d-Y", strtotime($_POST['date2']));
            $contents .= '

            <label style="text-align:center; font-size:10px;"><strong>Sales Report as of:</strong> '.$date1.' <b>to</b> '.$date2.'</label>          
            <div></div>

            ';        
        }
        elseif($yr && $mnth)
        {   
            $yr = $_POST['yr'];

            $mnth = $_POST['mnth'];
          
            $contents .= '

            <label style="text-align:center; font-size:10px;"><strong>Sales Report as of:</strong>'.$mnth.' '.$yr.'</label>          
            <div></div>

            ';        
        }elseif ($yr) {
           $yr = $_POST['yr'];

           
          
            $contents .= '

            <label style="text-align:center; font-size:10px;"><strong>Sales Report as of:</strong>'.$mnth.' '.$yr.'</label>          
            <div></div>

            ';        
        }
        else{
            $dte = date("m-d-Y");
            $contents .= '

            <label style="text-align:center; font-size:10px;"><strong>Sales Report as of:</strong> '.$dte.' </label>          
            <div></div>
            ';
        }
    }
    return $contents;
}

function generatefoot(){
    $contents = '';
    include 'includes/dbcon.php';
    if(isset($_POST['export'])){

        $mnth = $_POST['mnth'];
        $yr = $_POST['yr'];
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $inc = $_POST['c'];
        $expense = $_POST['d'];
        $oa =$_POST['e'];

        $query=mysqli_query($con, "SELECT SUM(income) as ti FROM rp_view WHERE date(dte) BETWEEN '$date1' AND '$date2'");
        $row = mysqli_fetch_assoc($query);
        $sum = $row['ti'];
        
        
        if(!empty($date1) && !empty($date2))
        {
            $sql = "SELECT SUM(capital) as tc FROM (SELECT DISTINCT sn, capital,income, dte FROM rp_view GROUP BY ordr) t WHERE date(dte) BETWEEN '$date1' AND '$date2'";
            
            $query = mysqli_query($con,$sql);


            while($row = mysqli_fetch_array($query))
            {

                $contents .= '

                 <tr>  
                
               
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                  <tr>  

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Income</td>
                <td style= "text-align:right;"colspan="1">'.$inc.'</td>
                </tr>

                <tr>  
                  <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Revenue</td>
                <td style= "text-align:right;"colspan="1">'.$expense.'</td>
                </tr>

                <tr>  
                  <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Expenses</td>
                <td style= "text-align:right;"colspan="1">'.$oa.'</td>
                </tr>
                ';
            }  
        }
        elseif(!empty($yr))
        {
        
            $sql = "SELECT SUM(income) as tc FROM (SELECT DISTINCT sn, sp,capital, income, yr, revenue FROM rp_view GROUP BY ordr) t WHERE yr='$yr'"; 
            
            $query = mysqli_query($con,$sql);

            while($row = mysqli_fetch_array($query))
            {
                $contents .= '

                <tr>  
                
               
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                  <tr>  

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Income</td>
                <td style= "text-align:right;"colspan="1">'.$inc.'</td>
                </tr>

                <tr>  
                  <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Revenue</td>
                <td style= "text-align:right;"colspan="1">'.$expense.'</td>
                </tr>

                <tr>  
                  <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Expenses</td>
                <td style= "text-align:right;"colspan="1">'.$oa.'</td>
                </tr>
                ';
            }  
        }

        elseif($mnth && $yr)
        {
            $sql = "SELECT SUM(sp) as tc FROM (SELECT DISTINCT sn, sp,capital, income, revenue, yr FROM rp_view GROUP BY ordr) t WHERE mnth='$mnth' && yr='$yr'"; 
            
            $query = mysqli_query($con,$sql);

            while($row = mysqli_fetch_array($query))
            {
                $contents .= '

               


                 <tr>  
                
               
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                  <tr>  

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Income</td>
                <td style= "text-align:right;"colspan="1">'.$inc.'</td>
                </tr>

                <tr>  
                  <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Revenue</td>
                <td style= "text-align:right;"colspan="1">'.$expense.'</td>
                </tr>

                <tr>  
                  <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Expenses</td>
                <td style= "text-align:right;"colspan="1">'.$oa.'</td>
                </tr>
                ';
            }  
        }
        else
        {   
           

            $sql = "SELECT SUM(income) as tc FROM (SELECT DISTINCT sn, capital, income FROM rp_view GROUP BY ordr) t";
            $query = mysqli_query($con,$sql);

            while($row = mysqli_fetch_array($query))
            {
                $total = $row['tc']+$sum;
                $contents .= '

                

                <tr>  
                
               
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                  <tr>  

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Income</td>
                <td style= "text-align:right;"colspan="1">'.$inc.'</td>
                </tr>

                <tr>  
                  <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Revenue</td>
                <td style= "text-align:right;"colspan="1">'.$expense.'</td>
                </tr>

                <tr>  
                  <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style= "text-align:right;"colspan="2">Total Expenses</td>
                <td style= "text-align:right;"colspan="1">'.$oa.'</td>
                </tr>
                ';
            }
        }
        
    }
    return $contents;
}


$content = '';  
$content .= '

<table cellspacing="0" cellpadding="0" >  
<div></div>
<tr>  
<th width="100%" style=" text-align: center; font-weight: bold; font-size:12px;">JCBO | PHARMACY</th>
</tr>
<tr>  
<td width="100%" style=" text-align: center; font-size:8px;;">2039 San Andres cor. Angel Linao Malate Manila</td>
</tr>
<tr>
<td width="100%" style=" text-align: center; font-size:8px;;">Malate, NCR, CITY Of Manila, First District</td>
</tr> 
<br>';
$content .= '</table>';  
$pdf->writeHTML($content); 

$content = '';
$content .= '';
$content .= gendate();   
$pdf->writeHTML($content);  

    //Item/Equipment
$content = '';  
$content .= '
<table border="1" cellspacing="0" cellpadding="3" >  
<tr>  
<th width="8%" style=" text-align: center; font-weight: bold; font-size:8px;">Product No.</th>
<th  style=" text-align: center; font-weight: bold; font-size:8px; ">Name</th>
<th  style=" text-align: center; font-weight: bold; font-size:8px;">Brand</th> 
<th  style=" text-align: center; font-weight: bold; font-size:8px;">Stock</th> 
<th  style=" text-align: center; font-weight: bold; font-size:8px;">Sold</th>
<th  style=" text-align: center; font-weight: bold; font-size:8px;">Cost Price</th>
<th  style=" text-align: center; font-weight: bold; font-size:8px;">Selling Price</th>
<th  style=" text-align: center; font-weight: bold; font-size:8px;">Profit</th>
<th  style=" text-align: center; font-weight: bold; font-size:8px;">Total Profit</th>
<th  width= "10%"; style=" text-align: center; font-weight: bold; font-size:8px;">Date</th>
</tr> ';
$content .= generateRow();  
$content .= generatefoot();  
$content .= '</table>';  
$pdf->writeHTML($content); 



$content = '';  
$content .= '
<table cellspacing="0" cellpadding="3" >  
<tr>  
<td width="100%" style=" text-align: right; font-size: 10px;"><strong>____________________________</strong>
<br>Cashier/Authorized Representative
</td>
</tr> 

';
$content .= '</table>';  
$pdf->writeHTML($content); 


$content = '';  
$content .= '
<h4>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -Nothing Follows- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</h4>

'; 
$content .= '';  
$pdf->writeHTML($content); 
$content = '';  
$content .= '
<div style="position: fixed;
left: 0;
bottom: 0;
margin-top:500px;
width: 100%;"></div>

'; 
$content .= '';  
$pdf->writeHTML($content); 

$pdf->SetY(336);
$pdf->SetFont('helvetica', 'I', 8);
$pdf->Cell(0, 8, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

$pdf->Output();




?>