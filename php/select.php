<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="../img/petlogo.png" type = "image/x-icon">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="../css/hpheader.css">
    <title>Selection</title>
    <style>
        .box {
            float: left;
            width: 300px;
            height: 300px;
            margin-left: 30px;
            margin-top: 10px;
            padding: 5px;
            border: 2px solid black;
            border-radius: 10px;
        }

        ul {
            list-style-type: none;
            text-align: center;
            padding-left: 0px;
            margin-top: 150px;
        }

        a {
            text-decoration: none;
            font-size: 50px;
            color: #fff;
            font-weight: bolder;
        }

        #box1 {
            background-image: url("../img/adopter.jpg");
            background-repeat: no-repeat;
            /* background-attachment: fixed; */
            background-position: center; 
            background-size: 300px 300px;
            opacity: 0.9;
        }

        #box1:hover, #box2:hover{
            font-size: 70px;
            color:	rgb(255,105,180);
            font-style:bold ;
            opacity: 1;
        }



        #box2 {
            
            background-image: url("../img/donor.jpg");
            background-repeat: no-repeat;
            /* background-attachment: fixed; */
            background-position: center; 
            background-size: 300px 300px;
            opacity: 0.9;
        }

        .wrapper {
            width: 1000px;
            margin:-20px auto;
            background-color: #fff;
            height: 85vh;
        }

        .choose {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper h1 {
            margin-left: 150px;
            padding-top: 50px;
        }

        p {
            margin-left: 150px;
        }

        body {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .wrapper2{
            margin-top: 90px;
            background-color: pink;
            height: 80vh;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="../img/petlogo.png" alt="logo" width="50px" height="50px">
        <h1>TikDog</h1>
    </div>
    <div class="wrapper">
        <div class="wrapper2">
        <h1>Please choose a section to proceed ...</h1>
        <div class="choose">
            <a href="adopter.php">
                <div class="box" id="box1">
                    <ul>
                        <li >Adopter</li>
                    </ul>
                </div>
            </a>
            <a href="donor.php">
                <div class="box" id="box2">
                    <ul>
                        <li>Donor</li>
                    </ul>
                </div>
            </a>    
        </div>
        <p><small><b>Note:</b> You can switch between these 2 sections freely afterward by clicking <b>the little arrow</b> beside your username in the header.</small></p>
        </div>
    </div>
    <?php if(isset($_GET['signin'])): ?>
        <div class="flash-data" data-flashdata="<?php echo $_GET['signin']; ?>"></div>
    <?php endif;  ?>  


    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
        const flashdata = $('.flash-data').data('flashdata');
        if(flashdata == 1){
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
            })
        }
       
    </script>

</body>
</html>