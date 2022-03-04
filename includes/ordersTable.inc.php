<?php

include 'capdb.inc.php';

$sql = "SELECT *
        FROM orders AS a
        INNER JOIN orders_products AS b ON a.orderID = b.orderID
        INNER JOIN partsdetails AS c ON c.carpartID = b.carpartID
        INNER JOIN users AS d ON a.userID = d.userID;";

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
        
      echo "<tr>
                 <td>".$status."</td>
                 <td>".$row["orderID"]."</td>
                 <td>".$row["name"]." ".$row['surname']."</td>
                 <td>".$row["purchaseDate"]."</td>
                 <td>
                 <table class='table table-bordered' class = 'table text-center' id='dataTable' width='100%' cellspacing='0'>
                 <thead>
                   <tr>
                        <th scope='col'>Item</th>
                        <th scope='col'>Price</th>
                        <th scope='col'>Shipping</th>
                        <th scope='col'>Quantity</th>
                        <th scope='col'>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <td>".$row["productname"]."</td>
                        <td>€".$row["price"]."</td>
                        <td>€".$row["shippingcost"]."</td>
                        <td>".$row["orderquantity"]."</td>
                        <td>€".$row["orderprice"]."</td>
                    </tbody>
                    </table>
                 </td>
                 
                 <td>";
                  

        echo "<a href='orders.php?orderID=";
        echo $row["orderID"];
        echo "&modal=deleteOrder' class='delete'><i class='far fa-trash-alt' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>   
                  </td>
                </tr> ";
        
        }
      }