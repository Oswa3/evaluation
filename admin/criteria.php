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
        <h5 class="modal-title" id="exampleModalLabel">Add Criteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        
  <form action="save_criteria.php" method="POST">
      
      <div class="modal-body">
        
        
        <div class="form-group">
           <label>Criteria</label>
           <input name="criteria_id" type="text" class="form-control" placeholder="Enter Criteria Id" required>
        </div>
        
      
        <div class="form-group">
           <label>Criteria</label>
           <input name="criteria" type="text" class="form-control" placeholder="Enter Criteria" required>
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
  Add Criteria
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
        $qry = mysqli_query($conn, "SELECT * FROM criteria ");
    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Criteria</th>
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
            <td><?php echo $row['criteria']; ?></td>
            <td>
              
              <div class="form-group">
                <form action="save_criteria.php" method="POST";>
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