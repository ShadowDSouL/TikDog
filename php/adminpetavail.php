<?php include_once("conn.php") ?>
<?php
    session_start();
    $sql = "SELECT * FROM pets WHERE PetStatus = 'available' ";
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
<?php include("adminpetfrm.php") ?>
        <div class="container-fluid" >
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
                                <a href="adminpet.php" class="nav-link py-4 px-2" title="Back" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
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
                        
                        <p style="color: white;"><b><i style="font-size:22px; ">Pet Availability</i></b><br><small><i><span id="dateTime"></span></i></small></p>
                        
                        <div class="right" style="float:right; padding-right: 100px;">
                            <img src="../adminimg/<?php echo $_SESSION["photo"] ?>" alt="#" style="width: 50px; border-radius: 15px;">
                        </div>
                    </div>


                    <div class="content" style="width:auto; padding:30px 30px;">
                        <div class="row" style=" border:1px solid black; border-radius:10px;">
                            <table id="acctable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Species</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Condition</th>
                                        <th>Body</th>
                                        <th>Color</th>
                                        <th>Status</th>
                                        <th>Action</th>                          
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)){
                                        $pets[] = $row;
                                    }
                                    if(isset($pets)){
                                        foreach($pets as $pet){

                                ?>
                                
                                    <tr>
                                        <td><img src="../petimg/<?php echo $pet['Image'] ?>" alt="" width="50px" ></td>
                                        <td><?php echo $pet['PetName'] ?></td>
                                        <td><?php echo $pet['Species'] ?></td>
                                        <td><?php echo $pet['Gender'] ?></td>
                                        <td><?php echo $pet['PetAge'] ?></td>
                                        <td><?php echo $pet['PetCondition'] ?></td>
                                        <td><?php echo $pet['PetBody'] ?></td>
                                        <td><?php echo $pet['Color'] ?></td>                                   
                                        <td><?php echo $pet['PetStatus'] ?></td>
                                        <td><button type="button" value="<?php echo $pet['PetsID'] ?>"  class="viewbtn btn btn-info" data-bs-toggle="modal" data-bs-placement="right" data-bs-target="#showPet">View</button></td>
                                    </tr>
                                
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Species</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Condition</th>
                                        <th>Body</th>
                                        <th>Color</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
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
            $(document).on('click','.viewbtn',function(view){
                var pet_id = $(this).val();
                $.ajax({
                    type:"GET",
                    url: "admindisplypet.php?petID=" + pet_id,
                    success: function(response){
                        var res = jQuery.parseJSON(response);
                        if(res.status == 404){
                            Swal.fire(
                                'Oops...',
                                'Something went wrong!!',
                                'error'
                            );
                        }else if(res.status == 444) {

                            $('#petID').val(res.data.PetsID);
                            $('#name').val(res.data.PetName);
                            $('#species').val(res.data.Species);
                            $('#gender').val(res.data.Gender);
                            $('#age').val(res.data.PetAge);
                            $('#condition').val(res.data.PetCondition);
                            $('#body').val(res.data.PetBody);
                            $('#color').val(res.data.Color);
                            $('#location').val(res.data.Location);
                            $('#description').val(res.data.Description);
                            $('#vaccinated').val(res.data.Vaccinated);
                            $('#dewormed').val(res.data.Dewormed);
                            $('#spayed').val(res.data.Spayed);
                            $('#status').val(res.data.PetStatus);
                                                                
                            $('#showPet').modal('show');
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