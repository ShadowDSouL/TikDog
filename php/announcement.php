<?php
    include_once('conn.php');

    $sql = "SELECT * FROM announcement ORDER BY AnnDate DESC";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="../img/petlogo.png" type = "image/x-icon">
    <link rel="stylesheet" href="../css/hpheader.css">
    <title>Announcement</title>
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .wrapper {
            width: 1000px;
            display: grid;
            justify-content: center;
            margin: 0 auto;
            background-color: #fff;
            height: auto;
            border: 3px solid black;
            border-radius: 10px;
            padding-top: 10px;
            margin-top: 20px;
        }

        h1 {
            margin-left: 100px;
        }
        table {
            margin-left: 100px;
            margin-bottom: 20px;
            border: 1px solid black;
            border-collapse: collapse;
            
        }

        .content table tr td {
            padding-left: 10px;
            padding-bottom: 7px;
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
            <li class="active"><a href="announcement.php">Announcement</a></li>
            <li ><a href="AboutUs.php">About Us</a></li>
            <li id="su"><a href="register.php">Sign Up</a></li>
            <span class="nav_vl"></span>
            <li id="lg"><a href="loginpet.php">Login</a></li>
        </ul>
    </div>
    

    <div class="wrapper">
        <div class="content">
            <h1>Announcement</h1>
            <hr style="width: 1000px;">
            <?php 
                if (mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_assoc($result)){?>
                    <table style="width: 800px; background-color: rgba(255, 192, 203, 0.39);">
                        <tr>
                            <td style="width: 650px;"><?php echo "<h2>Title: " . $row['AnnTitle']."</h2>"; ?></td>
                            <td ><?php echo "Date: ". $row['AnnDate']; ?></td>
                        </tr>
                        <tr>    
                            <td style="font-size: 20px;" colspan="2"><?php echo $row['AnnContent']; ?></td>
                        </tr>
                    </table>
                    <?php } ?>
                <?php } 
                else
                {?>
                    <table style="width: 800px;">
                        <tr>
                            <td><?php echo "<h1>No announcement...</h1>";?></td>
                        </tr>
                    </table>          
                <?php }?> 
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