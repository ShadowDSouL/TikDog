<?php
    include_once('conn.php');

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $number_per_page = 6;
    $start_from = ($page-1)*06;


    if (isset($_GET['Location'])){
        $location = $_GET['Location'];

        $sql = "SELECT pets.PetsID, pets.PetName, pets.PetAge, pets.Gender, pets.Species, pets.PetStatus, pets.Image, donor.PetID, donor.DonorID, donor.DonateTIme, user.UserID, user.FirstName, user.LastName, user.Location
            FROM pets INNER JOIN donor
            ON pets.PetsID = donor.PetID
            INNER JOIN user
            ON donor.DonorID = user.UserID
            WHERE pets.PetStatus = 'Available' AND user.Location = '$location'
            GROUP BY pets.PetsID
            ORDER BY donor.DonateTIme DESC
            LIMIT $start_from, $number_per_page";
    
        $result = mysqli_query($conn, $sql);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="../img/petlogo.png" type = "image/x-icon">
    <link rel="stylesheet" href="../css/hpheader.css">
    <title>Pets</title>

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
        }

        .search ul li a {
            text-decoration: none;
            color: black;
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
            background: linear-gradient(to bottom, #ffdde1, #ee9ca7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
    </style>
</head>
<body>
    <?php include('hpheader.php'); ?>
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
            <li><a href="pet.php?Location=Sarawak">Sarawak</a></li>
            <li><a href="pet.php?Location=Terengganu">Terengganu</a></li>
            <li><a href="pets.php">All States</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Pet Available</h1>
        <h3>Click on <b>Pet Image</b> to view its details and please <a href="loginpet.php" style="text-decoration: none;"><b>login</b></a> for the adoption.</h3>

        <div class="pet">
            <?php if (mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){?>
                    <div class="information">
                        <a href="pets.php?PetsID=<?php echo $row['PetsID'];?>" >
                            <?php echo '<img src="../petimg/'.$row['Image'].'" alt="picture">'; ?>
                        </a>
                        <ul>
                            <li><?php echo $row['PetName']; ?></li>
                            <li><?php echo $row['DonateTIme']; ?></li>
                            <li><?php echo $row['PetAge'] ." years old | ". $row['Gender']; ?></li>
                            <li><?php echo $row['Species']; ?></li>
                            <li><?php echo $row['FirstName']." ".$row['LastName'] ." | ". $row['Location']; ?></li>
                        </ul>
                    </div>
                <?php } ?>
            <?php } 
                else{
                    echo "<h2>No pet available in this state...</h2>";
                }?>  
        </div> 
        <?php
            $pr_query = "SELECT * 
                        FROM pets INNER JOIN donor
                        ON pets.PetsID = donor.PetID
                        INNER JOIN user
                        ON donor.DonorID = user.UserID
                        WHERE pets.PetStatus = 'available' AND user.Location = '$location'";
            $pr_result = mysqli_query($conn, $pr_query);
            $total_record = mysqli_num_rows($pr_result);
            $total_page = ceil($total_record/$number_per_page);

            if($page>1)
            {
                echo "<a href='pets.php?page=".($page-1)."' class='button'>Previous</a>";

            }

            for($i=1; $i<$total_page; $i++)
            {
                echo "<a href='pets.php?page=".$i."' class='button'>$i</a>";
            }

            if($i>$page)
            {
                echo "<a href='pets.php?page=".($page+1)."' class='button'>Next</a>";

            }
        ?> 
    </div>
    
</body>
</html>