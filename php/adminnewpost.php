<?php include_once("conn.php") ?>
<?php
    session_start();
    $sql = "SELECT * FROM announcement";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="../css/adminaccount.css">
    <title>Admin</title>
</head>
<body>       

<div class="modal fade" id="editPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" name="editpostfrm" id="editpostfrm">
                <div class="modal-body" style="text-align:justify ;">

                    <input type="hidden" name="postID" id="postID">

                    <div class="form-group">
                        <label for="Input1">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="Textarea1">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Input3">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div> 
                </div> 
                    <div class="modal-footer">
                        <button type="button" class="clsbtn btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updatebtn" class="btn btn-primary" >Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Announcement Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" name="viewpostfrm" id="viewpostfrm">
                <div class="modal-body" style="text-align:justify ;">

                    <input type="hidden" readonly name="viewpostID" id="viewpostID">

                    <div class="form-group">
                        <label for="Input1">Title</label>
                        <input type="text" readonly class="form-control" id="viewtitle" name="viewtitle">
                    </div>
                    <div class="form-group">
                        <label for="Textarea1">Content</label>
                        <textarea class="form-control" id="viewcontent" readonly name="viewcontent" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Input3">Date</label>
                        <input type="date" class="form-control" id="viewdate" readonly name="viewdate">
                    </div> 
                </div> 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
</div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-auto bg-dark sticky-top">
                    <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                        <a href="adminpage.php" class="d-block p-5 link-light text-decoration-none" title="Logo" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                            <i class="bi bi-speedometer2 fa-3x"></i>
                        </a>
                        <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                            <li class="nav-item">
                                <a href="adminpage.php" class="nav-link py-4 px-2" title="Home" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                    <i class="fas fa-home fs-2"></i><p>Home</p>
                                </a>
                            </li>
                            <li>
                                <?php include("admincreatepost.php") ?>
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
                        
                        <p style="color: white;"><b><i style="font-size:22px; ">Announcement</i></b><br><small><i><span id="dateTime"></span></i></small></p>
                        
                        <div class="right" style="float:right; padding-right: 100px;">
                            <img src="../adminimg/<?php echo $_SESSION["photo"] ?>" alt="#" style="width: 50px; border-radius: 15px;">
                        </div>
                    </div>


                    <div class="content" style="width: auto; padding:30px 30px;">
                        <div class="row" style=" border:1px solid black; padding:5px; border-radius:10px;">
                            <table id="acctable" class="table table-striped " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php  
                                    while($row=mysqli_fetch_assoc($result)){
                                        $announcements[] = $row;  
                                    }
                                    if(isset($announcements)){
                                        foreach($announcements as $announcement){
            
                                ?>
                                    <tr>
                                        <td><?php echo $announcement["AnnTitle"] ?></td>
                                        <td><?php echo $announcement["AnnContent"] ?></td>
                                        <td><?php echo $announcement["AnnDate"] ?></td>
                                        <td>
                                            <button type="button" value="<?php echo $announcement['AnnouncementID'] ?>" class="viewbtn btn btn-info"  data-bs-toggle="modal" data-bs-placement="right"  data-bs-target="#viewPost">View</button>
                                            <a href="admindeletepost.php?id=<?php echo $announcement['AnnouncementID'] ?>" class="del btn btn-danger" id="del" data-bs-placement="right">Delete</a>
                                            <button type="button" value="<?php echo $announcement['AnnouncementID'] ?>" class="editPostBtn btn btn-success"  data-bs-toggle="modal" data-bs-placement="right"  data-bs-target="#editPost">Edit</button>
                                            
                                        </td>
                                    </tr> 
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Date</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        
        <?php if(isset($_GET['type'])): ?>
        <div class="flash-data" data-flashdata="<?php echo $_GET['type']; ?>"></div>
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
                
                $('.del').on('click',function(del){
                    del.preventDefault();
                    const href = $(this).attr("href")

                    Swal.fire({
                        title:'Are you sure?',
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
                                'Your Announcement is safe :)',
                                'error'
                                )
                            }
                        })
                })


                const flashdata = $('.flash-data').data('flashdata')
                if(flashdata == 1 ){
                    Swal.fire(
                        'Deleted!',
                        'Your Announcement has been deleted!.',
                        'success'
                    )
                    
                }else if(flashdata == 2){
                    Swal.fire({
                        title: 'Your announcement has been created!',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        icon:'success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else if(flashdata == 3){
                    Swal.fire({
                                    title:'Updated!!',
                                    text:'Your announcement has been updated!.',
                                    icon:'success',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                }
                
                $(document).on('click','.editPostBtn',function(edit){
                    var post_id = $(this).val();
                    $.ajax({
                        type: "GET",
                        url: "admineditpost.php?postID=" + post_id,
                        success: function(response){
                            var res = jQuery.parseJSON(response);
                            if(res.status == 404){
                                alert(res.message);
                            }else if(res.status == 444) {

                                $('#postID').val(res.data.AnnouncementID);
                                $('#title').val(res.data.AnnTitle);
                                $('#content').val(res.data.AnnContent);
                                $('#date').val(res.data.AnnDate);

                                $('#editPost').modal('show');
                            }
                        }
                    })
                })

                $(document).on('submit', '#editpostfrm', function(update){
                    update.preventDefault();
                    
                    var frm = new FormData(this);
                    frm.append("edit_post", true);
                    $.ajax({
                        type: "POST",
                        url: "admineditpost.php",
                        data: frm,
                        processData: false,
                        contentType: false,
                        success: function(response){
                            var res = jQuery.parseJSON(response);
                            if(res.status == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Please Fill Out the Field!!',
                                    })
                            }else if(res.status == 1){
                                $('#editPost').modal('hide');
                                $('#editpostfrm')[0].reset();
                                
                                $('#acctable').load(location.href + " #acctable");
                                location.href = "adminnewpost.php?type=3";
                                
                            }
                            
                        }
                        
                    })
                    

                })

                    


                $('.clsbtn').on('click', function(){
                    Swal.fire({
                        position: 'middle',
                        icon: 'success',
                        title: 'Your Announcement is safe :)',
                        showConfirmButton: false,
                        timer: 1500
                    })
                })


                $(document).on('click','.viewbtn',function(view){
                    var postid = $(this).val();
                    $.ajax({
                        type:"GET",
                        url: "admineditpost.php?post_ID=" + postid,
                        success: function(response){
                            var res = jQuery.parseJSON(response);
                            if(res.status == 424){
                                Swal.fire(
                                    'Oops...',
                                    'Something went wrong!!',
                                    'error'
                                );
                            }else if(res.status == 445) {

                                $('#viewpostID').val(res.data.AnnouncementID);
                                $('#viewtitle').val(res.data.AnnTitle);
                                $('#viewcontent').val(res.data.AnnContent);
                                $('#viewdate').val(res.data.AnnDate);

                                                                
                                $('#viewPost').modal('show');
                            }
                        }
                    })
                })


                
                
            </script>

    
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/datatable.js"></script>

</body>
</html>