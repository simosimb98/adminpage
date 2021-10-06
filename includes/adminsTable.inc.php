<?php

include 'capdb.inc.php';

$sql = "SELECT * FROM users WHERE role = 1 ORDER BY userID ASC;";
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
                  
                 <a href='admins.php?userID=";
        echo $row["userID"]."&name=";echo $row['name']."&surname=";;echo $row['surname']."&email=";echo $row['email']."&phone=";;echo $row['phone'];
        echo "&modal=editAdminDetails' class='edit'><i class='fas fa-edit' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                 <a href='admins.php?userID=";
        echo $row["userID"];
        echo "&modal=deleteAdmin'  class='delete'><i class='far fa-trash-alt' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>   
                  </td>
                </tr> ";
        
        }
      }