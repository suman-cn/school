<?= heading('Welcome Dashboard!', 1); ?>
<?= br(1); ?>
<?= anchor('school-admin-logout/logout', 'Logout', array('title' => 'Logout')); ?>
<?= br(1); ?>
<?= anchor('school-admin-student/student_register', 'Student Register', array('title' => 'Student Register')); ?>
<?= br(1); ?>
<?= anchor('school-admin-attendance/student_attendance', 'Student Attendance', array('title' => 'Student Attendance')); ?>
<?= br(1); ?>


<?php
// $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
// echo $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
// echo br(1);
// echo $next_date = date('Y-m-d', strtotime($date .' +10 day'));
?>