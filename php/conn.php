<?php 
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "sdp";


    $conn = mysqli_connect($servername, $user, $password, $dbase); 

    if($conn === false){
        die ("Error in connecting to database.....") . mysqli_connect_error(); 
    }
?>