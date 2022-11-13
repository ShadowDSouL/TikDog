<?php
    session_start();
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
    <link rel="stylesheet" href="sweetalert2.min.css">
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
        .pet_information img {
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
            width: 700px;
            margin-bottom: 25px;
        }

        .delBtn{
            background-color:white;
            border: 3px solid black;
            padding: 5px;
            float: right;
            width: 75px;
            height: 16px;
            color: black;
            border-radius: 5px;
            text-align: center;
            margin-top: 30px;
            margin-right: 10px;
            text-decoration: none;
        }

        .delBtn:hover{
            cursor: pointer;
            background-color: black;
            color: white;
            
        }

        button[type='button']{
            background-color:white;
            border: 3px solid black;
            padding: 5px;
            float: right;
            width: 75px;
            color: black;
            border-radius: 5px;
            text-align: center;
        }

        button[type='button']:hover{
            cursor: pointer;
            background-color: black;
            color: white;
            
        }
        .rightBtn{
            background-color:white;
            border: 3px solid black;
            padding: 5px;
            width: 75px;
            color: black;
            border-radius: 5px;
            text-align: center;
        }

        .rightBtn:hover{
            cursor: pointer;
            background-color: black;
            color: white;
        }

    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="wrapper">
        <?php $row = mysqli_fetch_assoc($result); ?>
        <div class="wrapper2">

        
        <div class="pet_information">
            <?php echo '<img src="../petimg/'.$row['Image'].'" alt="pet_image" height="220px" width="160px">'; ?>
            <table>
                <tr>
                    <td><b>Pet Name</b></td>
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
                <button class="rightBtn" onclick="location.href='donor.php'">Back</button>
                
                <button type="button" onclick="window.location.href='editpet.php?PetID=<?php echo $row['PetsID'] ?>';">Edit</button>
                <a href="deletepet.php?PetID=<?php echo $petID ?>" type="button" class="delBtn">
                     Delete
                </a>
        </div>
    </div>
    </div>



    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
         $('.delBtn').on('click',function(del){
                    del.preventDefault();
                    const href = $(this).attr("href")

                    Swal.fire({
                        title:'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete!'
                        }).then((result) => {
                            if (result.value) {
                                document.location.href = href;
                                
                            }else if (
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                Swal.fire(
                                'Cancelled',
                                'Your pet is safe :)',
                                'error'
                                )
                            }
                        })
                })
    </script>
</body>
</html>