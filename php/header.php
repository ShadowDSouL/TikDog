<?php
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="../css/header.css">
    <style>
    .right ul{
        display: inline-block;
        position: absolute;
        right: 100px;
        padding: 10px;
        background-color: rgba(255, 192, 203, 0.307);
        margin-top: 30px;
        z-index: 1;
    }
    .right li{
        display: block;
        padding: 10px;
    }
    .right li a {
        display: block;
    }

    summary {
        margin-top: 15px;
    }

    .right ul li a {
        text-decoration: none;
        color: black;
    }
    .right a:hover{
        text-decoration: underline;
        font-weight: bold;
    }

</style>
</head>
<body>
    <div class="header">
        <div class="left">
            <img src="../img/petlogo.png" alt="logo" width="50px" height="50px">
            <h1>TikDog</h1>
            
        </div>
        <div class="right">
            <?php echo "<img src='../img_user/".$_SESSION['photo']."' alt='logo' width='50px' height='50px'" ?>
            <h2><?php echo "<h2>".$_SESSION['fullname']."</h2>"?></h2>
            <details>
                <summary></summary>
                <ul>
                    <li><a href="userprofile.php">User Profile</a></li>
                    <li><a href="adopter.php">Switch to Adopter</a></li>
                    <li><a href="donor.php">Switch to Donor</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </details>
            
        </div>
    </div>
</body>
</html>