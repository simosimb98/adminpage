<?php

include 'capdb.inc.php';

$sql = "SELECT userID, name, surname, country, city, address, postalcode FROM users WHERE role = 1";

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

                 <td>
                 
                 <a href='adminsDetails.php?userID=";
                 echo $row["userID"]."&country=";echo $row['country']."&city=";;echo $row['city']."&address=";echo $row['address']."&postalcode=";;echo $row['postalcode'];
                 echo "&modal=editAdminInfo' class='edit'><i class='fas fa-edit' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>  
                           </td>
                         </tr> ";
        }
      }