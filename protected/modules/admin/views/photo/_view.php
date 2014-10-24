<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>

<div class="col-sm-2">
<ul class="list-group list-primary">
    <li class="list-group-item active"><?= CHtml::link(CHtml::image($data->imageUrl(), 'tag', array('class' => 'gallery-item')), array('view', 'id' => $data->id), array('class' => 'thumbnail')); ?></li>
    <li class="list-group-item"><?= $data->user->username; ?></li>
    <li class="list-group-item">
        <?php
        if ($data->is_confirmed == 0) {
            echo '<br>' . CHtml::link('<i class="glyphicon glyphicon-ok"></i>',
                    array('confirmation', 'id' => $data->id),
                    array('class' => 'btn btn-primary btn-equal btn-sm'));
        } else {
            echo CHtml::label('Прошло модерацию', 0);
        }
        echo CHtml::link('<i class="glyphicon glyphicon-remove"></i>', '#', array(
            'submit' => array('delete', 'id' => $data->id),
            'confirm' => 'Вы уверены?',
            'class' => 'btn btn-default btn-sm btn-equal'
        ));
        ?>
    </li>
</ul>
</div>
<!---->
<!--<div class="col-sm-2">-->
<!--    --><?php
//    echo CHtml::link(CHtml::image($data->imageUrl(), 'tag', array('class' => 'gallery-item')), array('view', 'id' => $data->id), array('class' => 'thumbnail'));
//    echo $data->user->username;
//    if ($data->is_confirmed == 0) {
//        echo '<br>' . CHtml::link('<i class="glyphicon glyphicon-ok"></i>',
//                array('confirmation', 'id' => $data->id),
//                array('class' => 'btn btn-success btn-sm'));
//    } else {
//        echo CHtml::label('Прошло модерацию', 0);
//    }
//    echo CHtml::link('<i class="glyphicon glyphicon-remove"></i>', '#', array(
//        'submit' => array('delete', 'id' => $data->id),
//        'confirm' => 'Вы уверены?',
//        'class' => 'btn btn-danger btn-sm'
//    ));
//    ?>
<!--</div>-->
<!---->
<!---->
<!---->


