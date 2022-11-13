

<?php
    session_start();
    include_once("conn.php");

    $petID = $_GET['PetID'];
    if(isset($_FILES["filename"]["name"])){
        
        $name = ucwords($_POST['name']);
        $age = $_POST['age'];
        $body = ucwords($_POST['body']);
        $species = ucwords($_POST['species']);
        $color = ucwords($_POST['color']);
        $condition = ucwords($_POST['condition']);
        $gender = ucfirst($_POST['gender']);
        $vaccinated = ucfirst($_POST['vaccinated']);
        $dewormed = ucfirst($_POST['dewormed']);
        $spayed = ucfirst($_POST['spayed']);
        $description = ucfirst($_POST['description']);
  
        $imageName = $_FILES["filename"]["name"];
        $imageSize = $_FILES["filename"]["size"];
        $tmpName = $_FILES["filename"]["tmp_name"];
  
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
        
        if($imageName){
            $update_query1 = "UPDATE `pets`
                        SET `PetName`='$name', `PetBody`='$body', `Color`='$color', `Vaccinated`='$vaccinated', `Spayed`='$spayed', 
                        `Species`='$species', `Gender`='$gender', `PetCondition`='$condition', `Dewormed`='$dewormed', 
                        `Image`='$imageName', `PetAge`='$age', `Description`= '$description'
                        WHERE `PetsID` = $petID ";
            mysqli_query($conn, $update_query1);
            move_uploaded_file($tmpName, '../img/' . $imageName);
            echo "<script>
            document.location.href = 'donor.php?donate=4'
            </script>";
        }else{
            $update_query2 = "UPDATE `pets`
                        SET `PetName`='$name', `PetBody`='$body', `Color`='$color', `Vaccinated`='$vaccinated', `Spayed`='$spayed', 
                        `Species`='$species', `Gender`='$gender', `PetCondition`='$condition', `Dewormed`='$dewormed', 
                        `PetAge`='$age', `Description`= '$description'
                        WHERE `PetsID` = $petID";
            mysqli_query($conn,$update_query2);
            echo "<script>
            document.location.href = 'donor.php?donate=4'
            </script>";
        }
        

        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet</title>
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

        .wrapper2{
            background-color: pink;
            padding: 20px;
            border-radius: 10px;
        }

        .wrapper2 input, textarea{
            border-radius: 5px;
        }

        .bckBtn{
            border: 2px solid black;
            float: left;
            padding: 5px;
            border-radius: 10px;
            background-color: #D6DFE0;
            text-decoration: none;
            color: black;
        }

        .rightBtn{
            float:right ;
        }
        input[type='reset'], input[type='submit']{
          border: 2px solid black;
          border-radius: 10px;
          padding: 6px;
        }

        input[type='reset']:hover, input[type='submit']:hover,.bckBtn:hover{
            text-decoration: underline;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="wrapper">
        <h1>Edit Pet Information</h1>
        <div class="wrapper2">
        <form action="" method="POST" enctype="multipart/form-data">
            <?php  
                $sql = "SELECT * FROM pets WHERE PetsID = '$petID'";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)){
            ?>
            <table cellspacing="10">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Age</b></td>
                </tr>
                <tr>
                    <td><input type="text" name="name" value="<?php echo $row['PetName']?>" required ></td>
                    <td><input type="text" name="age" value="<?php echo $row['PetAge']?>" required></td>
                </tr>
                <tr>
                    <td><b>Body</b></td>
                    <td><b>Species</b></td>
                </tr>
                <tr>
                    <td><input type="text" name="body" value="<?php echo $row['PetBody']?>" required></td>
                    <td><input type="text" name="species" value="<?php echo $row['Species']?>" required></td>
                </tr>
                <tr>
                    <td><b>Color</b></td>
                    <td><b>Condition</b></td>
                </tr>
                <tr>
                    <td><input type="text" name="color" value="<?php echo $row['Color']?>" required></td>
                    <td><input type="text" name="condition" value="<?php echo $row['PetCondition']?>" required></td>
                </tr>
                <tr>
                    <td><b>Gender</b></td>
                    <td><b>Vaccinated</b></td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="gender" value="Male" <?php echo ($row['Gender'] == 'Male') ? 'checked' : '';?> required><i>Male</i>
                        <input type="radio" name="gender" value="Female" <?php echo ($row['Gender'] == 'Female') ? 'checked' : '';?> required><i>Female</i>
                    </td>
                    <td>
                        <input type="radio" name="vaccinated" value="Yes" <?php echo ($row['Vaccinated'] == 'Yes') ? 'checked' : '';?> required><i>Yes</i>
                        <input type="radio" name="vaccinated" value="No" <?php echo ($row['Vaccinated'] == 'No') ? 'checked' : '';?> required><i>No</i>
                    </td>

                </tr>
                <tr>
                    <td><b>Dewormed</b></td>
                    <td><b>Spayed</b></td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="dewormed" value="Yes" <?php echo ($row['Dewormed'] == 'Yes') ? 'checked' : '';?> required><i>Yes</i>
                        <input type="radio" name="dewormed" value="No" <?php echo ($row['Dewormed'] == 'No') ? 'checked' : '';?> required><i>No</i>
                    </td>
                    <td>
                        <input type="radio" name="spayed" value="Yes" <?php echo ($row['Spayed'] == 'Yes') ? 'checked' : '';?> required><i>Yes</i>
                        <input type="radio" name="spayed" value="No" <?php echo ($row['Spayed'] == 'No') ? 'checked' : '';?> required><i>No</i>
                    </td>
                </tr>
                <tr>
                    <td><b>Image</b></td>
                </tr>
                <tr>
                    <td><input type="file" name="filename" ></td>
                </tr>
                <tr>
                    <td><b>Description</b></td>
                </tr>
                <tr>
                    <td colspan="2"><textarea name="description" id="" cols="60" rows="5" required><?php echo $row["Description"] ?></textarea></td>
                </tr>   
            </table>
            <?php } ?>
            <a class="bckBtn" href="donor.php">Back</a>
            <div class="rightBtn">
                <input type="reset">
                <input type="submit" value="Edit" name="addpet">   
            </div>
        
        </form>
    </div>
    </div>



</body>
</html>