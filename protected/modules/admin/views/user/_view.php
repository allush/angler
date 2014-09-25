<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Имя пользователя')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Электронная почта')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Пароль')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Баллы')); ?>:</b>
    <?php echo CHtml::encode($data->score); ?>
    <br />


</div>