<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/sidebar.php');
include('includes/topbar.php')
?>


    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
      </div>
     
      <div class="modal-body">
        
<?php

if(isset($_POST['edit_id'])){
  
  $id = $_POST['edit_id'];
  
  $qry = mysqli_query($conn,"SELECT * FROM question_list WHERE id = '$id' ");
  
  foreach($qry as $row){
   ?>
          <form action="save_question.php" method="POST" enctype="multipart/form-data">
         
        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
        
        <div class="form-group">
           <label>Questions</label>
           <input name="edit_questions" value="<?php echo $row['questions']; ?> " type="text" class="form-control" placeholder="Enter Evaluation Questions" required>
        </div>
      
               <?php
        $qry = mysqli_query($conn,"SELECT * FROM criteria");
        
        if(mysqli_num_rows($qry)>0){
        ?>
          <div class="form-group">
           <label>Criteria</label>
           <select name="editcriteria_id" class="form-control" required>
           <option value="">Select</option>
           <?php
           foreach($qry as $row){
           ?>
             <option value="<?php echo $row['id'];?>"><?php echo $row['criteria_id']; echo "."; echo $row['criteria']; ?></option>
             
           <?php
           }
        }
           ?>
           </select>
         </div>
    
   
      <div class="modal-footer">
        <a href="eval_form.php" class="btn btn-secondary">Cancel</a>
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