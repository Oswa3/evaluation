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
        <h5 class="modal-title" id="exampleModalLabel">Add Faculty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        
  <form action="save_teacher.php" method="POST">
      
      <div class="modal-body">
      
        <div class="form-group">
           <label>School ID</label>
           <input name="school_id" type="id" class="form-control" placeholder="Enter School ID" required>
        </div>
       
        <div class="form-group">
           <label>Firstname</label>
           <input name="firstname" type="text" class="form-control" placeholder="Enter Firstname" required>
        </div>
        
        <div class="form-group">
           <label>Lastname</label>
           <input name="lastname" type="text" class="form-control" placeholder="Enter Lastname" required>
        </div>
       
        <div class="form-group">
           <label>Email</label>
           <input name="email" type="email" class="form-control" placeholder="Enter Email" required>
        </div>
                 
        <div class="form-group">
           <label>Images</label>
           <input name="images" id="images" type="file" class="form-control" placeholder="Upload Images">
        </div>
        
        <div class="form-group">
           <label>Password</label>
           <input name="password" type="password" class="form-control" placeholder="Enter Password" required>
        </div>
        
        <div class="form-group">
           <label>Comfirm Password</label>
           <input name="cpassword" type="password" class="form-control" placeholder="Enter Confirm Password" required>
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
  <h4>Faculty List</h4>
 <div class="card shadow mb-4">
<h6 class="m-0 font-weight-bold text-primary"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Faculty
</button>
</h6>
</div>
<div class="card-body">
  
  
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
        $qry = mysqli_query($conn, "SELECT * FROM teacher_list ");
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>School ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Images</th>
            <th>Action</th>
          </tr>
        </thead>
         <tbody>
    <?php
       $i = 1;
      if(mysqli_num_rows($qry) > 0){
        
        while($row= mysqli_fetch_assoc($qry))
        {
       ?>
       
      
          <tr>
            <td><?php echo $i; $i++; ?></td>
            <td><?php echo $row['school_id']; ?></td>
            <td><?php echo $row['firstname']; echo " "; echo $row['lastname'];?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
                <td><?php echo '<img src="upload/'.$row['images'].'" width="100px;" height="100px;" alt="Image">' ?></td>
                   <td>
              <div class="form-group">
                <form action="edit_faculty.php" method="POST";>
               <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="edit_faculty" data-toggle="modal" data-target="#editModal" class="btn btn-success">EDIT</button>
              </form>
              </div>
              
              <div class="form-group">
              <form action="save_teacher.php" method="POST";>
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