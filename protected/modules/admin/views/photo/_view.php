<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>

<div class="col-sm-2">
    <?php
    echo CHtml::link(CHtml::image($data->imageUrl(), 'tag', array('class' => 'gallery-item')), array('view', 'id' => $data->id), array('class' => 'thumbnail'));
    echo $data->user->username;
    if ($data->is_confirmed == 0) {
        echo '<br>' . CHtml::link('<i class="glyphicon glyphicon-ok"></i>',
                array('confirmation', 'id' => $data->id),
                array('class' => 'btn btn-success btn-sm'));
    } else {
        echo CHtml::label('Прошло модерацию', 0);
    }
    echo CHtml::link('<i class="glyphicon glyphicon-remove"></i>', '#', array(
        'submit' => array('delete', 'id' => $data->id),
        'confirm' => 'Вы уверены?',
        'class' => 'btn btn-danger btn-sm'
    ));
    ?>
</div>





