<?php
    session_start();
    include_once('conn.php');
    if(isset($_GET['userID'])){
        $userID = $_GET['userID'];
        $sql = "SELECT * FROM user WHERE UserID = '$userID' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if(isset($_FILES["filename"]["name"])){
            $fname = ucfirst($_POST['firstName']);
            $lname = ucfirst($_POST['lastName']);
            $contact_number = $_POST['contact_number'];
            $address = $_POST['address'];
            $social_media = ($_POST['social_media']);
            $location = ($_POST['location']);
            $email = trim($_POST['email']);
            $gender = ($_POST['gender']);
            $dob = $_POST['dob'];;
            $imageName = $_FILES["filename"]["name"];
            $imageSize = $_FILES["filename"]["size"];
            $tmpName = $_FILES["filename"]["tmp_name"];
      
      
              if(empty($imageName)){
                  $query1 = "UPDATE `user` SET `FirstName` = '$fname', `LastName` = '$lname', `ContactNumber` = '$contact_number', `Address` = '$address', `Location` = '$location', `SocialMedia` = '$social_media'
            , `Email` = '$email', `Gender` = '$gender', `DOB` = '$dob' WHERE UserID = $userID";
                  mysqli_query($conn, $query1);
                  echo "<script> 
                  document.location.href = 'userprofile.php?profile=1'
                  </script>";
      
              }else{
                $query2 = "UPDATE `user` SET `FirstName` = '$fname', `LastName` = '$lname', `ContactNumber` = '$contact_number', `Address` = '$address', `Location` = '$location', `SocialMedia` = '$social_media'
                , `Email` = '$email', `Gender` = '$gender', `DOB` = '$dob' , `Avatar` = '$imageName' WHERE UserID = $userID";
                 mysqli_query($conn, $query2);
                move_uploaded_file($tmpName, '../img_user/' . $imageName);
                  echo "<script>
                  document.location.href = 'userprofile.php?profile=1'
                  </script>";
              }         
          }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="../img/petlogo.png" type = "image/x-icon">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/hpheader.css">
    <link rel="stylesheet" href="../css/editprofile.css">
    
</head>
<body>
    <?php include('header.php')?>
    <div class="wrap_content">
        <div class="content">
            <form class="box" method="POST" action=""  enctype="multipart/form-data" name="reg_form" onsubmit="return validate()">
                <div class="register">
                    <h3>Edit Profile</h3>
                    <hr>
                </div>
                <input class="firstName" type="text" placeholder="First Name" name="firstName" value="<?php echo $row['FirstName'] ?>" required>
                <input class="lastName" type="text" placeholder="Last Name" name="lastName" value="<?php echo $row['LastName'] ?>" required > <br>
                <label>
                    <input type="text" name="contact_number" placeholder="Contact Number" id="contact_number" value="<?php echo $row['ContactNumber'] ?>" required>
                </label>
                <label>
                    <input type="text" name="address" placeholder="Address" id="address" value="<?php echo $row['Address'] ?>" required>
                </label>
                <label>
                    <input type="text" name="social_media" placeholder="Link of Social Media" id="social_media" value="<?php echo $row['SocialMedia'] ?>" required>
                </label>
                <label>
                    <input type="email" name="email" placeholder="Email" id="register_email" value="<?php echo $row['Email'] ?>" required>
                </label>
                <p>Date of Birth:
                    <label>
                        <input type="date" name="dob" placeholder="Date of Birth" id="dob" value="<?php echo $row['DOB'] ?>" required>
                    </label>
                </p>
                <p>
                    Location:
                    <select name="location" id="location" required>
                            <option value="<?php echo $row['Location'] ?>" required><?php echo $row['Location'] ?></option>
                            <option value="Selangor" required>Selangor</option>
                            <option value="Kuala Lumpur" required>Kuala Lumpur</option>
                            <option value="Johor" required>Johor</option>
                            <option value="Kedah" required>Kedah</option>
                            <option value="Kelantan" required>Kelantan</option>
                            <option value="Melaka" required>Melaka</option>
                            <option value="Negeri Sembilan" required>Negeri Sembilan</option>
                            <option value="Pahang" required>Pahang</option>
                            <option value="Perak" required>Perak</option>
                            <option value="Perlis" required>Perlis</option>
                            <option value="Pulau Pinang" required>Pulau Pinang</option>
                            <option value="Sabah" required>Sabah</option>
                            <option value="Sarawak" required>Sarawak</option>
                            <option value="Terengganu" required>Terengganu</option>
                    </select>
                </p>
                <label>
                    <p id="avatar" style="margin: 0px 0px 0px 40px;">
                        Avatar:
                        <input type="file" name="filename">
                    </p>
                </label>
                <p>
                    Gender:
                    <label><input type="radio" name="gender" value="Male" <?php echo ($row['Gender'] == 'Male') ? 'checked' : '';?> required>Male</label>
                    <label><input type="radio" name="gender" value="Female" <?php echo ($row['Gender'] == 'Female') ? 'checked' : '';?> validate>Female</label>
                </p>
                    <label><input type="submit" name="btnUpdate" value="Update"></label>
                    <button name="btnCancel" id="btnCancel"><a href="userprofile.php">Cancel</a></button>
            </form>
        </div>
    </div>
    <script>
        function validate()
        {
            var fname = document.reg_form.firstName;
            var lname = document.reg_form.lastName;
            if(allLetter(fname))
            {
                if(allLetter(lname))
                {
                    return true;
                }
            }
            return false;

        }
        function allLetter(inputtxt)
        {
            var letters = /^[A-Za-z]+$/;
            if(inputtxt.value.match(letters))
                {
                return true;
                }
            else
                {
                    alert("Your name must have alphabet characters only!");
                    return false;
                }
        }
    </script>
</body>
</html>