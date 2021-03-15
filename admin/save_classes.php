<?php

include('includes/security.php');
if(isset($_POST['submit'])){
 
  $course = $_POST['course'];
  $year = $_POST['year'];
  $block = $_POST['block'];
  
 $qry = mysqli_query($conn,"INSERT INTO classes_list (course,year,block) VALUES ('$course', '$year', '$block')");
 
 if($qry){
   
   $_SESSION['success'] = "Classes Added ";
   header('Location: classes.php');
 }else{
   $_SESSION['status'] = "Classes Not Added";
   header('Location: classes.php');
 }

}


if(isset($_POST['update'])){
  
  $id = $_POST['edit_id'];
  $course = $_POST['edit_course'];
  $year = $_POST['edit_year'];
  $block = $_POST['edit_block'];
  
  $qry = mysqli_query($conn,"UPDATE classes_list SET course ='$course', year ='$year', block ='$block' WHERE id ='$id'");
  
  if ($qry) {
    
    $_SESSION['success'] = "Your Data is Updated";
    header('Location: classes.php');
  }else{
    $_SESSION['status'] = "Your Data is Not Updated";
    header('Location: classes.php');
  }
}


if(isset($_POST['delete'])){
  
  $id = $_POST['delete_id'];
  
  $qry = mysqli_query($conn,"DELETE FROM classes_list WHERE id='$id' ");
  if($qry){
    $_SESSION['success'] = "Classes is Deleted";
   header('Location: classes.php');
 }else{
   $_SESSION['status'] = "Classes is Not Deleted";
   header('Location: classes.php');
 }
}
?>