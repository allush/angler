<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">




        <tbody>
        <tr>
            <td><?php echo CHtml::encode($data->id); ?></td>
            <td><?php echo CHtml::encode($data->username) ?></td>
            <td><?php echo CHtml::encode($data->email); ?></td>
            <td><?php echo CHtml::link('Info', array('view', 'id'=>$data->id), array('class'=>'btn btn-support3 btn-xs btn-rounded')); ?></td>
        </tr>
        </tbody>








<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
<!--	<br />-->

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('Имя пользователя')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->username); ?>
<!--	<br />-->

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('Электронная почта')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->email); ?>
<!--	<br />-->

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('Пароль')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->password); ?>
<!--	<br />-->

<!--    <b>--><?php //echo CHtml::encode($data->getAttributeLabel('Баллы')); ?><!--:</b>-->
<!--    --><?php //echo CHtml::encode($data->score); ?>
<!--    <br />-->


</div>