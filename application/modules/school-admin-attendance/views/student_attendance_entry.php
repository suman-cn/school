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
    echo form_open_multipart( '', array('class' => 'horizontal-form'), array('hid_month' => $present_month) );
    foreach( $school_students as $student ){
        if(!empty($attendance[$student->id])){
            $already_attend = (array)json_decode($attendance[$student->id]->attendance);
        }else{
            $already_attend = array();
        }
        echo "<tr>";
        echo "<td>".$student->student_name."</td>";
        foreach( $present_month_date as $date_id => $date){
            ?>
            <td><input type = "checkbox" name = 'attendance[<?= $student->id; ?>][<?= $date_id; ?>]' value = "1" <?php if(array_key_exists( $date_id, $already_attend )){ echo "checked"; } ?> ></td>
            <?php
        }
        echo "</tr>";
    }
    echo form_submit('mysubmit', 'Update Attendance');
    echo form_close();
?>
</table>