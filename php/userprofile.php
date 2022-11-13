<?php
    session_start();
    include_once("conn.php");

    $userID = $_SESSION['userID'];

    $sql_user = "SELECT * FROM user WHERE UserID = '$userID'";
    $result_user = mysqli_query($conn,$sql_user);
    $row_user = mysqli_fetch_assoc($result_user);

    $sql_donor = "SELECT * FROM pets INNER JOIN donor
                  ON donor.PetID = pets.PetsID
                  INNER JOIN user
                  ON donor.DonorID = user.UserID
                  WHERE pets.DonorID = '$userID'";
    $result_donor = mysqli_query($conn, $sql_donor);

    $sql_adopter = "SELECT * FROM pets INNER JOIN adopter
                    ON pets.PetsID = adopter.PetID
                    INNER JOIN user
                    ON user.UserID = adopter.AdopterID
                    WHERE pets.AdopterID = '$userID'";
    $result_adopter = mysqli_query($conn,$sql_adopter);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title><?php echo $_SESSION['fullname']?></title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css"
    rel="stylesheet"
    />
    <style>
      .popupBox {
        width: 400px;
        background: #fff;
        border-radius:6px;
        position: absolute;
        top: 0%;
        left: 50%;
        transform: translate(-50%,-50%) scale(0.1);
        text-align: center;
        padding: 0 30px 30px;
        color: #333;
        z-index: 1;
        visibility: hidden;
        transition: transform 0.4s, top 0.4s;
      }
      .open-popup {
        visibility: visible;
        top:50%;
        transform: translate(-50%,-50%) scale(1);
      }
    </style>
</head>
<body>
    <?php include('header.php')?>

    <div class="modal fade" id="feedbackModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="feedback">Feedback</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="feedback.php" method="POST" id="feedbackForm" name="feedbackForm">
          <div class="modal-body">
            <div class="form-group">
              <label for="feedbackTitle">Tile</label>
              <input type="text" class="form-control" id="feedbackTitle" name="feedbackTitle" placeholder="Write down your title here...." required>
            </div>
            <div class="form-group">
              <label for="feedbackComment">Your comment...</label>
              <textarea class="form-control" id="feedbackComment" name="feedbackComment" rows="3" placeholder="Write down your comment...." required></textarea>
            </div>
          
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit"  class="btn btn-primary" id="feedbackSubmit" name="feedbackSubmit"></input>
          </div>
      </div>
    </form>
    </div>
  </div>



  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="adopter.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="../img_user/<?php echo $row_user['Avatar']?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $row_user['FirstName']. ' '. $row_user['LastName']?></h5>
            <p class="text-muted mb-1"><?php echo $row_user['Gender']?></p>
            <p class="text-muted mb-4"><?php echo $row_user['Location']?></p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary" onclick="location.href = 'editprofile.php?userID=<?php echo $userID?>';">Edit Profile</button>
              <button type="button" class="btn btn-outline-primary ms-1" data-bs-toggle="modal" data-bs-target="#feedbackModal">Feedback</button>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0" style="padding-left: 30px;">
                    <?php echo  "<a href='". $row_user['SocialMedia']."' target='_blank' style='text-decoration: none; color:black;'>".$row_user['SocialMedia']."</a>"; ?>
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row_user['FirstName']. ' '. $row_user['LastName']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row_user['Email']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date of Birth</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row_user['DOB']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row_user['ContactNumber']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row_user['Address']?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Donated History </span><b><?php echo mysqli_num_rows($result_donor)?></b></p>
                <?php while($row_donor = mysqli_fetch_assoc($result_donor)){?>
                    <table>
                        <tr>
                            <td style="width:70px">
                            <?php if($row_donor['PetStatus'] == 'Available'){
                                echo '<a href="mypet.php?PetsID='. $row_donor['PetsID'].'">';
                                 }?>
                                    <?php echo '<img src="../petimg/'.$row_donor['Image'].'" alt="picture" height="50px" width="50px" style="border-radius:50px">'; ?></td>
                                </a>    
                            <td>
                            <?php if($row_donor['PetStatus'] == 'Available'){
                               echo '<a href="mypet.php?PetsID='. $row_donor['PetsID'].'"style="color:black">';
                              }?>
                                    <h3 ><?php echo $row_donor['PetName']?></h3>
                                </a>    
                            </td>
                        </tr>
                    </table>
                    <hr style="margin: 10px 0;">
                <?php }?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Adopted History </span><b><?php echo mysqli_num_rows($result_adopter)?></b></p>
                <?php while($row_adopter = mysqli_fetch_assoc($result_adopter)){?>
                  <table>
                      <tr>
                          <td style="width:70px">
                              <a href="mypet.php?PetsID=<?php echo $row_adopter['PetsID'];?>" >
                                  <?php echo '<img src="../petimg/'.$row_adopter['Image'].'" alt="picture" height="50px" width="50px" style="border-radius:50px">'; ?></td>
                              </a>    
                          <td>
                              <a href="mypet.php?PetsID=<?php echo $row_adopter['PetsID'];?>"style="color:black">
                                  <h3 ><?php echo $row_adopter['PetName']?></h3>
                              </a>    
                          </td>
                      </tr>
                  </table>
                  <hr style="margin: 10px 0;"> 
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php if(isset($_GET['profile'])): ?>
  <div class="flash-data" data-flashdata="<?php echo $_GET['profile']; ?>"></div>
<?php endif;  ?>   


    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
       const flashdata = $('.flash-data').data('flashdata')
      if(flashdata == 1 ){
        Swal.fire({
          title:'Updated!!',
          text:'Your information has been updated',
          icon:'success',
          timer:1500,
          showConfirmButton: false,
          showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          },
        })
      }else if(flashdata == 2 ){
        Swal.fire({
          title: 'Submitted!',
          text: 'We have received your feedback.',
          icon: 'success',
          showConfirmButton: false,
          timer: 1500
        })
      }
    </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>

</body>
</html>