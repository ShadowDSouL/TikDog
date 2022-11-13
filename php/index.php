<?php
    include_once('conn.php');

    $sql_homeless = "SELECT * FROM pets WHERE PetStatus = 'available'";
    $sql_adopted = "SELECT * FROM pets WHERE PetStatus = 'adopted'";

    if($result_homeless = mysqli_query($conn, $sql_homeless))
    {
        $num_homeless = mysqli_num_rows($result_homeless);
    }
    if($result_adopted = mysqli_query($conn, $sql_adopted))
    {
        $num_adopted = mysqli_num_rows($result_adopted);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="../img/petlogo.png" type = "image/x-icon">
    <link rel="stylesheet" href="../css/index.css">
    <title>Homepage</title>
</head>
<body>
    <div class="header">
        <img src="../img/petlogo.png" alt="logo" width="50px" height="50px">
        <h1>TikDog</h1>
    </div>
    <div class="nav">
        <ul>
            <!-- remember to change the link afterward-->
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="pets.php">Pets</a></li>
            <li><a href="announcement.php">Announcement</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li id="su"><a href="register.php">Sign Up</a></li>
            <span class="nav_vl"></span>
            <li id="lg"><a href="loginpet.php">Login</a></li>
        </ul>
    </div>
    
    <div class="wrapper">
    
        <div class="no_pets">
            <span><!-- remember to link to PHP afterward-->
                <h1>Homeless</h1>
                <h1 style="color:red ;"><?php echo $num_homeless ?></h1>
            </span>
            <span class="pet_vl"></span>
            <span>
                <h1>Adopted</h1>
                <h1 style="color:green;"><?php echo $num_adopted ?></h1>
            </span>   
        </div>
        
        <h3>Adopt an animal, find a loving home for your pet</h3>
        <a href="register.php"><button>Join Us Now!</button></a> <!-- remember to change the link afterward-->
        
        <div class="tips">
            <img src="../img/ayame1.jpg" alt="tips_icon" height="50px" width="50px">
            <h1>How to use?</h1>
        </div>
        <div class="box1">
            <h3>Looking for a pet?</h3>
            <ol>
                <li><a href="register.php" style="text-decoration: none; color:red">Register</a> as a member first</li><!--remember to change the link afterward-->
                <li>Setup your complete user profile</li>
                <li>Look at our <a href="pets.php" style="text-decoration: none; color:red">available pet list</a></li> <!--remember to change the link afterward-->
                <li>Search by States</li>
                <li>Contact to the donor when you have found your interested pet</li>
            </ol> 
        </div>
        <div class="box2">
            <h3>Need a home for your pet?</h3>
            <ol>
                <li><a href="register.php" style="text-decoration: none; color:red">Register</a> as a member first</li><!--remember to change the link afterward-->
                <li>Setup your complete user profile</li>
                <li>Find a button to donor your pet</li>
                <li>Fill up your pet's full information</li>
                <li>Waiting potential adopter</li>
                <li>Contact the adopter when receive the adoption request </li>
                <li>Approve the adoption</li>
            </ol> 
        </div>
        
    </div>
   
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('li').on('click', function(){
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            })
        })
    </script>
</body>
</html>