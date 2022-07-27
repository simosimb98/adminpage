<?php

$sql = "SELECT date_format(purchaseDate,'%b') AS purchase, SUM(orderprice) AS total
        FROM orders AS a
        INNER JOIN orders_products AS b ON a.orderID = b.orderID
        WHERE a.purchaseDate > now() - INTERVAL 3 MONTH
        GROUP BY date_format(purchaseDate,'%b');";
        
$result = mysqli_query($conn, $sql);

foreach($result as $data){
    $months[] = $data['purchase'];
    $total[] = $data['total'];
}
?>

<script>
const labels = <?php echo json_encode($months)?>;
const data = {
  labels: labels,
  datasets: [{
    label: 'Earnings line chart',
    data: <?php echo json_encode($total)?>,
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
};

const config = {
  type: 'line',
  data: data,
};

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

 </script>