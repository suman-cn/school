<table border = 1>
    <tr>
        <th></th>
        <?php
            foreach( $present_month_date as $date_id => $date){
                echo "<th>".$date."</th>";
            }
        ?>
    </tr>
<?php
        if(!empty($attendance->attendance)){
            $already_attend = (array)json_decode($attendance->attendance);
        }else{
            $already_attend = array();
        }
        echo "<tr>";
        echo "<td>Student Name</td>";
        foreach( $present_month_date as $date_id => $date){
            echo "<td>";
            if(array_key_exists( $date_id, $already_attend )){
                echo "Present"; 
            }else{
                echo "Absent";
            } 
            ?>
            </td>
            <?php
        }
        echo "</tr>";
?>
<br>
<?= anchor('school-admin-attendance/student_attendance/giveAttendance/'.$previous_month, 'Previous month', array('title' => 'Previous month')); ?>
<br>
<?= anchor('school-admin-attendance/student_attendance/giveAttendance/'.$next_month, 'Next month', array('title' => 'Next month')); ?>
</table>