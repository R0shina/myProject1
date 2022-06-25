<?php
require('top.inc.php');

$cur_year = date("Y");
$prev_year =$cur_year-1;
$next_year =$cur_year+1;


function getTotalSickLeaveOfYear(){
    $user_id = $_SESSION["USER_ID"];
    $sick_leave_id = 1;
    $count = 0;
    $sql = "SELECT COUNT(*) as count FROM `leave` WHERE leave_id = $sick_leave_id AND employee_id = $user_id";
    $res = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($res)) {
        $count = $row['count'];
    }
    return $count;
}