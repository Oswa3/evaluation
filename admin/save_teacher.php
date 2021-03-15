<?php

include('includes/security.php');

if(isset($_POST['submit'])){
  
  $school_id = $_POST['school_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $images = $_FILES["images"]['name'];
  
  if($password === $cpassword){
  
 $qry = mysqli_query($conn,"INSERT INTO teacher_list (school_id,firstname,lastname,email,password,images) VALUES ('$school_id','$firstname','$lastname','$email','$password','$images')");
 
 if($qry){
move_uploaded_file($_FILES["images"]["tmp_name"], "upload/faculty/".$_FILES["images"]["name"]);
   $_SESSION['success'] = "Faculty Profile Added ";
   header('Location: new_faculty.php');
 }else{
   $_SESSION['status'] = "Faculty Profile Not Added";
   header('Location: new_faculty.php');
 }
} else{
   $_SESSION['status'] = "Password and Confirm Password Does Not Match!";
   header('Location: new_faculty.php');
}
}



if(isset($_POST['update'])){
  
  $id = $_POST['edit_id'];
  $school_id = $_POST['editschool_id'];
  $firstname = $_POST['edit_firstname'];
  $lastname = $_POST['edit_lastname'];
  $email = $_POST['edit_email'];
  $password = $_POST['edit_password'];
  $images = $_FILES["images"]['name'];
  
    
  $images_query = mysqli_query($conn, "SELECT * FROM teacher_list WHERE id ='$id'");
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
  
 $qry = mysqli_query($conn,"UPDATE teacher_list SET school_id = '$school_id', firstname ='$firstname', lastname ='$lastname', email ='$email', password ='$password', images='$image_data' WHERE id='$id' ");
 
 if($qry){
   
   if($images == NULL){
      
      $_SESSION['success'] = "Faculty Profile is Updated ";
       header('Location: new_faculty.php');
       
    }else{
      
      move_uploaded_file($_FILES["images"]["tmp_name"], "upload/".$_FILES["images"]["name"]);
   $_SESSION['success'] = "Faculty Profile is Updated ";
   header('Location: new_faculty.php');
    }
    
 }else{
   $_SESSION['status'] = "Faculty Profile is Not Updated";
   header('Location: new_faculty.php');
 }
}



if(isset($_POST['delete'])){
  
  $id = $_POST['delete_id'];
  
  $qry = mysqli_query($conn,"DELETE FROM teacher_list WHERE id='$id' ");
  if($qry){
    $_SESSION['success'] = "Faculty Profile is Deleted";
   header('Location: new_faculty.php');
 }else{
   $_SESSION['status'] = "Faculty Profile is Not Deleted";
   header('Location: new_faculty.php');
 }
}
?>