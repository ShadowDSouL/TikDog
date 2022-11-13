<?php include_once("conn.php") ?>
<?php
    if(isset($_GET['post_ID'])){
        $id = mysqli_real_escape_string($conn,$_GET['post_ID']);
    
    
        $sql = "SELECT * FROM Announcement WHERE AnnouncementID = $id";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1){
            $posts = mysqli_fetch_array($result);
    
            $res = [
                'status' => 445,
                'message' => 'Post ID Get',
                'data' => $posts
            ];
            echo json_encode($res);
            return false;
        
        }else{
            $res = [
                'status' => 424,
                'message' => 'Post ID Not Found'
            ];
            echo json_encode($res);
            return false;
        }
    
    } 




    if(isset($_POST["edit_post"])){
        $id = mysqli_real_escape_string($conn,$_POST['postID']);
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $content = mysqli_real_escape_string($conn,$_POST['content']);
        $date = mysqli_real_escape_string($conn,$_POST['date']);

        if($title == NULL || $content == NULL || $date == NULL){
            $res = [
                'status' => 0,
                
            ];
            echo json_encode($res);
            return false;
        }

        $sql = "UPDATE `announcement` SET `AnnTitle` = '$title', `AnnContent` = '$content', `AnnDate` = '$date' WHERE AnnouncementID = $id ";
        $result = mysqli_query($conn,$sql);

        if($result){
            $res =[
                'status' => 1,
                'message' => 'Updated Successfully'
            ];
            echo json_encode($res);
            return false;

        }else{
            $res =[
                'status' => 2,
                'message' => 'Not Updated'
            ];
            echo json_encode($res);
            return false;

        }
    }


    if(isset($_GET['postID'])){
        $id = mysqli_real_escape_string($conn,$_GET['postID']);


        $sql = "SELECT * FROM announcement WHERE AnnouncementID = $id ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1){
            $post = mysqli_fetch_array($result);

            $res = [
                'status' => 444,
                'message' => 'Post ID Get',
                'data' => $post
            ];
            echo json_encode($res);
            return false;
        
        }else{
            $res = [
                'status' => 404,
                'message' => 'Post ID not found'
            ];
            echo json_encode($res);
            return false;
        }

    } 
    
    

?>

