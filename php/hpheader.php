<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="../css/hpheader.css">
    <title>Homepage</title>
</head>
<body>
    <div class="header">
        <img src="../img/petlogo.png" alt="logo" width="50px" height="50px">
        <h1>TikDog</h1>
    </div>
    <div class="nav">
        <ul>
            <li ><a href="index.php">Home</a></li>
            <li class="active"><a href="pets.php">Pets</a></li>
            <li><a href="announcement.php">Announcement</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li id="su"><a href="register.php">Sign Up</a></li>
            <span class="nav_vl"></span>
            <li id="lg"><a href="loginpet.php">Login</a></li>
        </ul>
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