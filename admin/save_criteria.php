
<?php

include('includes/security.php');
if(isset($_POST['submit'])){
 
  $criteria = $_POST['criteria'];
  
 $qry = mysqli_query($conn,"INSERT INTO criteria (criteria) VALUES ('$criteria')");
 
 if($qry){
   
   $_SESSION['success'] = "Criteria Added ";
   header('Location: criteria.php');
 }else{
   $_SESSION['status'] = "Criteria Not Added";
   header('Location: criteria.php');
 }

}


if(isset($_POST['delete'])){
  
  $id = $_POST['delete_id'];
  
  $qry = mysqli_query($conn,"DELETE FROM criteria WHERE id='$id' ");
  if($qry){
    $_SESSION['success'] = "Classes is Deleted";
   header('Location: criteria.php');
 }else{
   $_SESSION['status'] = "Classes is Not Deleted";
   header('Location: criteria.php');
 }
}

?>