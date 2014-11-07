<?php
/* @var $this ParserController */
/* @var $model Parser */

$this->breadcrumbs=array(
	'Parsers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Parser', 'url'=>array('index')),
	array('label'=>'Create Parser', 'url'=>array('create')),
	array('label'=>'Update Parser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Parser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parser', 'url'=>array('admin')),
);
?>

<h1>View Parser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
        array(
            'label'=>'date',
            'type'=>'raw',
            'value'=>date('d.m.Y', $model->date),
        ),
		'path',
	),
)); ?>

<?= CHtml::link($model->name, $model->path); ?>