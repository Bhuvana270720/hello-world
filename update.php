<?php  
 include_once 'databaseconnection.php'; 
 session_start();
 $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
 function decryptthis($data, $key) {
     $encryption_key = base64_decode($key);
     list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
     return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
     }
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $patientid = mysqli_real_escape_string($con, $_POST["patientid"]);  
      $hospitalname = mysqli_real_escape_string($con, $_POST["hospitalname"]);  
      $doctorname = mysqli_real_escape_string($con, $_POST["doctorname"]);    
      $patientname = mysqli_real_escape_string($con, $_POST["patientname"]);
      $age = mysqli_real_escape_string($con, $_POST["age"]);
      $gender = mysqli_real_escape_string($con, $_POST["gender"]);  
      $symptoms = mysqli_real_escape_string($con, decryptthis($_POST["symptoms"],$key));
      $findings = mysqli_real_escape_string($con, decryptthis($_POST["findings"],$key));  
      $diagnosis = mysqli_real_escape_string($con, decryptthis($_POST["diagnosis"],$key));  
      $medicines = mysqli_real_escape_string($con, decryptthis($_POST["medicines"],$key));
      $employee_id=mysqli_real_escape_string($con,$_POST["employee_id"]);
      //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
      $query = "UPDATE prescriptiondatastorage SET patientid='$patientid',hospitalname='$hospitalname',doctorname='$doctorname',patientname= '$patientname',age = '$age',symptoms = '$symptoms',findings= '$findings',diagnosis= '$diagnosis',medicines= '$medicines' WHERE  datetimepatientid='".$_POST["employee_id"]."'";  
      $message="data updated";   
         
      if(mysqli_query($con, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM  prescriptiondatastorage where patientid='".$_SESSION['patientid']."'";  
           $result = mysqli_query($con, $select_query);  
           $output .= '  
                <table class="table table-bordered">   
                     <tr>  
                        <th width="70%">Date</th>  
                        <th width="60%">DoctorName</th>
                        <th width="60%">PatientName</th> 
                        <th width="15%">Edit</th>  
                        <th width="15%">View</th>  
                    </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' .$row["dates"]. '</td>
                          <td>' .$row["doctorname"]. '</td>
                          <td>' .$row["patientname"]. '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["datetimepatientid"].'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["datetimepatientid"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
        }
      echo $output;  
 }  
 ?>