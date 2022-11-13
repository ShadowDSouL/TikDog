<?php include_once("conn.php")?>
<?php

if(isset($_GET['userID'])){
    $id = mysqli_real_escape_string($conn,$_GET['userID']);


    $sql = "SELECT * FROM user WHERE UserID = $id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
        $acc = mysqli_fetch_array($result);

        $res = [
            'status' => 444,
            'message' => 'User ID Get',
            'data' => $acc
        ];
        echo json_encode($res);
        return false;
    
    }else{
        $res = [
            'status' => 404,

        ];
        echo json_encode($res);
        return false;
    }

} 



?>