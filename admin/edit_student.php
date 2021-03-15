<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/sidebar.php');
include('includes/topbar.php')
?>


    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student Profile</h5>
      </div>
     
      <div class="modal-body">
        
<?php

if(isset($_POST['edit_id'])){
  
  $id = $_POST['edit_id'];
  
  $qry = mysqli_query($conn,"SELECT * FROM new_student WHERE id = '$id' ");
  
  foreach($qry as $row){
   ?>
  <form action="save_student.php" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
           <label>School ID</label>
           <input name="editschool_id" value="<?php echo $row['school_id']; ?>" type="id" class="form-control" placeholder="Enter School ID" required>
        </div>
       
        <div class="form-group">
           <label>Firstname</label>
           <input name="edit_firstname" value="<?php echo $row['firstname']; ?>" type="text" class="form-control" placeholder="Enter Firstname" required>
        </div>
        
        <div class="form-group">
           <label>Lastname</label>
           <input name="edit_lastname" value="<?php echo $row['lastname']; ?>" type="text" class="form-control" placeholder="Enter Lastname" required>
        </div>
        
         
        <div class="form-group">
           <label>Course</label>
           <input name="edit_course" value="<?php echo $row['course']; ?>" type="text" class="form-control" placeholder="Enter Email" required>
        </div>
        
          
        <div class="form-group">
           <label>Year</label>
           <input name="edit_year" value="<?php echo $row['year']; ?>" type="text" class="form-control" placeholder="Enter Email" required>
        </div>
        
          
        <div class="form-group">
           <label>Block</label>
            <input name="edit_block" value="<?php echo $row['block']; ?>" type="text" class="form-control" placeholder="Enter Email" required>
        </div>
        
         <div class="form-group">
           <label>Images</label>
           <input name="images" id="images" type="file" class="form-control" value="<?php echo $row['images'];?>">
        </div>
       
        <div class="form-group">
           <label>Email</label>
           <input name="edit_email" value="<?php echo $row['email']; ?>" type="email" class="form-control" placeholder="Enter Email" required>
        </div>
        
        <div class="form-group">
           <label>Password</label>
           <input name="edit_password" value="<?php echo $row['password']; ?>" type="password" class="form-control" placeholder="Enter Password" onreset="">
        </div>
        
        <div class="modal-footer">
        <a href="new_student.php" class="btn btn-secondary">Cancel</a>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </div>
      
      </form>
      <?php
      }
}
?>
    </div>
 
 <?php 
include('includes/scripts.php');
include('includes/footer.php');

?>