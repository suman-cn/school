
<?= form_open(); ?>
<?php
    $attributes = array(
                'name'        => 'student_id',
                'placeholder' => 'School Id',
              );
    echo form_input($attributes);
?>
<?php
    $attributes = array(
                'name'        => 'student_password',
                'autocomplete' => 'off',
                'placeholder' => 'Password',
              );
    echo form_password($attributes);
?>
<?= form_submit('mysubmit', 'Login'); ?>
<?= form_close(); ?>