<?php include_once("conn.php") ?>
<?php 
    session_start();

    

    if(isset($_POST["feedbackSubmit"])){
      $id = $_SESSION['userID'];
      $title = $_POST['feedbackTitle'];
      $content = $_POST['feedbackComment'];
      $date = date("Y.m.d");
  
   if($title == NULL || $content == NULL){
      echo "<script>
              Swal.fire({
                title:'Oops...',
                text:'Please Fill Out the Field!!',
                icon:'error',
                showConfirmButton: false,
                timer:1500,
                showClass: {
                  popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                  popup: 'animate__animated animate__fadeOutUp'
                },
              })
            </script>";
   }else{
      $sql = "INSERT INTO feedback (FeedbackTitle, FeedbackContent, FeedbackDate, UserID) VALUES ('$title', '$content', '$date', '$id')";
      $result = mysqli_query($conn,$sql);
      echo "<script>
              document.location.href = 'userprofile.php?profile=2'
            </script>";
   }
  
    
  }


?>