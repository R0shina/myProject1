<?php

require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from `leave` where id='$id'");
}
if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$status=mysqli_real_escape_string($con,$_GET['status']);
	mysqli_query($con,"update `leave` set leave_status='$status' where id='$id'");
}
if($_SESSION['ROLE']==1){ 
	$sql="select `leave`.*, employee.name,employee.id as eid from `leave`,employee where `leave`.employee_id=employee.id order by `leave`.id desc";
}else{
	$eid=$_SESSION['USER_ID'];
	$sql="select `leave`.*, employee.name ,employee.id as eid from `leave`,employee where `leave`.employee_id='$eid' and `leave`.employee_id=employee.id order by `leave`.id desc";
}
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           
						  
						    <?php if($_SESSION['ROLE']==2){ ?>
						   <h4 class="box_title_link"><a href="add_leave.php" width="15%">Add Leave</a>	 |	<a href="my leave.php">My Leave</a> </h4>
						  
						   <?php } ?>
                        </div>
						<h4 class="box-title">Leave History</h4>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
									   <th width="15%">Employee Name </th>
							
                                       <th width="14%"  name="from">From</th>
									   
									   <th width="14%"  name="to">To</th>
									   <th width="14%">Days</th>
									   <th width="15%">Description</th>
									   
									   <th width="18%">Leave Status</th>
									   <th width="10%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
									   <td><?php echo $row['id']?></td>
									   <td><?php echo $row['name'].' ('.$row['eid'].')'?></td>
                                       <td><?php echo $row['leave_from']?></td>
									   <td><?php echo $row['leave_to']?></td>
									   <td><?php 

									//    if (isset($_POST['submit'])){
									// 	$date1=$_POST['date1'];
									// 	$date2=$_POST['date2'];

									// 	$date1= strtotime($date1);
									// 	$date2= strtotime($date2);

									// 	$diff =($date1-$date2);
									// 	echo $diff.'days';

									//    }
									   $leave_to = time();
									    $leave_from=strtotime("2022-06-10");
									   $interval=$leave_to-$leave_from;
									     echo floor($interval/(60*60*24))."\n";
									   
										// $date1 = $row('leave_from');
										// $timestamp = strtotime($date1);
										// echo date('d',$timestamp)

									   //$day_diff = day_diff($leave_to, $leave_from);
									   //$date1 =($row['leave_from']);
									 			//$date2 = ($row['leave_to']);
												//echo $date1-$date2

											
									   ?></td>
									   <td><?php echo $row['leave_description']?></td>
									   <td>
										   <?php
											if($row['leave_status']==1){
												echo "Applied";
											}if($row['leave_status']==2){
												echo "Approved";
											}if($row['leave_status']==3){
												echo "Rejected";
											}
										   ?>
										   <?php if($_SESSION['ROLE']==1){ ?>
										   <select class="form-control" onchange="update_leave_status('<?php echo $row['id']?>',this.options[this.selectedIndex].value)">
											<option value="">Update Status</option>
											<option value="2">Approved</option>
											<option value="3">Rejected</option>
										   </select>
										   <?php } ?>
									   </td>
									   <td>
									   <?php
									   if($row['leave_status']==1){ ?>
									   <a href="leave.php?id=<?php echo $row['id']?>&type=delete">Delete</a>
									   <?php } ?>
									   
									   
									   </td>
									   
                                    </tr>
									<?php 
									$i++;
									} ?>
                                 </tbody>
                              </table>
                           </div>
						  
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <script>
		 function update_leave_status(id,select_value)
		 {
			window.location.href='leave.php?id='+id+'&type=update&status='+select_value;
			alert("Status is been Updated") ; 
		 }
		 </script>
<?php
require('footer.inc.php');
?>