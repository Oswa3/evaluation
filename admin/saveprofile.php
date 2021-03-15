<?php
include('includes/security.php');

if(isset($_POST['update'])){
  
  $id = $_POST['edit_id'];
  
  $school_id = $_POST['editschool_id'];
  $firstname = $_POST['edit_firstname'];
  $lastname = $_POST['edit_lastname'];
  
  $email = $_POST['edit_email'];
  $password = $_POST['edit_password'];
  $images = $_FILES["images"]['name'];
  
    
  $images_query = mysqli_query($conn, "SELECT * FROM user_list WHERE id ='$id'");
  foreach($images_query as $ig_row){
    
    if($images == NULL){
      
      $image_data = $ig_row['images'];
      
    }else{
      if($img_path = "upload/".$ig_row['images']){
        unlink($img_path);
        $image_data = $images;
      }
    }
  }
 $qry = mysqli_query($conn,"UPDATE user_list SET school_id = '$school_id', firstname ='$firstname', lastname ='$lastname', email ='$email', password ='$password', images='$image_data' WHERE id='$id' ");
 
 if($qry){
   
   if($images == NULL){
      
      $_SESSION['success'] = "Student Profile is Updated ";
       header('Location: profile.php');
       
    }else{
      
      move_uploaded_file($_FILES["images"]["tmp_name"], "upload/".$_FILES["images"]["name"]);
   $_SESSION['success'] = "Student Profile is Updated ";
   header('Location: profile.php');
    }
    
 }else{
   $_SESSION['status'] = "Student Profile is Not Updated";
   header('Location: profile.php');
 }
 
}

?>