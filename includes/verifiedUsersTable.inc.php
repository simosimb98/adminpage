<?php

include 'capdb.inc.php';

$sql = "SELECT * FROM users WHERE status = 1 AND role = 2 OR role = 3 OR role = 4 ORDER BY userID ASC;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        
      echo "<tr>
                 <td>".$row["userID"]."</td>
                 <td>".$row["name"]."</td>
                 <td>".$row["surname"]."</td>
                 <td>".$row["email"]."</td>
                 <td>".$row["phone"]."</td>
                 
                 <td>
                  
                 <a href='verifiedUsers.php?userID=";
        echo $row["userID"]."&name=";echo $row['name']."&surname=";;echo $row['surname']."&phone=";echo $row['phone']."&email=";;echo $row['email'];
        echo "&modal=editCheckedUser' class='edit'><i class='fas fa-edit' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                 <a href='verifiedUsers.php?userID=";
        echo $row["userID"];
        echo "&modal=deleteVerifiedUser'  class='delete'><i class='far fa-trash-alt' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>   
                  </td>
                </tr> ";
        
        }
      }