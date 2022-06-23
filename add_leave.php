<?php
require('top.inc.php');
if(isset($_POST['submit'])){
	$date_range[] = explode("-",$_POST["daterange"]);
	// var_dump($_POST);
	// var_dump($date_range);
	// var_dump($_POST['leave_from']);
	
	$leave_from=trim(str_replace("/", "-", $date_range[0][0]));
	$leave_to=trim(str_replace("/", "-", $date_range[0][1]));
	// var_dump($leave_from);
	// var_dump($leave_to);
	// exit();
	// $leave_from=$date_range[0][0];
	// $leave_to=$date_range[0][1];
	$leave_id=mysqli_real_escape_string($con,$_POST['leave_id']);
	// $leave_from=mysqli_real_escape_string($con,$_POST['leave_from']);
	// $leave_to=mysqli_real_escape_string($con,$_POST['leave_to']);
	
	$employee_id=$_SESSION['USER_ID'];
	$leave_description=mysqli_real_escape_string($con,$_POST['leave_description']);
	$sql="insert into `leave`(leave_id,leave_from,leave_to,employee_id,leave_description,leave_status) values('$leave_id','$leave_from','$leave_to','$employee_id','$leave_description',1)";
	mysqli_query($con,$sql);
	header('location:leave.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Leave Form</strong></div>
                        <div class="card-body card-block">
                           <form method="post">
						   
								<div class="form-group">
									<label class=" form-control-label">Leave Type</label>
									<select name="leave_id" required class="form-control">
										<option value="">Select Leave</option>
										<?php
										$res=mysqli_query($con,"select * from leave_type order by leave_type desc");
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value=".$row['id'].">".$row['leave_type']."</option>";
										}
										?>
									</select>
								</div>
							   <!-- <div class="form-group">
									<label class=" form-control-label">From Date</label>
									<input type="date" name="leave_from"  class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">To Date</label>
									<input type="date" name="leave_to" class="form-control" required>
								</div> -->
								<div class="form-group">
									<label class=" form-control-label" width="100%">Leave Date</label><br>
									<input type="text" name="daterange" />
								</div>
			
								<div class="form-group">
									<label class=" form-control-label">Leave Description</label>
									<input type="text" name="leave_description"  pattern="[a-zA-Z'-'\s]*"   class="form-control" >
								</div>
								 <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>

							  
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>   
		
		 <script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
<?php
require('footer.inc.php');
?>
