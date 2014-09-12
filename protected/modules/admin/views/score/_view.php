<?php
/* @var $this ScoreController */
/* @var $data Score */
?>

<div class="view">


    <b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
    <?php echo CHtml::encode($data->price); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->name), array('update', 'id'=>$data->id)); ?>
    <br />


</div>