<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Requests'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List Request', 'url'=>array('index')),
//	array('label'=>'Create Request', 'url'=>array('create')),
//	array('label'=>'View Request', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage Request', 'url'=>array('admin')),
//);

$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => 'Список запросов', 'url' => array('index')),
        array('label' => 'Новый запрос', 'url' => array('create')),
        array('label' => 'Назад', 'url' => array('view', 'id' => $model->id)),
    ),
    'htmlOptions' => array('class'=>'nav nav-pills'),
));

?>

<h1>Обновление запроса <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>