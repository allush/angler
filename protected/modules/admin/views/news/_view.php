<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">


    <?php echo CHtml::link($data->head, array('view', 'id'=>$data->id) ); ?>

	<br />


    <?php echo date('d.m.Y', $data->date); ?>
	<br /><br/>



</div>