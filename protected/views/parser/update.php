<?php
/* @var $this ParserController */
/* @var $model Parser */

$this->breadcrumbs=array(
	'Parsers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Parser', 'url'=>array('index')),
	array('label'=>'Create Parser', 'url'=>array('create')),
	array('label'=>'View Parser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Parser', 'url'=>array('admin')),
);
?>

<h1>Update Parser <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>