<?php
    session_start();
    include_once("conn.php");

    if(isset($_POST["txtUsername"])){
        $username = $_POST["txtUsername"];
        $password = $_POST["txtPassword"];

        $sql_query1 = "SELECT * FROM admin WHERE AdminName='$username' AND AdminPassword='$password'";
        $result_admin = mysqli_query($conn, $sql_query1);
        $row_admin = mysqli_fetch_array($result_admin, MYSQLI_ASSOC);
        // This is the admin login session
        if($username==="admin" & $password==="admin123"){
            $_SESSION['loggedin'] = true;
            $_SESSION['userID'] = $row_admin['AdminID'];
            $_SESSION['photo'] = $row_admin['AdminAvatar'];
            header("Location: adminpage.php?type=0");
        }else{
            $sql_query2 = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
            $result_user = mysqli_query($conn, $sql_query2);
            $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
            // This is the user login session
            // If user exists, then the result will get 1, else get 0
            $count_user = mysqli_num_rows($result_user);
            if($count_user==1){
                $_SESSION['loggedin'] = true;
                $_SESSION['userID'] = $row_user['UserID'];
                $_SESSION['fullname'] = $row_user['FirstName'] . " " . $row_user['LastName'];
                $_SESSION['photo'] = $row_user['Avatar'];
                header("Location: select.php?signin=1");
            }else{
                header("Location: loginpet.php?fail=1");;
            }
        }      
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/loginpet.css">
    <link rel = "icon" href ="../img/petlogo.png" type = "image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Nunito:ital,wght@1,300&family=Shizuru&family=Syne+Tactile&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="../css/hpheader.css">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <script src="https://kit.fontawesome.com/16a1688951.js" crossorigin="anonymous"></script>   
</head>
<body>    
    <div class="header">
        <img src="../img/petlogo.png" alt="logo" width="50px" height="50px">
        <h1>TikDog</h1>
    </div>
    <div class="nav">
        <ul>
            <!-- remember to change the link afterward-->
            <li><a href="index.php">Home</a></li>
            <li><a href="pets.php">Pets</a></li>
            <li><a href="announcement.php">Announcement</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li id="su"><a href="register.php">Sign Up</a></li>
            <span class="nav_vl"></span>
            <li  class="active" id="lg"><a href="loginpet.php">Login</a></li>
        </ul>
    </div>
    <div class="content">
        <form class="box1" id ="form" method="POST" action="#">           
            <h1>Login</h1> 
            <div class="form-control1">
                <label>
                    <input type="text" name="txtUsername" id="username" placeholder="Username" id="username">
                </label>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <div class="form-control1">
                <label>
                    <input type="password" name="txtPassword" id="password" placeholder="Password" id="password">
                </label>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <label><input type="submit" name="login" value="Login"></label>
            <div class="signup-link">
                Not a member? <a href="register.php">SignUp now</a>
            </div>
        </form>
    </div>

    <?php if(isset($_GET['fail'])): ?>
        <div class="flash-data" data-flashdata="<?php echo $_GET['fail']; ?>"></div>
    <?php endif;  ?> 

    <script src="../js/login.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>


        const flashdata = $('.flash-data').data('flashdata')
            if(flashdata == 1 ){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please check again your username and password',
                });
            }       
    </script>
</body>
</html>