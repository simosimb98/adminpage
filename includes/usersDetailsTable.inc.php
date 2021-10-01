<?php

include 'capdb.inc.php';

$sql = "SELECT userID, name, surname, country, city, address, postalcode, shop
        FROM usersdetails NATURAL JOIN users ;";

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
                 
                 <td>
                  
                 <a href='usersDetails.php?userID=";
        echo $row["userID"]."&name=";echo $row['name']."&surname=";;echo $row['surname']."&country=";echo $row['country']."&city=";;echo $row['city']."&address=";echo$row['address']."&postalcode=";echo$row['postalcode']."&shop=";echo $row['shop'];
        echo "&modal=editUserDetails' class='edit'><i class='fas fa-edit' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                 ";
        echo "
                  </td>
                </tr> ";
        }
      }