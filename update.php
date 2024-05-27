<?php 
include "config.php";

 $update = false ;
 if (isset($_POST['Update'])){
 
   $id = $_POST['id']; 
   $fullname = $_POST['fullname'];
   $emailadd = $_POST['emailadd'];
   $phoneno = $_POST['phoneno'];
   $messagearea = $_POST['messagearea'];  
   $img_loc = $_FILES['imagedata']['tmp_name']; 
   $img_name = $_FILES['imagedata']['name'];
   $img_des = "uploads/" . $img_name; 
   move_uploaded_file($img_loc, $img_des);
   $hobby = $_POST['hobby'];
   $hobbies = implode(",",$hobby);
    if (isset($_POST['gender']) && !empty($_POST['gender'])) {
        $gender = $_POST['gender'];
       }
       $content = $_POST['editorTextarea'];
       

    if (isset($_POST['country']) && !empty($_POST['country'])) {
            $country = $_POST['country'];
        }     
        $sqlquery = "UPDATE `formvalidation` SET `fullname`='$fullname', `emailadd`='$emailadd', `phoneno`='$phoneno', `imagedata`='$img_des', `messagearea`='$messagearea', `hobbies`='$hobbies', `gender`='$gender', `content`='$content', `country`='$country' WHERE `id`='$id'";



$result = mysqli_query($conn, $sqlquery); 
   if (!empty($result)) {
    header('location: http://localhost/validation/tcpdf/read.php');
   }
   else {
    echo "Error: " . $stmt->error;
   }}
 ?>