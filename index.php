<?php 
include "config.php";
 if (isset($_GET['id'])) {
 $id = $_GET['id'];
 $update = true;
 $query = "SELECT * FROM formvalidation WHERE id=".$id;
 $result = mysqli_query($conn, $query); 
   if (!empty($result)) {
        $row = mysqli_fetch_array($result);     
        $id = $row['id'];
        $fullname = $row['fullname'];
        $emailadd = $row['emailadd'];
        $phoneno = $row['phoneno'];
        $messagearea = $row['messagearea'];
        $imagedata = $row['imagedata'];
        $hobbies = $row['hobbies'];
        $gender = $row['gender'];
        $content = $row['content'];
        $country = $row['country'];
    }  
}
?> 
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="form2.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
</head>
 <body>
    <div class="container">
    <form action="<?php echo $id ? 'update.php' : 'insert.php'; ?>" method="post" id="input_form" enctype="multipart/form-data" >

            <div class="input-group">
                <label>Full Name</label>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="text" placeholder="Enter your name" id="contact-name" onkeyup="validatename()" name="fullname" required value="<?php echo $fullname;?>">
                <span id="name-error"> </span>
            </div>
            <div class="input-group">
                <label>Phone No</label>
                <input type="tel" placeholder="1234567890" id="contact-phone" onkeyup="validatePhone()" name="phoneno" required value="<?php echo $phoneno;?>">
                <span id="phone-error"></span>
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" placeholder="Enter Email" id="contact-email" onkeyup="validateEmail()" name="emailadd" required value="<?php echo $emailadd;?>">
                <span id="email-error"></span>
            </div>
            <div class="input-group">
            <label>Upload Image</label>
            <td>
             <input type="file" name="imagedata" accept="image/*"  onchange="previewImage(this)">
            <br>
            <img src="<?php echo $imagedata;?>" id="image-preview" style="width: 50px;display: flexbox;height: 60px;">
            </td>
            </div>

            <div class="input-group">
                <label>Your Message</label>
                <textarea rows="5" placeholder="Enter your message" id="contact-msg" onkeyup="validateMsg()" name="messagearea"required ><?php echo $messagearea;?></textarea>
                <span id="msg-error"></span>
            </div>         
            <div class="check-group">
               <label>Hobbies</label>
               <input type="checkbox" name="hobby[]" value="reading" <?php if (strpos($hobbies, 'reading') !== false) echo "checked"; ?>>
               <label> Reading </label>               
               <input type="checkbox" name="hobby[]" value="sports" <?php if (strpos($hobbies, 'sports') !== false) echo "checked"; ?>>
               <label>Sports</label>            
               <input type="checkbox" name="hobby[]" value="dancing" <?php if (strpos($hobbies, 'dancing') !== false) echo "checked"; ?>>
               <label>Dancing</label>
           </div>

            <div class="check-group">
             <label>Gender</label>
             <input type="radio" id="gender-male" name="gender" value="male" <?php if ($gender == 'male') echo "checked"; ?> required>
             <label for="gender-male">Male</label>
             <input type="radio" id="gender-female" name="gender" value="female" <?php if ($gender == 'female') echo "checked"; ?> required>
             <label for="gender-female">Female</label>
           </div>
           <div class="check-group"id="editor">
                <textarea id="editorTextarea" name="editorTextarea"><?php echo $content;?></textarea>
                </div>
           <div class="input-group">
             <label>Country</label>
             <select id="country" name="country">
                <option value="USA" <?php if ($country == 'USA') echo "selected"; ?>>United States</option>
                 <option value="India" <?php if ($country == 'India') echo "selected"; ?>>India</option>
               <option value="UK" <?php if ($country == 'UK') echo "selected"; ?>>United Kingdom</option>
              </select><br><br>
            </div>
            <?php if ($update == true): ?>
            <button class="btn" type="submit" name="Update" style="background:  #141a34;" >Update</button>
            <?php else: ?>
            <button type="submit" onclick="validateForm()" name="Submit">submit</button>
            <span id="submit-error"></span>
            <?php endif ?>
        </form>
    </div>
<script src="form.js"></script>
</body>
</html>

