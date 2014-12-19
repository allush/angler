<?php
/* @var $this ScoreController */
/* @var $data Score */
?>

<div class="view">

    <tbody>
    <tr>
        <td><?= $data->name ?></td>
        <td><?= $data->price ?></td>
        <td><?php echo CHtml::link('Edit', array('update', 'id' => $data->id), array('class' => 'btn btn-support3 btn-xs btn-rounded')); ?></td>
    </tr>
    </tbody>


</div>