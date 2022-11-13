<?php
    include_once('conn.php');
    if(isset($_GET['PetsID'])){
        
        $petID = $_GET['PetsID'];

        $sql = "SELECT * FROM pets
            INNER JOIN donor
            ON pets.PetsID = donor.PetID
            INNER JOIN user
            ON donor.DonorID = user.UserID
            WHERE pets.PetsID = '$petID'";
    
        $result = mysqli_query($conn, $sql);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .search {
            width: 200px;
            margin-top: 20px;
            margin-left: 30px;
            border: 1px solid black;
            border-radius: 15px;
            float: left;
            background-color: rgba(255, 192, 203, 0.39);
        }

        .search h3 {
            padding-left: 30px;
        }

        .search ul {
            display: block;
            padding-left: 50px;
        }

        .search ul li {
            list-style: none;
            padding: 2px;
        }

        .search ul li a {
            text-decoration: none;
            color: black;
        }

        .search ul li a:hover{
            text-decoration: underline;
        }

        .content {
            width: 1000px;
            margin-left: 300px;
        }
        .pet {
            width: 1000px;
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(2, 1fr);
        }

        .information {
            width: 450px;
            border: 1px solid black;
            border-radius: 15px;
            
        }

        .information a {
            float: left;
        }

        .information ul li{
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        .information a img {
            height: 160px;
            width: 220px;
            border: 1px solid black;
            border-radius: 10px;
            margin: 10px;
        }

        .detail {
            width: 1000px;
            display: grid;
            justify-content: center;
            align-items: center;
            /* margin: 0 300px; */
            border: 1px solid black;
            border-radius: 15px;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            background-color: pink;
        }

        .detail img {
            width: 220px;
            height: 160px;
            border: 1px solid black;
            border-radius: 15px;
        }

        .pet_information {
            margin: 30px 0 30px 135px
        }   
        
        .pet_information table {
            width: 400px;
        }

        table tr td {
            font-size: 18px;
            font-weight: bolder;
        }
        .donor_information {
            margin-top: -30px;
            position: relative;
        }

        button {
            display: flex;
            width: 70px;
            margin-top: -50px;
            margin-left: 430px;
            margin-bottom: 12px;
            border-radius: 10px;
            padding: 5px;
        }

        button:hover{
            cursor: pointer;
            color: white;
            background-color: black;
        }

        .wrapper{
            background-color:rgb(229, 228, 226, 0.4);
            border-radius: 10px;
            padding: 2px;
            padding-bottom: 25px;
        }
    </style>
</head>
<body>
    <?php include('hpheader.php'); ?>
    <div class="wrapper">
    <div class="search">
        <h3>Pets for adoption</h3>
        <hr>
        <h3>Search by States</h3>
        <ul>
            <li><a href="pet.php?Location=Selangor">Selangor</a></li>
            <li><a href="pet.php?Location=Kuala Lumpur">Kuala Lumpur</a></li>
            <li><a href="pet.php?Location=Johor">Johor</a></li>
            <li><a href="pet.php?Location=Kedah">Kedah</a></li>
            <li><a href="pet.php?Location=Kelantan">Kelantan</a></li>
            <li><a href="pet.php?Location=Melaka">Melaka</a></li>
            <li><a href="pet.php?Location=Negeri Sembilan">Negeri Sembilan</a></li>
            <li><a href="pet.php?Location=Pahang">Pahang</a></li>
            <li><a href="pet.php?Location=Perak">Perak</a></li>
            <li><a href="pet.php?Location=Perlis">Perlis</a></li>
            <li><a href="pet.php?Location=Pulau Pinang">Pulau Pinang</a></li>
            <li><a href="pet.php?Location=Sabah">Sabah</a></li>
            <li><a href="pet.php?Location=Sawarak">Sarawak</a></li>
            <li><a href="pet.php?Location=Terengganu">Terengganu</a></li>
            <li><a href="pets.php">All States</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Pet Available</h1>
        <h3>Click on <b>Pet Image</b> to view its details and please <a href="#" style="text-decoration: none;"><b>login</b></a> for the adoption.</h3>
    
        <div class="detail">
            <?php $row = mysqli_fetch_assoc($result); ?>
            <div class="pet_information">
                <?php echo '<img src="../petimg/'.$row['Image'].'" alt="pet_image">'; ?>
                <table style="margin-top: 20px;">
                    <tr>
                        <td style="width: 100px;">Pet Name</td>
                        <td><?php echo " : ". $row['PetName'];?></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Age</td>
                        <td><?php echo " : ". $row['PetAge'] . " years old "; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Body</td>
                        <td><?php echo" : ". $row['PetBody']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Color</td>
                        <td><?php echo" : ". $row['Color']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Vaccinated</td>
                        <td><?php echo" : ". $row['Vaccinated']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Spayed</td>
                        <td><?php echo " : ". $row['Spayed']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Species</td>
                        <td><?php echo " : ". $row['Species']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Gender</td>
                        <td><?php echo " : ". $row['Gender']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Condition</td>
                        <td><?php echo " : ". $row['PetCondition']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Dewormed</td>
                        <td><?php echo " : ". $row['Dewormed']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="donor_information">
                <?php echo '<img src="../img_user/'.$row['Avatar'].'" alt="user_image">'; ?>
                <table id="view" style="margin-top: 20px;">
                    <tr>
                        <td style="width: 150px;">Donor Name</td>
                        <td><?php echo  " : ". $row['FirstName'] . " " . $row['LastName']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Date of Birth</td>
                        <td><?php echo  " : ". $row['DOB']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Gender</td>
                        <td><?php echo  " : ". $row['Gender']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Contact Number</td>
                        <td><?php echo  " : ". $row['ContactNumber']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Email</td>
                        <td><?php echo  " : ". $row['Email']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Address</td>
                        <td><?php echo  " : ". $row['Address']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 5;">Location</td>
                        <td><?php echo  " : ". $row['Location']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Social Media Link</td>
                        <td><?php echo  " : <a href='". $row['SocialMedia']."' target='_blank' style='text-decoration: none; color:blue;'>".$row['SocialMedia']."</a>"; ?></td>
                    </tr>
                </table>
            </div>
            <button onclick="history.back()">Go Back</button>
        </div>    
    </div>
</div>
</body>
</html>