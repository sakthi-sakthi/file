<?php  
include 'db.php';
$target_path = "profile-photos/";  
$target_path = $target_path.basename( $_FILES['img']['name']);   
  
if(move_uploaded_file($_FILES['img']['tmp_name'], $target_path)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
?>