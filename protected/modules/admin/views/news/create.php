<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Все новости', 'url'=>array('index')),
	array('label'=>'Управление новостями', 'url'=>array('admin')),
);
?>

<h1>Create News</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>