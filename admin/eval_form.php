<?php 
session_start();
include('includes/security.php');
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');

?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Evaluation Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        
  <form action="save_question.php" method="POST">
      
      <div class="modal-body">
      
        <div class="form-group">
           <label>Questions</label>
           <input name="questions" type="text" class="form-control" placeholder="Enter Evaluation Questions" required>
        </div>
      
         <?php
        $qry = mysqli_query($conn,"SELECT * FROM criteria");
        
        if(mysqli_num_rows($qry)>0){
        ?>
          <div class="form-group">
           <label>Criteria</label>
           <select name="criteria_id" class="form-control" required>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
   
      </div>
      </form>
    </div>
  </div>
</div>
 </div>
 
<div class="container-fluid">
 <div class="card shadow mb-4">
<h6 class="m-0 font-weight-bold text-primary"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Evaluation Questions
</button>
</h6>
</div>
<div class="card-body">
  
  .  
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
  <div class="table-responsive">
    <?php
        include('includes/conn.php');
        $qry = mysqli_query($conn, "SELECT * FROM question_list");
    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Questions</th>
            <th>Criteria Id</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
    <?php
        $i =1;
      if(mysqli_num_rows($qry) > 0){
        
        while($row= mysqli_fetch_assoc($qry))
        {
       ?>
       
      
          <tr>
            <td><?php echo $i;  $i++; ?></td>
            <td><?php echo $row['questions']; ?></td>
            <td><?php echo $row['criteria_id']; ?></td>
            <td>
              <div class="form-group">
                <form action="edit_evalution.php" method="POST";>
               <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="edit_class" data-toggle="modal" data-target="#editModal" class="btn btn-success">EDIT</button>
              </form>
              </div>
              
              <div class="form-group">
                <form action="save_question.php" method="POST";>
               <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="delete" class="btn btn-danger">DELETE</button>
              </form>
              </div>
            </td>
          </tr>
       
       <?php
        }
       
      }else{
        echo "Record Not Found";
      }
      ?>
     
        </tbody>
      </table>
    </div>
  </div>

</div>
<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
      "pagingTypes": "full_numbers",
      "legthMenu": [
        [10,25,50,-1]
        [10,25,50,"All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search Records",
        }
    });
} );
</script>