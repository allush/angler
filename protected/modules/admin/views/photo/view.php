<?php
/* @var $this PhotoController */
/* @var $model Photo */

$this->breadcrumbs=array(
	'Информация о фото'=>array('index'),
	$model->id,
);


$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label'=>'Список фото', 'url'=>array('index')),

    ),
    'htmlOptions'=>array(
        'class'=>'nav nav-pills'
    )
));
?>

<h1>Информация о фото #<?php echo $model->id; ?></h1>

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
        'coord_x',
        'coord_y',
	),
)); ?>
