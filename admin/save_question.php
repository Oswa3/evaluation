
<?php

include('includes/security.php');
if(isset($_POST['submit'])){
 
  $question = $_POST['questions'];
  $criteria = $_POST['criteria_id'];
  
 $qry = mysqli_query($conn,"INSERT INTO question_list (questions, criteria_id) VALUES ('$question','$criteria')");
 
 if($qry){
   
   $_SESSION['success'] = "Question Added ";
   header('Location: eval_form.php');
 }else{
   $_SESSION['status'] = "Question Not Added";
   header('Location: eval_form.php');
 }

}


if(isset($_POST['update'])){
  
  $id = $_POST['edit_id'];
  $question = $_POST['edit_questions'];
  $criteria = $_POST['editcriteria_id'];
  
  
  $qry = mysqli_query($conn,"UPDATE question_list SET questions='$question', criteria_id = '$criteria' WHERE id ='$id'");
  
  if ($qry) {
    
    $_SESSION['success'] = "Your Data is Updated";
    header('Location: eval_form.php');
  }else{
    $_SESSION['status'] = "Your Data is Not Updated";
    header('Location: eval_form.php');
  }
}

if(isset($_POST['delete'])){
  
  $id = $_POST['delete_id'];
  
  $qry = mysqli_query($conn,"DELETE FROM question_list WHERE id='$id' ");
  if($qry){
    $_SESSION['success'] = "Question is Deleted";
   header('Location: eval_form.php');
 }else{
   $_SESSION['status'] = "Question is Not Deleted";
   header('Location: eval_form.php');
 }
}

?>