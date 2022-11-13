<?php include_once("conn.php") ?>

<?php 
    session_start();

    $sql1 = "SELECT * FROM pets WHERE PetStatus = 'available'";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_num_rows($result1);
    $sql2 = "SELECT * FROM pets WHERE PetStatus = 'adopted'";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_num_rows($result2);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="../css/adminpage.css">
    <title>Admin</title>

</head>
<body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-auto bg-dark sticky-top">
                    <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                        <a href="adminpage.php" class="d-block p-5 link-light text-decoration-none" title="logo" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                            <i class="bi bi-speedometer2 fa-3x"></i>
                        </a>
                        <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                            <li class="nav-item">
                                <a href="adminpage.php" class="nav-link py-4 px-2" title="Home" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <i class="fas fa-home fs-2"></i><p>Home</p>
                                </a>
                            </li>
                            <br>
                            <li>
                                <a href="logout.php" class="nav-link py-3 px-2" title="Sign-Out" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Exits">
                                    <i class="fas fa-sign-out-alt fs-2"></i><p>Sign Out</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm p-0 min-vh-100">
                    <div class="navbar" id="navbar" style="background-color:#1a1a1a; height:90px; position: sticky; top: 0%; transition: 0.2s; padding-left: 50px;">
                        
                        <p style="color: white;"><b><i style="font-size:22px; ">Dashboard</i></b><br><small><i><span id="dateTime"></span></i></small></p>
                        
                        <div class="right" style="float:right; padding-right: 100px;">
                            <img src="../adminimg/<?php echo $_SESSION["photo"] ?>" alt="#" style="width: 50px; border-radius: 15px;">
                        </div>
                    </div>


                    <div class="content">
                        <br>
                        <div class="function"><a href="adminaccount.php"><img src="../adminimg/account_img.png" alt="icon"></a><p>Account</p></div>
                        <div class="function"><a href="adminnewpost.php"><img src="../adminimg/announcement_img.jpg" alt="icon"></a><p>Annoucement</p></div>
                        <br>
                        <div class="function"><a href="adminpet.php"><img src="../adminimg/editpet_img.png" alt="icon"></a><p>Edit Pet</p></div>
                        <div class="function"><a href="adminfeedback.php"><img src="../adminimg/feedback_img.png" alt="icon"></a><p>Feedback</p></div>
                        <br>
                        <div class="function"><a href="adminreport.php"><img src="../adminimg/report_img.png" alt="icon"></a><p>Report</p></div>

                    </div>
                    
                    <div class="content2">
                        
                        <div class="wrapper">
                            <div class="picture"><img src="../adminimg/pet_img.jpg" alt="icon"></div><br>
                            <div class="petnum1"><p>Homeless</p><p style="color: red; font-size: larger;"><b><?php echo $row1 ?></b></p></div>
                            <div class="petnum2"><p>Happy</p><p style="color: green; font-size: larger;"><b> <?php echo $row2 ?></b></p></div>
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
        
        <?php mysqli_close($conn) ?>


    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

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

        <script>
            const flashdata = $('.flash-data').data('flashdata')
            if(flashdata == 0){
                Swal.fire({
                    title: 'Welcome Back Admin!!!',

                    imageUrl: '../adminimg/wel.jpg',
                    imageWidth: 400,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    showConfirmButton: false,
                    showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                    timer: 1500
                    })
            }

        </script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
</body>
</html>