<?php

include 'capdb.inc.php';

$sql = "SELECT userID, name, surname, country, city, address, postalcode, shop, cooperates 
        FROM users
        NATURAL JOIN shops;";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        
      echo "<tr>
                 <td>".$row["userID"]."</td>
                 <td>".$row["name"]."</td>
                 <td>".$row["surname"]."</td>
                 <td>".$row["country"]."</td>
                 <td>".$row["city"]."</td>
                 <td>".$row["address"]."</td>
                 <td>".$row["postalcode"]."</td>
                 <td>".$row["shop"]."</td>
                 <td>".$row["cooperates"]."</td>

                </tr> ";
        }
      }