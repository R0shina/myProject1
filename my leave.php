<?php
require('top.inc.php');
//*$i=2;
//$eid=$_SESSION['USER_ID'];
//$query="select `assign_leave` t1 join `employee` t2 on t1.assign_to=t2.user_id where t2.user_id=$EMP_ID";
//$res=mysqli_query($conn,$query);
//$count=mysqli_num_rows($res);
//if ($count>0)
//{
//   while($row=mysqli_fetch_array($res));
//}

//$query="select `assign_leave` t1 join `employee` t2 on t1.assign_to=t2.user_id where t2.user_id=$user_id";
//$res=mysqli_query($conn,$query);
//$count=mysqli_num_rows($res);
//

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
                              <th width="8%">Home / Remaining Leave</th>
									  
                                    </tr>
                                    <tr>
                                       <td>10/10</td>
                                       <td>20/20</td>
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
 