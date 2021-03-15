<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/sidebar.php');
include('includes/topbar.php')
?>

<div class="d-flex justify-content-center">
<div class="card text-center" style="width: 18rem;">
    <div class="card-body">
    <h5 class="card-title">Profile</h5>
  
          <?php
  if(isset($_SESSION['success']) && $_SESSION['success'] != '' ){
    echo '<h2>'.$_SESSION['success'].'</h2>';
    unset($_SESSION['success']);
  }
  
  if(isset($_SESSION['status']) && $_SESSION['status'] != '' ){
    echo '<h2>'.$_SESSION['status'].'</h2>';
    unset($_SESSION['status']);
  }
 ?>
  
  <?php

  $schoolid = $_SESSION['username'];
  
  $qry = mysqli_query($conn,"SELECT * FROM user_list WHERE school_id='$schoolid'");
   if(mysqli_num_rows($qry) > 0){
      if($row = mysqli_fetch_assoc($qry)){
       ?>
               
         <div class="form-group">
           <label>Images</label>
           <span><h5><?php echo '<img src="../admin/upload/'.$row['images'].'" width="100px;" style="border-radius: 50%;" height="100px;" alt="Image">' ?></h5></span>
        </div>
        <div class="form-group">
           <label>School ID</label>
           <span><h5><?php echo $row['school_id']; ?></h5></span>
        </div>
       
        <div class="form-group">
           <label>Firstname</label>
           <span><h5><?php echo $row['firstname']; ?></h5></span>
        </div>
        
        <div class="form-group">
           <label>Lastname</label>
           <span><h5><?php echo $row['lastname']; ?></h5></span>
        </div>
        
        <div class="form-group">
           <label>Email</label>
           <span><h5><?php echo $row['email']; ?></h5></span>
        </div>
        
        <div class="form-group">
           <label>Password</label>
           <span><h5><?php echo $row['password']; ?></h5></span>
        </div>
      
              <div class="form-group">
              <form action="editprofile.php" method="POST";>
 
                <button type="submit" name="edit_student"  class="btn btn-success">EDIT</button>
              </form>

      <?php
}
}
?>
      
      </div>
      </div>
      </div>
      </div>
 <?php 
include('includes/scripts.php');
include('includes/footer.php');

?>
