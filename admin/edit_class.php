<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/sidebar.php');
include('includes/topbar.php')
?>


    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Classes</h5>
      </div>
     
      <div class="modal-body">
        
<?php

if(isset($_POST['edit_id'])){
  
  $id = $_POST['edit_id'];
  
  $qry = mysqli_query($conn,"SELECT * FROM classes_list WHERE id = '$id' ");
  
  foreach($qry as $row){
   ?>
    <form action="save_classes.php" method="POST">
      
      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
           <label>Course | Strand</label>
           <input name="edit_course" type="text" value="<?php echo $row['course']; ?>" class="form-control" placeholder="Enter Course" required>
        </div>
       
        <div class="form-group">
           <label>Year | Grade</label>
           <input name="edit_year" type="text" value="<?php echo $row['year']; ?>" class="form-control" placeholder="Enter Year" required>
        </div>
        
        <div class="form-group">
           <label>Block</label>
           <input name="edit_block" type="text" value="<?php echo $row['block']; ?>" class="form-control" placeholder="Enter Block" required>
        </div>
        
      </div>
      <div class="modal-footer">
        <a href="classes.php" class="btn btn-secondary">Cancel</a>
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