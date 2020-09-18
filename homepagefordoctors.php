<?php 
  include_once 'databaseconnection.php';
  session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>HomePage</title>
        <meta name="viewport" content ="width=device-width,initial-scale=10.0">
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="sweetalert2.css">
        <script src="sweetalert2.js"></script>
        <style>
        </style>
    </head>
    <body>
        <nav>
        <img src="logo.jpg">
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo">MedicareX</label>
            <ul>
                <li><a href="homepagefordoctors.php">Home</a></li>
                <li><a href="prescription.php">Prescription</a></li>
                <li><a href="patientcreatebydoctor.php">New Patient</a></li>
                <li><a href="fileupload.php">File Upload</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a style="color:red;" href="#"><?php echo $_SESSION['doctorname']; ?></a></li>
            <ul>
            
        </nav>
    </body>
</html>
    
