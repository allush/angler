<?php
/* @var $this PhotoController */
/* @var $model Photo */

$this->breadcrumbs=array(
	'Photos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);


$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label'=>'List Photo', 'url'=>array('index')),
        array('label'=>'View Photo', 'url'=>array('view', 'id'=>$model->id)),
    ),
    'htmlOptions'=>array(
        'class'=>'nav nav-pills'
    )
));
?>

<h1>Update Photo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>