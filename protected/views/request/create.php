<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Requests'=>array('index'),
	'Create',
);

//$this->menu=array(
//	array('label'=>'List Request', 'url'=>array('index')),
//	array('label'=>'Manage Request', 'url'=>array('admin')),
//);

$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label'=>'Список запросов', 'url'=>array('index')),
    ),
    'htmlOptions' => array('class'=>'nav nav-pills'),
));

?>

<h1>Новый запрос</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>