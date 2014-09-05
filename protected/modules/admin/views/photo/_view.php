<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>

<div class="col-sm-2">
    <?php echo CHtml::link(CHtml::image($data->imageUrl(), 'tag', array('class' => 'gallery-item')), array('view', 'id' => $data->id), array('class' => 'thumbnail')); ?>
</div>





