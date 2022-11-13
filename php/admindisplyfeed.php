<?php include_once("conn.php")?>
<?php

if(isset($_GET['feedbackID'])){
    $id = mysqli_real_escape_string($conn,$_GET['feedbackID']);


    $sql = "SELECT feedback.FeedbackTitle, feedback.FeedbackID, feedback.FeedbackContent, feedback.FeedbackDate, feedback.UserID, user.Username 
            FROM feedback
            INNER JOIN user
            ON feedback.UserID = user.UserID
            WHERE feedback.FeedbackID = $id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
        $feedback = mysqli_fetch_array($result);

        $res = [
            'status' => 444,
            'message' => 'Feedback ID Get',
            'data' => $feedback
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