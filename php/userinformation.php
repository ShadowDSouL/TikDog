<?php
    session_start();
    include_once('conn.php');
    $userID = $_SESSION['userID'];
    if(isset($_FILES["filename"]["name"])){
        $contact_number = $_POST['contact_number'];
        $address = $_POST['address'];
        $social_media = ($_POST['social_media']);
        $location = ($_POST['location']);

        $imageName = $_FILES["filename"]["name"];
        $imageSize = $_FILES["filename"]["size"];
        $tmpName = $_FILES["filename"]["tmp_name"];
      
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
    
        $sql_1 = "UPDATE `user` SET `ContactNumber` = '$contact_number', `Address` = '$address', `Location` = '$location', `SocialMedia` = '$social_media'
        WHERE UserID = $userID";
        mysqli_query($conn, $sql_1);
        if($imageName === ''){
            $sql_2 = "UPDATE `user` SET `Avatar` = 'profile.jpg' WHERE UserID = $userID";
            mysqli_query($conn, $sql_2);
        }else{
            $sql_2 = "UPDATE `user` SET `Avatar` = '$imageName' WHERE UserID = $userID";
            mysqli_query($conn, $sql_2);
        }
        move_uploaded_file($tmpName, '../img_user/' . $imageName);
        echo "<script> alert('User profile created successfully!'); 
        document.location.href = 'loginpet.php';
        </script>";
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="../img/petlogo.png" type = "image/x-icon">
    <title>Set Profile</title>
    <link rel="stylesheet" href="../css/hpheader.css">
    <link rel="stylesheet" href="../css/userinformation.css">
</head>
<body>
    <div class="header">
        <img src="../img/petlogo.png" alt="logo" width="50px" height="50px">
        <h1>TikDog</h1>
    </div>
    <div class="nav">
        <ul>
            <!-- remember to change the link afterward-->
            <li><a href="index.php">Home</a></li>
            <li><a href="pets.php">Pets</a></li>
            <li><a href="announcement.php">Announcement</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li class="active" id="su"><a href="#">Sign Up</a></li>
            <span class="nav_vl"></span>
            <li id="lg"><a href="loginpet.php">Login</a></li>
        </ul>
    </div>
    <div class="wrap_content">
        <div class="content">
            <form class="box" method="POST" action="" enctype="multipart/form-data"  name="reg_form" onsubmit="return validate()">
                <div class="register">
                    <h3>Please create your user profile</h3>
                    <hr>
                </div>
                <label>
                    <input type="text" name="contact_number" placeholder="Contact Number" id="contact_number" required>
                </label>
                <label>
                    <input type="text" name="address" placeholder="Address" id="address" required>
                </label>
                <label>
                    <input type="text" name="social_media" placeholder="Link of Social Media" id="social_media" required>
                </label>
                <p>
                    Location:
                    <select name="location" id="location">
                            <option>Location</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                            <option value="Johor">Johor</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Perak">Perak</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Pulau Pinang">Pulau Pinang</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Terengganu">Terengganu</option>
                    </select>
                </p>
                <label>
                    <p id="avatar">
                        Avatar:
                        <input type="file" name="filename">
                    </p>
                </label>
                    <label><input type="submit" name="btnComplete" value="Complete"></label>
            </form>
        </div>
    </div>
    <script>
        function validate()
        {
            var phoneno = document.reg_form.contact_number;
            if(phoneValidation(phoneno))
            {
                return true;
            }
            return false;

        }

        function phoneValidation(phoneNumber)
        {
            var format = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
            if (phoneNumber.value.match(format))
            {
                return true;
            }
            else
            {
                alert('Incorrect phone number format!');
                return false;
            }
        }
    </script>
</body>
</html>