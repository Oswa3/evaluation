<?php 
include('includes/security.php');
include('includes/header.php'); 
include('includes/sidebar.php');
include('includes/topbar.php')
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Classes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        
  <form action="save_classes.php" method="POST">
      
      <div class="modal-body">
      
        <div class="form-group">
           <label>Course | Strand</label>
           <input name="course" type="text" class="form-control" placeholder="Enter Course" required>
        </div>
       
        <div class="form-group">
           <label>Year | Grade</label>
           <input name="year" type="text" class="form-control" placeholder="Enter Year" required>
        </div>
        
        <div class="form-group">
           <label>Block</label>
           <input name="block" type="text" class="form-control" placeholder="Enter Block" required>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
  
<div class="container-fluid">
 <div class="card shadow mb-4">
<h6 class="m-0 font-weight-bold text-primary"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Classes
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
        $qry = mysqli_query($conn, "SELECT * FROM classes_list ");
    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Course | Strand</th>
            <th>Year | Grade</th>
            <th>Block</th>
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
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['block']; ?></td>
            <td>
              <div class="form-group">
                <form action="edit_class.php" method="POST";>
               <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="edit_class" data-toggle="modal" data-target="#editModal" class="btn btn-success">EDIT</button>
              </form>
              </div>
              
              <div class="form-group">
                <form action="save_classes.php" method="POST";>
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
  </div

<?php 
include('includes/scripts.php');
include('includes/footer.php');

?>