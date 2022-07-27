 <?php
 include_once "includes/header.inc.php";
 include_once "includes/capdb.inc.php"
 ?>
 <head>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
 </head>
  
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#manualIndex" class="btn btn-primary" data-toggle="modal"><i class="fas fa-question-circle">
                        </i> <span>Help</span></a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <?php
                                       $sqlAmm = "SELECT date_format(purchaseDate,'%b') AS purchase, SUM(orderprice) AS totalM
                                                    FROM orders AS a
                                                    INNER JOIN orders_products AS b ON a.orderID = b.orderID
                                                    WHERE date_format(purchaseDate,'%b') = date_format(now(),'%b')
                                                    ;";

                                        $resultAmm = mysqli_query($conn, $sqlAmm);

                                        foreach($resultAmm as $data){

                                            $totalM[] = $data['totalM'];
                                        

                                        ?>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Sales Ammount(Current Month)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">€<?php echo $totalM[0];?></div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php
                                            $totalMsgs = "SELECT * FROM contactlist;";
                                            $resultMsgs = mysqli_query($conn, $totalMsgs);
                                            $resultCheckMsgs = mysqli_num_rows($resultMsgs);
                                            ?>
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total messages</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resultCheckMsgs;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Users
                                            </div>
                                            <?php
                                            $totalUsers = "SELECT * FROM users WHERE status = 1;";
                                            $resultTU = mysqli_query($conn, $totalUsers);
                                            $resultCheckTU = mysqli_num_rows($resultTU);

                                            ?>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $resultCheckTU;?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php
                                            $totalPendingUsers = "SELECT * FROM users WHERE status = 0;";
                                            $resultP = mysqli_query($conn, $totalPendingUsers);
                                            $resultPCheck = mysqli_num_rows($resultP)

                                            ?>
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resultPCheck?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                     

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" style="height: 450px;">
                                    <div class="chart-area">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Top sellers -->
                      <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Top sellers</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                                    <?php
                                                    $topSellers = "SELECT name, surname, SUM(orderquantity)
                                                                    FROM users AS a
                                                                    INNER JOIN partsdetails AS b ON  a.userID = b.userID
                                                                    INNER JOIN orders_products AS c ON b.carpartID = c.carpartID 
                                                                    GROUP BY name,surname ORDER BY SUM(orderquantity) DESC
                                                                    LIMIT 3;";

                                                    $resultSellers = mysqli_query($conn, $topSellers);

                                                    foreach($resultSellers as $dataSellers){
                                                        $usersName[] = $dataSellers['name'];
                                                        $usersSurname[] = $dataSellers['surname'];
                                                        
                                                    ?>
                                                    <?php
                                                    }
                                                    ?>
                                                    <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                <th>1</th>
                                                <td><?php echo $usersName[0];?> <?php echo $usersSurname[0];?></td>
                                                </tr>
                                                <tr>
                                                <th>2</th>
                                                <td><?php echo $usersName[1];?> <?php echo $usersSurname[1];?></td>
                                                </tr>
                                                <tr>
                                                <th>3</th>
                                                <td><?php echo $usersName[2];?> <?php echo $usersSurname[2];?></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Content Row -->

                    <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body" style="height: 450px;">
                                <div class="chart-area" style="width: 100%;">
                                    <canvas id="usersChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                        <!-- Top selling products -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Top selling products</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                                    <?php
                                                    $topProducts = "SELECT productname, SUM(orderquantity)
                                                                    FROM partsdetails AS a
                                                                    INNER JOIN orders_products AS b ON  a.carpartID = b.carpartID
                                                                    GROUP BY productname ORDER BY SUM(orderquantity) DESC
                                                                    LIMIT 3;";

                                                    $resultProducts = mysqli_query($conn, $topProducts);

                                                    foreach($resultProducts as $dataProducts){
                                                        $productsname[] = $dataProducts['productname'];
                                                        
                                                    ?>
                                                    <?php
                                                    }
                                                    ?>
                                                    <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                <th>1</th>
                                                <td><?php echo $productsname[0];?></td>
                                                </tr>

                                                <tr>
                                                <th>2</th>
                                                <td><?php echo $productsname[1];?></td>
                                                </tr>
                                                

                                                <tr>
                                                <th>3</th>
                                                <td><?php echo $productsname[2];?></td>
                                                </tr>

                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                    
                </div>

                <!-- /.container-fluid -->

            </div>
          <!-- End of Main Content -->

           <!-- Manual Modal HTML -->
   <div id="manualIndex" class="modal fade">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">              
                   <?php
                      include_once 'manuals/manualIndex.html';         
                   ?>  
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" data-dismiss="modal" value="Ok" ?>
                    </div>
               
            </div>
        </div>
    </div>
        
<?php include_once 'includes/earningsChart.inc.php';?>

<?php
$sql = "SELECT date_format(purchaseDate,'%b') AS purchase, SUM(orderprice) AS total
FROM orders AS a
INNER JOIN orders_products AS b ON a.orderID = b.orderID
WHERE a.purchaseDate > now() - INTERVAL 3 MONTH
GROUP BY date_format(purchaseDate,'%b');";

$resultMonths = mysqli_query($conn, $sql);

foreach($resultMonths as $monthsData){

    $months2[] = $monthsData['purchase'];
    $total2[] = $monthsData['total'];
}
?>

<script>

const labels2 = <?php echo json_encode($months2)?>;
const data2 = {
  labels: labels2,
  datasets: [{
    label: 'Earnings bar chart',
    data: <?php echo json_encode($total2)?>,
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
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const config2 = {
  type: 'bar',
  data: data2,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};

const usersChart = new Chart(
    document.getElementById('usersChart'),
    config2
  );

 </script>

<?php
 include_once "includes/footer.inc.php";
 ?>

