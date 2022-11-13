<?php include_once("conn.php");?>
<?php
    $sql1 = "SELECT * FROM pets WHERE PetStatus = 'available'";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_num_rows($result1);
    $sql2 = "SELECT * FROM pets WHERE PetStatus = 'adopted'";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_num_rows($result2);
    $total = $row1 + $row2;
    $availPercent = ($row1/$total) * 100;
    $adoptPercent = ($row2/$total) * 100;
    $availResult = sprintf('%.2f', $availPercent);
    $adoptResult = sprintf('%.2f', $adoptPercent);

    $userSQL = "SELECT UserID, Username, FirstName, LastName, ContactNumber, Address  FROM user";
    $userResult = mysqli_query($conn,$userSQL);

    $speciesSQL = "SELECT COUNT(PetsID) AS amount, Species FROM `pets`GROUP BY Species";
    $speciesResult = mysqli_query($conn,$speciesSQL);
    
        
?>
<style>
    #wrapper{
        width: auto;
        margin: auto;
    }
    .container{
        height: auto;
        margin: auto;
        text-align: center;
        width: 900px;
    }
    h1{
        font-size:100px; 
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        text-align: center;
    }
    p{
        font-size:20px; 
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    #btn-back-to-page {
        position: fixed;
        bottom: 20px;
        right: 20px;
        color: black;
        background-color: rgba(0, 0, 0, 0.288);
        border: black;
    }
    #btn-print {
        position: fixed;
        bottom: 20px;
        right: 150px;
        color: black;
        background-color: rgba(0, 0, 0, 0.288);
        border: black;
    }

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Admin</title>
</head>
<body>
    <div id="wrapper">
        <div class="container">
            <hr>
            <h1>Final Report</h1>
            <hr>
            <div id="petchart" style="text-align:center ;"></div>
            <p>According to the final report, total amount of pets in <?php echo date('Y')?> will be <?php echo $total?>. <br>
            <?php echo $availResult?>% of the pets are still unadopted, <?php echo $adoptResult?>% of the pets succesfully adopted. </p>
            <hr>
        </div>
        <br>
        <div class="container">
            <hr>
            <h4>Users Information</h4>
            <br>
            <div id="table">
                <table class="table">
                    <caption>List of users</caption>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">UserName</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($userRow = mysqli_fetch_assoc($userResult)){?>
                            <tr>
                            <th scope="row"><?php echo $userRow['UserID']?></th>
                            <td><?php echo $userRow['Username']?></td>
                            <td><?php echo $userRow['FirstName']?></td>
                            <td><?php echo $userRow['LastName']?></td>
                            <td><?php echo $userRow['ContactNumber']?></td>
                            <td><?php echo $userRow['Address']?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                </table>
            </div>
            <br><br>
            <hr>
        <h4>Pet Species</h4>   
        <hr> 
        <div id="table">
                <table class="table">
                    <caption>List of pet species</caption>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Species</th>
                            <th scope="col">Amount</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php while($speciesRow = mysqli_fetch_assoc($speciesResult)){?>
                            <tr>
                            <th scope="row"></th>
                            <td><?php echo $speciesRow['Species']?></td>
                            <td><?php echo $speciesRow['amount']?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-page"
        onclick="location.href='adminpage.php'"
        >
        <i class="bi bi-arrow-90deg-left">Back</i>
    </button>
    <button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-print"
        onclick="Print()"
        >
        <i class="bi bi-printer">Print</i>
    </button>

    <script>
        // chart
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Pet', 'Pet Information'],
            ['Available', <?php echo $row1;?>],
            ['Adopted',<?php echo $row2;?>],
            ]);

        
            var options = {'title':'Pet Information', 'width':1296, 'height':400, pieHole: 0.4, };

             
            var chart = new google.visualization.PieChart(document.getElementById('petchart'));
            chart.draw(data, options);
        }

        
  



        function Print(){
            var page = document.body.innerHTML;
            var content = document.getElementById('wrapper').innerHTML;
            document.body.innerHTML = content;
            window.print();
            location.reload(true);

        }

    </script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/857f7a5c40.js" crossorigin="anonymous"></script>
    
   
</body>
</html>