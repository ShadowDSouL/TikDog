<?php
    session_start();
    include_once('conn.php');
    if(isset($_GET['PetsID'])){
        
        $petID = $_GET['PetsID'];

        $sql = "SELECT * FROM pets
            INNER JOIN donor
            ON pets.PetsID = donor.PetID
            INNER JOIN user
            -- ON donor.DonorID = user.UserID
            WHERE pets.PetsID = '$petID'";
    
        $result = mysqli_query($conn, $sql);
        $userID = $_SESSION['userID'];
        $sql_1 = "UPDATE `pets` SET `PetStatus`='Requesting', `AdopterID`='$userID' WHERE pets.PetsID = '$petID'";
        mysqli_query($conn, $sql_1);
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel = "icon" href ="../img/petlogo.png" type = "image/x-icon">
    <title>My Pets</title>
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
        img {
            float: left;
            margin-right: 60px;
        }
        .pet_information {
            margin: 50px;
        }
        button {
            margin-top:30px;
        }
        .wrapper2{
            background-color: pink;
            margin-top: 20px;
            border-radius: 10px;
        }
        .pet_information img{
            float: left;
            margin-right: 60px;
        }

    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="wrapper">
        <?php $row = mysqli_fetch_assoc($result); ?>
        <div class="wrapper2">
        <div class="pet_information">
            <img src="../petimg/<?php echo $row['Image']?>" alt="pet_image" height="220px" width="160px">
            <table>
                <tr>
                    <td><b>Pet Name</b> </td>
                    <td><?php echo " : ". $row['PetName'];?></td>
                </tr>
                <tr>
                    <td><b>Age</b></td>
                    <td><?php echo " : ". $row['PetAge'] . " years old "; ?></td>
                </tr>
                <tr>
                    <td><b>Body</b></td>
                    <td><?php echo" : ". $row['PetBody']; ?></td>
                </tr>
                <tr>
                    <td><b>Color</b></td>
                    <td><?php echo" : ". $row['Color']; ?></td>
                </tr>
                <tr>
                    <td><b>Vaccinated</b></td>
                    <td><?php echo" : ". $row['Vaccinated']; ?></td>
                </tr>
                <tr>
                    <td><b>Spayed</b></td>
                    <td><?php echo " : ". $row['Spayed']; ?></td>
                </tr>
                <tr>
                    <td><b>Species</b></td>
                    <td><?php echo " : ". $row['Species']; ?></td>
                </tr>
                <tr>
                    <td><b>Gender</b></td>
                    <td><?php echo " : ". $row['Gender']; ?></td>
                </tr>
                <tr>
                    <td><b>Condition</b></td>
                    <td><?php echo " : ". $row['PetCondition']; ?></td>
                </tr>
                <tr>
                    <td><b>Dewormed</b></td>
                    <td><?php echo " : ". $row['Dewormed']; ?></td>
                </tr>  
            </table>
            <br>

                <h6>Important!! <hr>Pet Adoption Request has been sent to the donor, Please be patient and wait for the donor's responds...</h6>
                <button type="button" class="btn btn-outline-dark" onclick="history.back()">Back</button>
                <!-- <a>
                    <button onclick="return confirm
                        ('Are you sure you want to Adopt this pet?\nPress OK if you wish to proceed.');" name="btnCfmAdpt">Adopt Pet</button>  
                </a> -->
        </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>