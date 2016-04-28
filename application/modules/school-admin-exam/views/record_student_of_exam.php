
<?= form_open_multipart( '', array('class' => '') ); ?>


<?= form_label('Session'); ?>
<?= form_dropdown('exam_session', $session); ?>
<?= br(1); ?>


<?= form_label('Exam Type'); ?>
<?= form_dropdown('exam_type', $types); ?>
<?= br(1); ?>


<?= form_label('Subject'); ?>
<?php
    $attributes = array(
            'name'        => 'subject',
            'class' => 'm-wrap span12',
            'id' => 'subject',
        );
    echo form_input($attributes);
?>
<?= form_error( 'subject', '<span class = "req">', '</span>'); ?>
<?= br(1); ?>


<?= form_label('Marks'); ?>
<?php
    $attributes = array(
            'name'        => 'marks',
            'class' => 'm-wrap span12',
            'id' => 'marks',
        );
    echo form_input($attributes);
?>
<?= form_error( 'marks', '<span class = "req">', '</span>'); ?>
<?= br(1); ?>


<?= form_label('Out of'); ?>
<?php
    $attributes = array(
            'name'        => 'out_of',
            'class' => 'm-wrap span12',
            'id' => 'out_of',
        );
    echo form_input($attributes);
?>
<?= form_error( 'out_of', '<span class = "req">', '</span>'); ?>
<?= br(1); ?>


<?= form_label('Comments'); ?>
<?php
    $attributes = array(
            'name'        => 'comment',
            'class' => 'm-wrap span12',
            'id' => 'comment',
        );
    echo form_textarea($attributes);
?>
<?= form_error( 'comment', '<span class = "req">', '</span>'); ?>
<?= br(1); ?>


<?= form_label('Taken By'); ?>
<?php
    $attributes = array(
            'name'        => 'taken_by',
            'class' => 'm-wrap span12',
            'id' => 'taken_by',
        );
    echo form_input($attributes);
?>
<?= form_error( 'taken_by', '<span class = "req">', '</span>'); ?>
<?= br(1); ?>


<?php
    $options = array(
            '1'  => 'Active',
            '0'    => 'Inactive',
        );
    echo form_dropdown('status', $options, 1, array( 'class' => 'm-wrap span12' ));
?>
<?= br(1); ?>
<button type="submit" class="btn blue"><i class="icon-ok"></i> Add</button>
<?= form_button('name','Cancel', array( 'class' => 'btn' )); ?>
<?= form_close(); ?>
