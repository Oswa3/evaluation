<?php 
include('includes/conn.php');
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');

?>

		<div class="col-md-9">
			<div class="card card-outline card-info">
				<div class="card-header">
					<b>Evaluation Questionnaire</b>
				</div>
				<form action="" method="POST">
				<div class="card-body">
				 <input type="text" name="teacher"></td>
					<fieldset class="border border-info p-2 w-100">
					   <legend  class="w-auto">Rating Legend</legend>
					   <p> 4 = Agree, 3 = Uncertain, 2 = Disagree, 1 = Strongly Disagree</p>
					</fieldset>
					<div class="clear-fix mt-2"></div>
					<?php 
					$qry = mysqli_query($conn, "SELECT criteria.criteria, question_list.questions, question_list.id
					FROM criteria
					INNER JOIN question_list
					WHERE criteria.id = question_list.criteria_id");
						
					?>
					<table class="table table-condensed">
		    <?php
				if(mysqli_num_rows($qry) > 0){
        
        while($row= mysqli_fetch_assoc($qry))
        {
       ?>
       
						<thead>
							<tr class="bg-gradient-secondary text-light">
								<th class=" p-2"><b><?php echo $row['criteria']; ?></b></th>
								<th class="text-center">1</th>
								<th class="text-center">2</th>
								<th class="text-center">3</th>
								<th class="text-center">4</th>
							</tr>
						</thead>

						<tbody class="tr-sortable">
							<tr class="bg-white">
							<td class="p-1" width="40%"><?php echo $row['questions'];?>
								<input type="hidden" name="id" value="<?php echo $row['id'] ?>"></td>
								
							<td><div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rating[]" value="1" /> 
  </div>
  </td>
              <td><div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rating[]" value="2" /> 
  </div>
               <td><div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rating[]" value="3" /> 
  </div>
  </td>
              <td><div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rating[]" value="4"/> 
  </div>
  </td>
              </tr>
						</tbody>
											<?php

            				}

      	  				}
		        	?>
		        	
					</table>
										<div class="card-tools">

						<button class="btn btn-sm btn-flat btn-primary bg-gradient-primary mx-1" type="submit" name="submit">Submit Evaluation</button>

					</div>
					</form>
				</div>
			</div>
		</div>
<?php 

include('includes/scripts.php');
include('includes/footer.php');

if (isset($_POST['submit'])) {
//  $id = $_SESSION['username'];
  $question_id = $_POST['id'];
  $rating = $_POST['rating'];
  $teacher = $_POST['teacher'];
  
  $qry = mysqli_query($conn, "INSERT INTO evaluation (qid, rating, teacher) VALUES ('$question_id','$rating','$teacher')");
 
?>
