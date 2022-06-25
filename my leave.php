<?php
require('top.inc.php');
$cur_year = date("Y");
$prev_year =$cur_year-1;
$next_year =$cur_year+1;

function getTotalLeaveCountOfYear($sick_leave_type_id, $user_id){
   global $con;
    $count = 0;
    $sql = "SELECT COUNT(*) as count FROM `leave` WHERE leave_id = $sick_leave_type_id AND employee_id = $user_id";
    $res = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($res)) {
        $count = $row['count'];
    }
    return $count;
}


?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
						    <?php if($_SESSION['ROLE']==2){ ?>
						   <h4 class="box_title_link"><a href="add_leave.php" width="15%">Add Leave</a> | <a href="my leave.php">My Leave</a> </h4>
						  
						   <?php } ?>
                       
                        </div>

                        <h4 class="box-title">Leave List</h4>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead style="width:100%">
                                    <tr>
                              <th width="8%">Sick Leave / Remaining Leave</th>
                              <th width="8%">Vacation / Remaining Leave</th>
                              <th width="8%">Maternity-Paternity / Remaining Leave</th>
                              <th width="8%">Other/ Remaining Leave</th>


									  
                                    </tr>
                                    <tr>
                                       <td><?php $user_id = $_SESSION["USER_ID"]; echo getTotalLeaveCountOfYear(1, $user_id)?>/10</td>
                                       <td><?php $user_id = $_SESSION["USER_ID"]; echo getTotalLeaveCountOfYear(2, $user_id)?>/20</td>
                                       <td><?php $user_id = $_SESSION["USER_ID"]; echo getTotalLeaveCountOfYear(4, $user_id)?>/20</td>
                                       <td><?php $user_id = $_SESSION["USER_ID"]; echo getTotalLeaveCountOfYear(6, $user_id)?>/20</td>
                                       <!-- <td>20/20</td> -->
                      </tr>

                                 </thead>
                                </table>
                           </div>
						  
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>

<?php
require('footer.inc.php');
?>
 
