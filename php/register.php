<?php
    session_start();
    include_once('conn.php');
    if(isset($_POST["btnRegister"])){
        $fname = ucfirst($_POST['firstName']);
        $lname = ucfirst($_POST['lastName']);
        $username = trim($_POST['register_username']);
        $password = trim($_POST['register_password']);
        $email = trim($_POST['email']);
        $gender = ($_POST['gender']);
        $year = ($_POST['year']);
        $month = ($_POST['month']);
        $day = ($_POST['day']);
        $dob = ($year . $month . $day);
        $cfm_password = ($_POST['confirm_password']);
        $rgt_password = ($_POST['register_password']);
        $imageName = "profile.jpg";
        $acc = "SELECT * FROM user WHERE Username = '$username'";
        $chck_result = mysqli_query($conn,$acc);
        if($username === "admin"){
            echo "<script> alert('This username is used!!')</script>";
        }elseif($cfm_password === $rgt_password){
            if(!$row = mysqli_fetch_assoc($chck_result)){
            $sql = "INSERT INTO `user`(`Username`, `Password`, `FirstName`, `LastName`, `DOB`, `Gender`, `Email`, `Avatar`) 
            VALUES ('$username','$password','$fname','$lname','$dob','$gender','$email','$imageName')";
            $result = mysqli_query($conn,$sql);
            $sql_info = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
            $result_user = mysqli_query($conn, $sql_info);
            $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
            $_SESSION['userID'] = $row_user['UserID'];
            echo "<script> alert('Account created successfully!'); 
            document.location.href = 'userinformation.php';
            </script>";
            }else{
                echo "<script> alert('This username is used!!')</script>";
            }        
        }else{
            echo "<script> alert('Error in password confirmation!')</script>";
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
    <link rel = "icon" href ="../img/petlogo.png" type = "image/x-icon">
    <title>Register</title>
    <link rel="stylesheet" href="../css/hpheader.css">
    <link rel="stylesheet" href="../css/register.css">
    
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
            <li class="active" id="su"><a href="register.php">Sign Up</a></li>
            <span class="nav_vl"></span>
            <li id="lg"><a href="loginpet.php">Login</a></li>
        </ul>
    </div>
    <div class="wrap_content">
        <div class="content">
            <form class="box" method="POST" action="" name="reg_form" onsubmit="return validate()">
                <div class="register">
                    <h3>Sign Up</h3>
                    <hr>
                </div>
                <input class="firstName" type="text" placeholder="First Name" name="firstName" required>
                <input class="lastName" type="text" placeholder="Last Name" name="lastName" required > <br>
                <label>
                    <input type="text" name="register_username" placeholder="Username" id="register_username" required>
                </label>
                <label>
                    <input type="password" name="register_password" placeholder="Password" id="register_password" required>
                </label>
                <label>
                    <input type="password" name="confirm_password" placeholder="Re-enter Password" id="confirm_password" required>
                </label>
                <label>
                    <input type="email" name="email" placeholder="Email" id="register_email">
                </label>

                <p>Date of Birth:</p>
                <select name="day" id="day">
                            <option>day</option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <?php for($day=10;$day<32;$day++)
                            {
                                echo '<option value="'.$day.'">'.$day.'</option>';
                            };?>
                        </select>
                <select name="month" id="month">
                            <option>month</option>
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">Jun</option>
                            <option value="07">Jul</option>
                            <option value="08">Aug</option>
                            <option value="09">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>
                <select name="year" id="year">
                            <option>year</option>
                            <?php for($year=1920;$year<2023;$year++)
                            {
                                echo '<option value="'.$year.'">'.$year.'</option>';
                            };?>
                        </select>
                <br><br>
                <p>
                    Gender:
                    <label><input type="radio" name="gender" value="Male">Male</label>
                    <label><input type="radio" name="gender" value="Female">Female</label>
                </p>
                    <label><input type="submit" name="btnRegister" value="Register"></label>
                <div class="login_link">
                    <h8>Already Have An Account? <a href="loginpet.php">Login Now!</a></h8>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validate()
        {
            var fname = document.reg_form.firstName;
            var lname = document.reg_form.lastName;
            if(allLetter(fname))
            {
                if(allLetter(lname))
                {
                    return true;
                }
            }
            return false;

        }
        function allLetter(inputtxt)
        {
            var letters = /^[A-Za-z]+$/;
            if(inputtxt.value.match(letters))
                {
                return true;
                }
            else
                {
                    alert("Your name must have alphabet characters only!");
                    return false;
                }
        }
    </script>
</body>
</html>