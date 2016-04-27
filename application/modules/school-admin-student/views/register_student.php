

<?= form_open_multipart(); ?>
<?= form_label('Name', 'student_name'); ?>
<?php
    $attributes = array(
                'name' => 'student_name',
              );
    echo form_input($attributes);
?>
<?= br(1); ?>
<?= form_label('Father name', 'father_name'); ?>
<?php
    $attributes = array(
                'name' => 'father_name',
              );
    echo form_input($attributes);
?>
<?= br(1); ?>
<?= form_label('Class', 'classes'); ?>
<?php
    $attributes = array(
                'name' => 'classes',
              );
    echo form_input($attributes);
?>
<?= br(1); ?>
<?= form_label('Section', 'sec'); ?>
<?php
    $attributes = array(
                'name' => 'sec',
              );
    echo form_input($attributes);
?>
<?= br(1); ?>
<?= form_label('Roll No', 'roll'); ?>
<?php
    $attributes = array(
                'name' => 'roll',
              );
    echo form_input($attributes);
?>
<?= br(1); ?>
<?= form_label('Mobile', 'mobile'); ?>
<?php
    $attributes = array(
                'name' => 'mobile',
              );
    echo form_input($attributes);
?>
<?= br(1); ?>
<?= form_submit('','Register'); ?>
<?= form_close(); ?>