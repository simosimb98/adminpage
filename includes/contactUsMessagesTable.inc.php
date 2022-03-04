<?php

include 'capdb.inc.php';

$sql = "SELECT * FROM contactlist ORDER BY contactID ASC;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        
      echo "<tr>
                 <td>".$row["contactID"]."</td>
                 <td>".$row["name"]."</td>
                 <td>".$row["surname"]."</td>
                 <td>".$row["email"]."</td>
                 <td>".$row["phone"]."</td>
                 <td>".$row["subject"]."</td>
                 <td>".$row["message"]."</td>
                 <td>".$row["datesent"]."</td>
                 ";

                echo " <td>";
                  
                 echo "<a href='contactUsMessages.php?contactID=";
        echo $row["contactID"];
        echo "&modal=deletemessage'  class='delete'><i class='far fa-trash-alt' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>   
                  </td>
                </tr> ";
        
        }
      }