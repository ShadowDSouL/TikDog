<?php include_once("conn.php") ?>
<?php
    session_start();
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn,$sql);
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="../css/adminaccount.css">
    <title>Admin</title>
</head>
<body>

<div class="modal fade" id="account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="accountLabel">User Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" name="viewfrm" id="viewfrm">
            <input type="hidden" name="userID" id="userID">
            <div class="form-group row">
                <label for="InputUsername" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="username" name="username">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="InputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="name" name="name">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="InputDOB" class="col-sm-2 col-form-label">DOB</label>
                <div class="col-sm-10">
                    <textarea readonly class="form-control" rows="3" id="DOB" name="DOB"></textarea>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="InputGender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="gender" name="gender">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="InputContactNumber" class="col-sm-2 col-form-label">Contact Number</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="contactnumber" name="contactnumber">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="InputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="email" name="email">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="InputAddress" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="address" name="address">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="InputLocation" class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="location" name="location">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="InputSocialMedia" class="col-sm-2 col-form-label">Social Media</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="socialmedia" name="socialmedia">
                </div>
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-auto bg-dark sticky-top">
                    <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                        <a href="adminpage.php" class="d-block p-5 link-light text-decoration-none"  title="Logo" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                            <i class="bi bi-speedometer2 fa-3x"></i>
                        </a>
                        <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                            <li class="nav-item">
                                <a href="adminpage.php" class="nav-link py-4 px-2" title="Home" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                    <i class="fas fa-home fs-2"></i><p>Home</p>
                                </a>
                            </li>
                            <li>
                                <a href="adminpage.php" class="nav-link py-4 px-2" title="Back" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                    <i class="fas fa-arrow-alt-circle-left fs-2"></i><p>Back</p>
                                </a>
                            </li>
                            <li>
                                <a href="logout.php" class="nav-link py-3 px-2" title="Sign-Out" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Exits">
                                    <i class="fas fa-sign-out-alt fs-2"></i><p>Sign Out</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm p-0 min-vh-100">
                    <div class="navbar" id="navbar" style="background-color:#1a1a1a; height: 90px; position: sticky; top: 0%; transition: 0.2s; padding-left: 50px;">
                        
                        <p style="color: white;"><b><i style="font-size:22px; ">Account Management</i></b><br><small><i><span id="dateTime"></span></i></small></p>
                        
                        <div class="right" style="float:right; padding-right: 100px;">
                            <img src="../adminimg/<?php echo $_SESSION["photo"] ?>" alt="#" style="width: 50px; border-radius: 15px;">
                        </div>
                    </div>


                    <div class="content" style="width: auto; padding:30px 30px;">
                        <div class="row" style=" border:1px solid black; padding:5px; border-radius:10px;">
                            <table id="acctable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>UserName</th>
                                        <th>Name</th>
                                        <th>DOB</th>
                                        <th>Gender</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>                             
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    while($row = mysqli_fetch_assoc($result)){
                                        $users[] = $row;
                                    }
                                    if(isset($users)){
                                    foreach($users as $user){?>
                                
                                    <tr>
                                        <td><img src="../img_user/<?php echo $user['Avatar']?>" alt="" width="50px"></td>
                                        <td><?php echo $user["Username"] ?></td>
                                        <td><?php echo $user["FirstName"]." ". $user["LastName"] ?></td>
                                        <td><?php echo $user["DOB"] ?></td>
                                        <td><?php echo $user["Gender"] ?></td>
                                        <td><?php echo $user["ContactNumber"] ?></td>
                                        <td><?php echo $user["Email"] ?></td>
                                        <td><?php echo $user["Address"] ?></td>
                                        <td>
                                            <button type="button" value="<?php echo $user["UserID"] ?>" class="viewbtn btn btn-info"  data-bs-toggle="modal" data-bs-placement="right" data-bs-target="#account">View</button>
                                            <a href="admindeleteacc.php?id=<?php echo $user['UserID'] ?>" class="btn-del btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                <?php } ?>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>UserName</th>
                                        <th>Name</th>
                                        <th>DOB</th>
                                        <th>Gender</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php if(isset($_GET['del'])): ?>
        <div class="flash-data" data-flashdata="<?php echo $_GET['del']; ?>"></div>
        <?php endif;  ?>   
        <button
            type="button"
            class="btn btn-danger btn-floating btn-lg"
            id="btn-back-to-top"
            >
            <i class="fas fa-arrow-up"></i>
        </button>
        
        


    

        <script>    
            let mybutton = document.getElementById("btn-back-to-top");

            window.onscroll = function () {scrolltoTopFunction();};

            function scrolltoTopFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }

            mybutton.addEventListener("click", backToTop);

            function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }            
            
            var datetime = new Date();
            console.log(datetime);
            document.getElementById("dateTime").textContent = datetime;
        </script>
    

    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

            <script>
                $('.btn-del').on('click',function(btndel){
                    btndel.preventDefault();
                    const href = $(this).attr("href")

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.value) {
                                document.location.href = href;
                            }else if (
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                Swal.fire(
                                'Cancelled',
                                'User is safe :)',
                                'error'
                                )
                            }
                        })
                })


                const flashdata = $('.flash-data').data('flashdata')
                if(flashdata){
                    Swal.fire(
                        'Banned!',
                        'User has been banned.',
                        'success'
                    )
                }

                $(document).on('click','.viewbtn',function(view){
                    var user_id = $(this).val();
                    $.ajax({
                        type:"GET",
                        url: "admindisplyacc.php?userID=" + user_id,
                        success: function(response){
                            var res = jQuery.parseJSON(response);
                            if(res.status == 404){
                                Swal.fire(
                                    'Oops...',
                                    'Something went wrong!!',
                                    'error'
                                );
                            }else if(res.status == 444) {

                                $('#userID').val(res.data.UserID);
                                $('#username').val(res.data.Username)
                                $('#name').val(res.data.FirstName +' '+ res.data.LastName);
                                $('#DOB').val(res.data.DOB);
                                $('#gender').val(res.data.Gender);
                                $('#contactnumber').val(res.data.ContactNumber);
                                $('#email').val(res.data.Email);
                                $('#address').val(res.data.Address);
                                $('#location').val(res.data.Location);
                                $('#socialmedia').val(res.data.SocialMedia);


                                                                
                                $('#account').modal('show');
                            }
                        }
                    })
            })
            </script>


    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/datatable.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
</body>
</html>