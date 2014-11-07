<?php
/* @var $this ParserController */
/* @var $model Parser */

$this->breadcrumbs=array(
	'Parsers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Parser', 'url'=>array('index')),
	array('label'=>'Manage Parser', 'url'=>array('admin')),
);
?>

<h1>Create Parser</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>