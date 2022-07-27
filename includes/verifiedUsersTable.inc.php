<?php

include 'capdb.inc.php';

$sql = "SELECT userID, name, surname, email, phone, status FROM users WHERE status = 1 AND role = 2 OR role = 3 OR role = 4 ORDER BY userID ASC;";
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
                 ";

                 if($row["status"] == 1 ){
                   echo "<td>Activated</td>";
                 }else{
                  echo "<td>Deactivated</td>";
                 }
                 
                 
                echo " <td>";
                  
                 echo "<a href='verifiedUsers.php?userID=";
        echo $row["userID"];
        echo "&modal=deleteVerifiedUser'  class='delete'><i class='far fa-window-close' data-toggle='tooltip' title='Deactivate'>&#xE872;</i></a>   
                  </td>
                </tr> ";
        
        }
      }