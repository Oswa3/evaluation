<?php

include_once('includes/conn.php');

if(isset($_POST['submit'])){
  
  $school_id = $_POST['school_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $course = $_POST['course'];
  $year = $_POST['year'];
  $block = $_POST['block'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $images = $_FILES["images"]['name'];
  
 
  if($password === $cpassword){
  
 $qry = mysqli_query($conn,"INSERT INTO new_student (school_id,firstname,lastname,course,year,block,email,password,images) VALUES ('$school_id','$firstname','$lastname','$course','$year','$block','$email','$password','$images')");
 
 if($qry){
   move_uploaded_file($_FILES["images"]["tmp_name"], "upload/students/".$_FILES["images"]["name"]);
   $_SESSION['success'] = "Student Profile Added ";
   header('Location: new_student.php');
 }else{
   $_SESSION['status'] = "Student Profile Not Added";
   header('Location: new_student.php');
 }
} else{
   $_SESSION['status'] = "Password and Confirm Password Does Not Match!";
   header('Location: new_student.php');
}

}


if(isset($_POST['update'])){
  
  $id = $_POST['edit_id'];
  $school_id = $_POST['editschool_id'];
  $firstname = $_POST['edit_firstname'];
  $lastname = $_POST['edit_lastname'];
  $course = $_POST['edit_course'];
  $year = $_POST['edit_year'];
  $block = $_POST['edit_block'];
  $email = $_POST['edit_email'];
  $password = $_POST['edit_password'];
  $images = $_FILES["images"]['name'];
  
    
  $images_query = mysqli_query($conn, "SELECT * FROM new_student WHERE id ='$id'");
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
 $qry = mysqli_query($conn,"UPDATE new_student SET school_id = '$school_id', firstname ='$firstname', lastname ='$lastname', course='$course', year='$year', block='$block', email ='$email', password ='$password', images='$image_data' WHERE id='$id' ");
 
 if($qry){
   
   if($images == NULL){
      
      $_SESSION['success'] = "Student Profile is Updated ";
       header('Location: new_student.php');
       
    }else{
      
      move_uploaded_file($_FILES["images"]["tmp_name"], "upload/".$_FILES["images"]["name"]);
   $_SESSION['success'] = "Student Profile is Updated ";
   header('Location: new_student.php');
    }
    
 }else{
   $_SESSION['status'] = "Student Profile is Not Updated";
   header('Location: new_student.php');
 }
 
}


if(isset($_POST['delete'])){
  
  $id = $_POST['delete_id'];
  
  $qry = mysqli_query($conn,"DELETE FROM new_student WHERE id='$id' ");
  if($qry){
    $_SESSION['success'] = "Student Profile is Deleted";
   header('Location: new_student.php');
 }else{
   $_SESSION['status'] = "Student Profile is Not Deleted";
   header('Location: new_student.php');
 }
}
?>