<?php
/* @var $this ScoreController */
/* @var $model Score */

$this->breadcrumbs=array(
	'Баллы'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список событий', 'url'=>array('index')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>