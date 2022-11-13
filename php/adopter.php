<?php
    session_start();
    include_once('conn.php');

    $sql_announcement = "SELECT * FROM announcement ORDER BY AnnDate DESC LIMIT 1";
    $result_announcement = mysqli_query($conn, $sql_announcement);
    $userID = $_SESSION['userID'];
    $sql_notification = "SELECT *
                        FROM pets INNER JOIN user
                        ON pets.DonorID = user.UserID
                        INNER JOIN donor
                        ON donor.PetID = pets.PetsID
                        INNER JOIN adopter
                        ON adopter.PetID = pets.PetsID
                        WHERE pets.AdopterID = '$userID' AND pets.PetStatus = 'Adopted' AND adopter.Notification = 'Unread'";
    $result_notification = mysqli_query($conn, $sql_notification);

    $sql_pets = "SELECT pets.PetsID, pets.PetName, pets.PetAge, pets.Gender, pets.Species, pets.PetStatus, pets.Image, donor.PetID, donor.DonorID, donor.DonateTIme, user.UserID, user.FirstName, user.LastName, user.Location
            FROM pets INNER JOIN donor
            ON pets.PetsID = donor.PetID AND pets.PetStatus = 'Available' AND pets.DonorID <> '$userID'
            INNER JOIN user
            GROUP BY pets.PetsID
            ORDER BY donor.DonateTIme"; 
    $result_pets = mysqli_query($conn, $sql_pets);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopter</title>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="search.js">
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .wrapper {
            width: 1000px;
            display: grid;
            justify-content: center;
            margin: 0 auto;
            margin-top: 10px;
            background-color: #fff;
        }

        .announcement table {
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .announcement table tr td {
            padding-left: 10px;
        }

        .announcement table tr td h3 {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .notification table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .notification table tr td {
            padding-left: 10px;
        }

        .notification table tr td h3 {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .notification table tr td img{
            border-radius: 50%;
            margin-top: 10px;
        }

        .notification table tr td button {
            border: 1px;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .pets {
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(3, 1fr);
        }

        .information {
            width: 200px;
            border: 1px solid black;
            border-radius: 15px;
            /* background-color: rgba(255, 192, 203, 0.307); */
            background: linear-gradient(to bottom, #ee9ca7, #ffdde1);
        }

        .information ul li{
            display: flex;
            justify-content: center;
            margin-right: 30px;
        }

        .information a img {
            height: 100px;
            width: 120px;
            border: 1px solid black;
            border-radius: 10px;
            margin: 10px 40px;
        }

        .donateBtn {
            margin-left: 700px;
            margin-top: -50px;
        }

        .donateBtn button {
            padding: 10px;
            background-color: rgba(255, 192, 203, 0.307);
            border: 1px solid black;
            border-radius: 10px;
        }
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }

        .btnRead{
            border: 2px solid black;
            padding: 5px;
            border-radius: 10px;
            float: right;
            margin-right: 20px;
            color: black;
            background-color: lightblue;
            text-decoration: none;
        }

        .btnRead:hover{
            color: white;
            background-color: black;
        }

    </style>
</head>
<body>
    <?php include('header.php');?>
    <!-- Announcement -->
    <div class="wrapper">
        <div class="announcement">
            <?php 
                if (mysqli_num_rows($result_announcement)>0)
                {
                    while($row_announcement = mysqli_fetch_assoc($result_announcement)){?>
                    <table style="width: 800px;">
                        <tr style="border: 1px solid black;">
                            <td style="background-color: rgba(255, 192, 203, 0.39);" colspan="2"><h3>Announcement</h3></td>
                        </tr>
                        <tr>
                            <td style="width: 650px;"><?php echo "<h3>Title: " . $row_announcement['AnnTitle']."</h3>"; ?></td>
                            <td ><?php echo "Date: ". $row_announcement['AnnDate']; ?></td>
                        </tr>
                        <tr>    
                            <td style="font-size: 15px; padding-bottom: 15px;" colspan="2"><?php echo $row_announcement['AnnContent']; ?></td>
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

        <div class="notification">
            <table style="width: 800px;">
                    <tr style="border: 1px solid black;">
                        <td style="background-color: rgba(255, 192, 203, 0.39);" colspan="2"><h3>Notification</h3></td>
                    </tr>
        <?php 
            if (mysqli_num_rows($result_notification)>0)
            {
                while($row_notification = mysqli_fetch_assoc($result_notification)){?>
                    <tr>
                        <td style="width: 70px;"><?php echo "<img src='../img_user/".$row_notification['Avatar']."' alt='' height='50px' width='50px'" ?></td>
                        <td ><?php echo "<h2>"."Congratulations! You have successfully adopted ".$row_notification['PetName']." from ".$row_notification['Username']. ".</h2>" ?></td>
                    </tr>
                    <tr style="border-bottom:1px solid black">
                        <td></td>
                        <td style="padding-bottom: 10px;">
                            <a class="btnRead" href = 'read.php?UserID=<?php echo $userID ?>&PetID=<?php echo $row_notification['PetsID']?>'>Read</a>
                        </td>
                    </tr>
                <?php } ?>
                </table>
            <?php } 
            else
            {?>
                <table style="width: 800px;">
                    <tr>
                        <td><?php echo "<h1>No notification...</h1>";?></td>
                    </tr>
                </table>          
            <?php }?> 
        </div>
        <h1>Pets Available</h1>
        <div class="pets">
            <?php while($row_pets = mysqli_fetch_assoc($result_pets)){?>
                <div class="information">
                    <a href="petdetail.php?PetsID=<?php echo $row_pets['PetsID'];?>">
                        <?php echo '<img src="../petimg/'.$row_pets['Image'].'" alt="picture">'; ?>
                    </a>
                    <ul style="padding-left: 30px; margin-top:0; margin-bottom:10px;"> <!-- #?PetsID= -->
                        <li><?php echo $row_pets['PetName']; ?></li>
                        <li><?php echo $row_pets['PetAge'] ." years old | ". $row_pets['Gender']; ?></li>
                        <li><?php echo $row_pets['Species']; ?></li>
                        <li style="border: 1px solid black; border-radius:5px; background-color:pink;
                         padding-top:5px; padding-bottom:5px; cursor: pointer;">
                            <a href="adoptpet.php?PetsID=<?php echo $row_pets['PetsID'];?>" class="adoptPet" style="text-decoration: none; color: rgb(13, 118, 89);">Adopt Pet
                            </a>
                        </li>
                    </ul>
                </div>
            <?php } ?>  
        </div>
    </div>



    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
        $('.adoptPet').on('click',function(adopt){
                    adopt.preventDefault();
                    const href = $(this).attr("href")

                    Swal.fire({
                        title:'Are you sure you want it?',
                        text: "Press OK if you wish to proceed",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, want it!'
                        }).then((result) => {
                            if (result.value) {
                                document.location.href = href;
                                
                            }else if (
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                Swal.fire(
                                'Unfortunately',
                                'You missed a good buddy :)',
                                'info'
                                )
                            }
                        })
                })
    </script>
</body>
</html>


