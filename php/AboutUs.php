<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="../img/petlogo.png" type = "image/x-icon">
    <link rel="stylesheet" href="../css/hpheader.css">
    <title>About us</title>
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .wrapper {
            width: 1000px;
            display: grid;
            justify-content: center;
            margin: 0 auto;
            background-color: rgb(192, 192, 192, 0.2);
            border: 3px solid black;
            border-radius: 10px;
            padding: 10px;

        }

        .content {
            width: 800px;
            margin-left: 100px;
            text-align: justify;
        }

        h2{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="../img/petlogo.png" alt="logo" width="50px" height="50px">
        <h1>TikDog</h1>
    </div>
    <div class="nav">
        <ul>
            <li ><a href="index.php">Home</a></li>
            <li><a href="pets.php">Pets</a></li>
            <li><a href="announcement.php">Announcement</a></li>
            <li class="active"><a href="AboutUs.php">About Us</a></li>
            <li id="su"><a href="register.php">Sign Up</a></li>
            <span class="nav_vl"></span>
            <li id="lg"><a href="loginpet.php">Login</a></li>
        </ul>
    </div>
    
    
    <div class="wrapper">
        <div class="background">
            <img src="../img/pet adoption.jpg" alt="pet adoption" width="1000px">
        </div>

        <div class="content">
            <h1>About Us</h1>
            <hr>
            <h2>Welcome to TikDog</h2> <!--remember to change the webstie name afterwards-->
            <p>A group of pet lovers develops this website, and we are here to contribute our technical skills to society. 
                We designed a platform for pet adoption in Malaysia. 
                This platform is specially developed for pet shelters because there are a lot of non-profit pet shelters suffering today, 
                they lack resources for so many pets. 
                Therefore, we decided to develop an online platform to help them reduce a little bit of their agony.
            </p>

            <p><b>Note: All the pets are not belong to us, we are the one who create this platform only.</b>
                This website is <b>free</b> to use for everyone. This website does not contain any fees charges or transactions. 
                All the transaction is between adopter and donor, you should contact each other to confirm everything for adoption. 
            </p>
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