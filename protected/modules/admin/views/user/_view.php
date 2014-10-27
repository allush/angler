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
</div>