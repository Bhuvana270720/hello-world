<?php  
 //fetch.php  
 include_once 'databaseconnection.php'; 
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM prescriptiondatastorage WHERE  datetimepatientid = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($con, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 