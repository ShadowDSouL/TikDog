<?php   
  
  include_once("conn.php");
 

  if(isset($_POST['btnsubmit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];

    $sql = "INSERT INTO announcement (`AnnTitle`, `AnnContent`, `AnnDate`) VALUES ('$title', '$content', '$date')";
    $result = mysqli_query($conn,$sql);
   
    
    
    header("Location:adminnewpost.php?type=2");
    
  }
  


?>