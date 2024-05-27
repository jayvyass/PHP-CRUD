
<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process other form data
    $fullname = $_POST['fullname'];
    $emailadd = $_POST['emailadd'];
    $phoneno = $_POST['phoneno'];
    $messagearea = $_POST['messagearea'];
    
    // Process image data
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
        $query = "INSERT INTO formvalidation (fullname, emailadd, phoneno, imagedata, messagearea, hobbies, gender, content, country) VALUES ('$fullname', '$emailadd', '$phoneno', '$img_des', '$messagearea', '$hobbies', '$gender',  '$content' , '$country')";
      
        
if (mysqli_query($conn, $query)) {
    header('Location: http://localhost/validation/tcpdf/read.php');
    exit; // Make sure to exit after redirection
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
}
?>

