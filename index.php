<?php 
    include ('session.php');
    include ('includes/header.php');
    include ('includes/dbcon.php');
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid px-4">

    <h4 class="mt-4"><i class="fa-solid fa-prescription"></i> JCBO | Pharmacy System</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!--Count total Number of Personnel Registered-->
    <?php
       $query=mysqli_query($con, "SELECT SUM(income) as ti FROM rp_view");
       $row = mysqli_fetch_assoc($query);
       $sum = $row['ti'];
    ?>
 <div class="row">

    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body d-flex align-items-center justify-content-between">
            	<h2 class="mb-0"><?php echo $sum.''.'.00'; ?></h2>
            	<i class="fa-solid fa-money-bill-trend-up fa-2xl"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                Total Sales
            </div>
        </div>
    </div>
    <!--Count total Number of Total Item Transfered-->
    <?php
        $query = mysqli_query($con,"select * from transfer_tbl");
        $count = mysqli_num_rows($query);
    ?>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
           <div class="card-body d-flex align-items-center justify-content-between">
            	<h2 class="mb-0"><?php echo $count; ?></h2>
            	<i class="fa-solid fa-clipboard-user fa-2xl"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                 <a class="nav-link" href="profiling.php">
				Total Customer Profile
				</a>
            </div>
        </div>
    </div>

    <!--Count total Number of Total Items-->
    <?php
        $query = mysqli_query($con,"select * from items");
        $count = mysqli_num_rows($query);
    ?>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
           <div class="card-body d-flex align-items-center justify-content-between">
            	<h2 class="mb-0"><?php echo $count; ?></h2>
            	<i class="fa-solid fa-capsules fa-2xl"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
			 <a class="nav-link" href="manage_product.php">
                Total Product
				</a>
            </div>
        </div>
    </div>

    <!--Count total Number of Critical Items-->
    <?php
        $query = mysqli_query($con,"select * from items where quantity<=30");
        $count = mysqli_num_rows($query);
    ?>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
           <div class="card-body d-flex align-items-center justify-content-between">
            	<h2 class="mb-0"><?php echo $count;  ?></h2>
            	<i class="fa-solid fa-arrow-turn-down fa-2xl"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
			 <a class="nav-link" href="manage_notification.php">
Stock in Critical Level
 
   </a>
            </div>
        </div>
    </div>

  </div>

  
<!--Data Visualization-->
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header  bg-primary text-white">
                <i class="fa-solid fa-chart-column"></i>
                Most Consumable Product
            </div>
            <div class="card-body" style="width: 500px;">  
                <canvas id="barchart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header  bg-primary text-white">
                <i class="fa-solid fa-chart-line"></i>
                Monthly & Yearly Sales
            </div>
            <div class="card-body" style="width: 500px;"> 
                <canvas id="linechart"></canvas>
            </div>
        </div>
    </div>

<!--End Data Visualization-->


  </div>




<?php
	include ('includes/footer.php');
	include ('includes/scripts.php');
?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php 
$query = "SELECT MONTHNAME(dte) as month,YEAR(dte) as year,SUM(cost*quantity) as amount,SUM(quantity) as quan,pics FROM rec_list GROUP BY month order by dte ASC" ;
$result = mysqli_query($con,$query);
foreach($result as $data)
{	

    $month[] = $data['month'].' '.$data['year'];
    
    $amount[] = $data['amount'];
  
}
?>

<?php 
$query = "SELECT MONTHNAME(dte) as month,YEAR(dte) as year,SUM(cost*quantity) as amount,SUM(quantity) as quan,pics FROM rec_list GROUP BY sn order by quan DESC" ;
$result = mysqli_query($con,$query);
foreach($result as $data)
{	

    $pics[] = $data['pics'];
    $quan[] = $data['quan'];
}
?>
<script>

    //Bar Chart
    var labels = <?php echo json_encode($pics) ?>;

    const data = {
        labels: labels,
        datasets: [{
            label: 'Consumable Product',
            data: <?php echo json_encode($quan) ?>,
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            
            ],
            borderWidth: 1
        }]


    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: 
            {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var barchart = new Chart(
        document.getElementById('barchart'),
        config
        );
    //End Bar Chart



    //Line Chart
    const labelline = <?php echo json_encode($month)  ?>;
    const dataline = {
        labels: labelline,
        datasets: [{
            label: 'Montly & Yearly Sales',
            data: <?php echo json_encode($amount) ?>,
            fill: false,
            backgroundColor: [
            'rgb(75, 192, 192)'
            ],
            borderColor: [
            'rgb(75, 192, 192)'
            
            ],
            tension: 0.1,
            borderWidth: 1
        }]
    };


    const configline = {
        type: 'line',
        data: dataline,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var linechart = new Chart(
        document.getElementById('linechart'),
        configline
        );
    //End Line Chart

</script>
