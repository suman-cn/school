<?= heading('Welcome Dashboard!', 1); ?>
<?= br(1); ?>
<?= heading($student_name, 1); ?>
<?= br(1); ?>
<?= anchor('student-logout/logout', 'Logout', array('title' => 'Logout')); ?>
<?= br(1); ?>
<?= anchor('student-attendance/student_attendance/showAttendance', 'Student Attendance', array('title' => 'Student Attendance')); ?>