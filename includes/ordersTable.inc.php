<?php

include 'capdb.inc.php';

$sql = "SELECT *
        FROM orders AS a
        INNER JOIN orders_products AS b ON a.orderID = b.orderID
        INNER JOIN partsdetails AS c ON c.carpartID = b.carpartID
        INNER JOIN users AS d ON a.userID = d.userID
        GROUP BY b.orderID;";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$status = "";

if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){

        if($row['orderstatus'] == 1){
            $status = "Delivered";
        }else{
            $status = "Not deliverd";
        }
        
      echo "
      
      <tr>
                 <td>".$status."</td>
                 <td>".$row["orderID"]."</td>
                 <td>".$row["name"]." ".$row['surname']."</td>
                 <td>".$row["purchaseDate"]."</td>
                 <td>

                 <div class='table-wrapper'>
                 <table class='table table-bordered' width='50%' cellspacing='0'>
                 <thead>
                   <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Shipping</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>";

                    $orderquery = "SELECT *
                                    FROM orders AS a
                                    INNER JOIN orders_products AS b ON a.orderID = b.orderID
                                    INNER JOIN partsdetails AS c ON c.carpartID = b.carpartID
                                    WHERE b.orderID = '".$row['orderID']."';";
                                    
                    $resultorder = mysqli_query($conn, $orderquery);

                    while($rowOrder = mysqli_fetch_assoc($resultorder)){

                 echo "
                  <tr>
                        <td>".$rowOrder['productname']."</td>
                        <td>€".$rowOrder["price"]."</td>
                        <td>€".$rowOrder["shippingcost"]."</td>
                        <td>".$rowOrder["orderquantity"]."</td>
                        <td>€".$rowOrder["orderprice"]."</td>
                        </tr>
                        ";
                    }
                  echo  "</tbody>
                    </table>
                    
                 
                 <td>";
                  

        echo "<a href='orders.php?orderID=";
        echo $row["orderID"];
        echo "&modal=deleteOrder' class='delete'><i class='far fa-trash-alt' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>   
                  </td>
                </tr> ";
        }
      }