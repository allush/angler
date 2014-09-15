<?php
/* @var $this PhotoController */
/* @var $model Photo */

$this->breadcrumbs=array(
	'Photos'=>array('index'),
	$model->id,
);


$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label'=>'List Photo', 'url'=>array('index')),
        array('label'=>'Update Photo', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Delete Photo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    ),
    'htmlOptions'=>array(
        'class'=>'nav nav-pills'
    )
));
?>

<h1>View Photo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array(
            'name' => 'user_id',
            'value' => $model->user ? $model->user->username : '-',
        ),
		'filename',
        'is_confirmed',
	),
)); ?>
