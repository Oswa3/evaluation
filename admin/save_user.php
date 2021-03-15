<?php

include('includes/security.php');

if(isset($_POST['submit'])){
  
  $school_id =$_POST['school_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $images = $_FILES["images"]['name'];
  
  if($password === $cpassword){
  
 $qry = mysqli_query($conn,"INSERT INTO user_list (school_id,firstname,lastname,email,password,images) VALUES ('$school_id','$firstname','$lastname','$email','$password','$images')");
 
 if($qry){
   move_uploaded_file($_FILES["images"]["tmp_name"], "upload/".$_FILES["images"]["name"]);
   $_SESSION['success'] = "Admin Profile Added ";
   header('Location: user.php');
 }else{
   $_SESSION['status'] = "Admin Profile Not Added";
   header('Location: user.php');
 }
} else{
   $_SESSION['status'] = "Password and Confirm Password Does Not Match!";
   header('Location: user.php');
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
      
      $_SESSION['success'] = "Admin Profile is Updated ";
       header('Location: user.php');
       
    }else{
      
      move_uploaded_file($_FILES["images"]["tmp_name"], "upload/".$_FILES["images"]["name"]);
   $_SESSION['success'] = "Admin Profile is Updated ";
   header('Location: user.php');
    }
    
 }else{
   $_SESSION['status'] = "Admin Profile is Not Updated";
   header('Location: user.php');
 }
}



if(isset($_POST['delete'])){
  
  $id = $_POST['delete_id'];
  
  $qry = mysqli_query($conn,"DELETE FROM user_list WHERE id='$id' ");
  if($qry){
    $_SESSION['success'] = "Admin Profile is Deleted";
   header('Location: user.php');
 }else{
   $_SESSION['status'] = "Admin Profile is Not Deleted";
   header('Location: user.php');
 }
}


if(isset($_POST['login'])){
  $schoolid_login = $_POST['school_id'];
  $password_login = $_POST['password'];
  
  $qry = mysqli_query($conn,"SELECT * FROM user_list WHERE school_id = '$schoolid_login' AND password = '$password_login'");
  
  if(mysqli_fetch_array($qry)){
    
    $_SESSION['username'] = $schoolid_login;
    header('Location: index.php');
  }
  else{
    $_SESSION['status'] = 'Invalid ID or Password';
    header('Location: login.php');
  }
}
?>