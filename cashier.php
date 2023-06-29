
<?php 
include ('session.php');
//include ('includes/header.php');
//include ('includes/navbar_top.php');
include ('includes/dbcon.php');
include ('gen_tno.php');
$name = $_SESSION['full'];
?>

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>JCBO | Pharmacy</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
           
    <a class="navbar-brand ps-3" href="index.php"><i class="fa-solid fa-prescription"></i> JCBO | Pharmacy</a>
    
      
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-4 my-5 my-md-0"></div>
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-2">
        
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-lg"></i></a>
                
            <ul class="dropdown-menu dropdown-menu-end justify-content-end" aria-labelledby="navbarDropdown">
               
                
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>   
           
        </li>
    </ul>
   
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="container-fluid px-4">


  <div class="card mb-4 mt-2">

    <div class="card-header bg-primary text-white">
    	<i class="fa-solid fa-face-smile-beam fa-lg"></i><b> HELLO! I'm <?php echo $name; ?> your cashier for today<b>
    </div>

    <div class="card-body">
      <!--Transfer from-->
      <form method="POST" name="sample">
        <div class="row">
          <div class="col-6">
            <input type="hidden" class="form-control" id="tno" name="tno" autocomplete="off" value="<?php echo $number;?>">
            <div class="input-group mb-3">

            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" >First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <input type="text" class="form-control" id="tfrom" name="tfrom" required autocomplete="off" placeholder="Enter First Name">
            </div>
            
            <div class="input-group mb-3">
              <span class="input-group-text" >Birth Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <input type="date" class="form-control" id="tfpos" name="tfpos" required autocomplete="off">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" >Identification #</span>
              <input type="text" class="form-control" id="office" name="office" placeholder="Enter Identification # (Leave blank if not applicable)">
            </div>
          </div>
          <!--End of Transfer from-->

          <!--Transfer To-->
          <div class="col-6">
            <div class="input-group mb-3">
                          <!--<h4>Transfer To:</h4>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="" style="margin: 0; margin-left: 5px; margin-top: 4px;"> View Personnel List</a>-->

                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" >Last Name &nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="text" class="form-control" id="tto" name="tto" required autocomplete="off" placeholder="Enter Last Name">
                          </div>


                          <div class="input-group mb-3">
                            <span class="input-group-text" >Contact #&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="text" class="form-control" id="ttopos" name="ttopos" required autocomplete="off" placeholder="Enter Contact Number">
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text" >Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="text" class="form-control" id="sector" name="sector" required autocomplete="off" placeholder="Enter Address">
                          </div>
                        </div>
                      </div>
                      <!--End of Transfer to-->

                      <input type="hidden" name="test" id="test1"><br><br>
                      <input type="hidden" id="remaining" name="remaining" required>
                      <input type="hidden" id="total">

                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead class="table bg-primary text-white">
                            <tr>
                              <th scope="col" class="text-center">#</th>
                              <th scope="col" class="text-center" style="width: 18%">QR Number</th>
                              <th scope="col" class="text-center">Product Name</th>
                              <th scope="col" class="text-center">Brand</th>
                              <th scope="col" class="text-center">Description</th>

                              <th scope="col" class="text-center"style="width: 5%">Stock</th>
                              <th scope="col" class="text-center" style="width: 2%">Quantity</th>
                              <th scope="col" class="text-center" style="width: 10%">Cost</th>
                              <th scope="col" class="text-center"  style="width: 10%">Total Cost</th>
                              <th scope="col" class="text-center" style="width: 1%"><strong>+</strong></th>
                            </tr>
                          </thead>
                          <tbody id="TBody" class="TBody">
                            <tr id="TRow">
                              <th scope="row"><input type="hidden" id="tno1" name="tno1" required="" autofocus></th>
                              <th><input type="text" class="form-control" id="sn" name="sn" required></th>
                              <th><input type="text" class="form-control" id="pics" name="pics" required></th>
                              <th><input type="text" class="form-control" id="brand" name="brand" required></th>
                              <th><input type="text" class="form-control" id="desc" name="desc" required/ style="height: 65px;"></th>

                              <th><input type="text" class="form-control" id="quan" name="quan" required readonly value="0"></th>
                              <th><input type="text" class="form-control" id="rquan" name="rquan" required value="1"></th>
                              <th><input type="text" class="form-control" id="cost" name="cost" value="0"></th>
                              <th><input type="text" class="form-control" id="tcost" name="tcost"  disabled required value="0"></th>
                              <th><input type="button" name="add" value="+" onclick="add_number(),addRow(),calc1()" class="btn btn-sm btn-success"></th>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      <h4>Item Details</h4>


                      <hr>
                      <style type="text/css">
                        .tbl thead, td{
                          border: 1px solid black;
                          border-collapse: collapse;
                          text-align: center;
                        }</style>
                        <div>
                          <table id="myTable" class="tbl" style="width:100%">
                            <thead class="thead">
                              <tr class="tr">
                                <th style="width: 2%;" class="th">#</th>
                                <th>QR Number</th>
                                <th>Product Name</th> 
                                <th>Brand</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                                <th>Total Cost</th>
                                <th style="width: 5%;" class="act"><strong>+</strong></th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot></tfoot>
                          </table>
                        </div>

                        <input type="hidden" class="btn btn-primary" onclick="Print()" value="Print">
                        <input type="hidden" value="Update" name="update_data" formaction="update_data.php">

                        <div class="row">
                          <div class="col-6">
                            <input type="hidden" class="form-control" id="tno" name="tno" autocomplete="off" value="<?php echo $number;?>">
                            <div class="input-group mb-3">

                            </div>

                            <div class="input-group mb-3">
                              <span class="input-group-text" >Sub Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                              <input type="text" id="val" name="val" class="form-control" onclick="calc1();" readonly value="0.00">

                            </div>


                            <div class="input-group mb-3">
                              <span class="input-group-text" >Total Payment</span>
                              <input type="number" id="ttlamnt" name="ttlamnt" class="form-control" onclick="calc1();" readonly value="0.00">

                            </div>


                          </div>
                          <!--End of Transfer from-->

                          <!--Transfer To-->
                          <div class="col-6">
                            <div class="input-group mb-3">
                          <!--<h4>Transfer To:</h4>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="" style="margin: 0; margin-left: 5px; margin-top: 4px;"> View Personnel List</a>-->

                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" >Discount %</span>
                            <input type="text" id="discnt" name="discnt" class="form-control" onkeyup="subt();" value="0">
                            <span class="input-group-text" >VAT %</span>
                            <input type="text" id="vat" name="vat" class="form-control" onkeyup="subt();" value="0">
                          </div>

                          
                          

                          <div class="input-group mb-3">
                            <div class="sub">
                              <button type="submit" class="btn btn-sm btn-primary" name="save_data" formaction="cashier_save_data.php"><i class="fa-solid fa-floppy-disk"></i> Save Record</button>
                             
                              <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" class="" style="margin: 0; color: white;"><i class="fa-solid fa-pills"></i> Product</a>

                               <a href="pos.php" class="btn btn-sm btn-secondary" name="" formaction=><i class="fa-solid fa-arrows-rotate"></i> Reset
                              </a>
                            </div>
                          </div>


                        </div>


                      </div>



                    </form>
                    <!--End of Card Body--> 
                  </div>
                </div>
              </div>

              <?php
              include ('includes/footer.php');
              //include ('includes/scripts.php');
              include ('view_item_modal.php');
              ?>



              <script>

                function addRow()
                { 
                  var tno1=document.sample.tno1.value; 
                  var sn=document.sample.sn.value; 
                  var brand=document.sample.brand.value; 
                  var desc=document.sample.desc.value; 
                  var pics=document.sample.pics.value;
                  var rquan=document.sample.rquan.value; 
                  var cost=document.sample.cost.value; 
                  var tcost=document.sample.tcost.value; 

                  var tr = document.createElement('tr');

                  var td1 = tr.appendChild(document.createElement('td'));
                  var td2 = tr.appendChild(document.createElement('td'));
                  var td3 = tr.appendChild(document.createElement('td'));
                  var td4 = tr.appendChild(document.createElement('td'));
                  var td5 = tr.appendChild(document.createElement('td'));
                  var td6 = tr.appendChild(document.createElement('td'));
                  var td7 = tr.appendChild(document.createElement('td'));
                  var td8 = tr.appendChild(document.createElement('td'));

                  var td9 = tr.appendChild(document.createElement('td'));



                  td1.innerHTML=tno1+'<input type="hidden" name="tno1[]" value="'+tno1+'">';
                  td2.innerHTML=sn+'<input type="hidden" name="sn[]" value="'+sn+'">';
                  td3.innerHTML=pics+'<input type="hidden" name="pics[]" value="'+pics+'">';
                  td4.innerHTML=brand+'<input type="hidden" name="brand[]" value="'+brand+'">';
                  td5.innerHTML=desc+'<input type="hidden" name="desc[]" value="'+desc+'">';

                  td6.innerHTML=rquan+'<input type="hidden" name="rquan[]" value="'+rquan+'">';
                  td7.innerHTML=cost+'<input type="hidden" name="cost[]" value="'+cost+'">';
                  td8.innerHTML=tcost+'<input type="hidden" name="tcost[]" value="'+tcost+'">';

                  td9.innerHTML='<input type="button" class="btn btn-sm btn-danger" name="del" value="X" onclick="delRow(this);" >'

                  document.getElementById("myTable").appendChild(tr);
                }


                function delRow(Stud)
                {
                  var s=Stud.parentNode.parentNode;
                  s.parentNode.removeChild(s);
                  calc1();

                  var quan = parseInt(document.getElementById("quan").value);
                  var rquan = parseInt(document.getElementById("rquan").value);
                  var result1 = quan + rquan;

                  document.getElementById("quan").value = result1;
                }  


                function add_number() 
                {

                  var quan = parseInt(document.getElementById("quan").value);
                  var cost = parseInt(document.getElementById("cost").value);
                  var rquan = parseInt(document.getElementById("rquan").value);
                  var result = rquan * cost;
                  var result1 = quan - rquan;



                  if(quan<rquan)
                  {
                   alert("Insufficient Stock")
                   header('location:transferslip.php');
                 }
                 else{
                //addStudent();
                document.getElementById("tcost").value = result;
                document.getElementById("remaining").value = result1;
                document.getElementById("quan").value = result1;
              }


            }

            function subt(){

             var a = document.getElementById("discnt").value;
             var b = document.getElementById("val").value;
             var c = document.getElementById("vat").value;
             //var c = document.getElementById("ttlamnt").value;


             if(a!=0){
               var discount = parseFloat(a)/100;
               var total = discount*parseFloat(b);
               var ttl = b-total;
             }else
             {
               var discount = parseFloat(c)/100;
               var total = discount*parseFloat(b);
               var ttl = parseFloat(b)+parseFloat(total);
             }
             
             //var ttl = total-document.getElementById("overall").value;
             document.getElementById("ttlamnt").value=ttl.toFixed(2);
             //document.getElementById("ttlamnt").value = 
             
           }

           

           function calc1(){

             var table = document.getElementById("myTable");
             let subTotal = Array.from(table.rows).slice(1).reduce((total, row) => {
              return total + parseInt(row.cells[7].innerHTML);
            }, 0);
            //document.getElementById("val").innerHTML = "SubTotal = $" + subTotal.toFixed(2);
            //document.getElementById("val1").innerHTML = subTotal2.toFixed(2);


            document.getElementById("val").value = parseFloat(subTotal).toFixed(2);
            //document.getElementById("vat").value = parseFloat(subTotal*0.12).toFixed(2);
            //document.getElementById("ttlamnt").value = parseFloat(subTotal+subTotal*0.12).toFixed(2);
            document.getElementById("ttlamnt").value = subTotal.toFixed(2);
          }

          $(document).ready(function() {
            $('#sn').keyup(function() {
              var sid = $(this).val();

              var data_String = 'sid=' + sid;
              $.get('search.php', data_String, function(result) {

                $.each(result, function(){
                  $('#brand').val(this.supplier);
                  $('#pics').val(this.name);
                  $('#desc').val(this.description);
                  $('#quan').val(this.quantity);
                  $('#cost').val(this.selling_price);

                });
              });
            });
          });

          $(document).ready(function() {
            $('#srch').keyup(function() {
              var sid = $(this).val();
              var data_String = 'sid=' + sid;
              $.get('search_personnel.php', data_String, function(result) {

                $.each(result, function(){
                  $('#tto').val(this.Full_N);
                  $('#ttopos').val(this.Designation);
                  $('#sector').val(this.Division_Sector); 
                });
              });
            });
          });
        </script>


