<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/sidebar.php');
include('includes/topbar.php');
?>

<div class="d-flex justify-content-center">
<div class="card text-center" style="width: 18rem;">
    <div class="card-body">
    <h5 class="card-title">Profile</h5>
    
  <form action="saveprofile.php" method="POST" enctype="multipart/form-data">
  
  <?php

  $schoolid = $_SESSION['username'];
  
  $qry = mysqli_query($conn,"SELECT * FROM user_list WHERE school_id='$schoolid'");
   if(mysqli_num_rows($qry) > 0){
      if($row = mysqli_fetch_assoc($qry)){
       ?>
       
          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
          
         <div class="form-group">
           <label>Images</label>
            <input name="images" id="images" type="file" class="form-control" value="<?php echo $row['images'];?>">
        </div>
        </div>
        <div class="form-group">
           <label>School ID</label>
           <input name="editschool_id" value="<?php echo $row['school_id']; ?>" type="id" class="form-control"  required>
        </div>
       
        <div class="form-group">
           <label>Firstname</label>
          <input name="edit_firstname" value="<?php echo $row['firstname']; ?>" type="text" class="form-control" required>
        </div>
        
        <div class="form-group">
           <label>Lastname</label>
              <input name="edit_lastname" value="<?php echo $row['lastname']; ?>" type="text" class="form-control" required>
        </div>
        

        <div class="form-group">
           <label>Email</label>
              <input name="edit_email" value="<?php echo $row['email']; ?>" class="form-control" type="email" required>
        </div>
        
        <div class="form-group">
           <label>Password</label>
              <input name="edit_password" value="<?php echo $row['password']; ?>" type="password" class="form-control" required>
        </div>
      
    <div class="form-group">
                 <a href="profile.php" class="btn btn-secondary">Cancel</a>
                <button type="submit" name="update" class="btn btn-success">Update</button>
                </div>

      <?php
}
}
?>
      
  
      </form>
      
      </div>
      </div>
 <?php 
include('includes/scripts.php');
include('includes/footer.php');
?>