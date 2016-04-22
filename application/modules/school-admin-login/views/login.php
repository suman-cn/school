
<?= form_open(); ?>
<?php
    $attributes = array(
                'name'        => 'school_admin_code',
                'placeholder' => 'School Code',
              );
    echo form_input($attributes);
?>
<?php
    $attributes = array(
                'name'        => 'school_admin_password',
                'autocomplete' => 'off',
                'placeholder' => 'Password',
              );
    echo form_password($attributes);
?>
<?= form_submit('mysubmit', 'Login'); ?>
<?= form_close(); ?>