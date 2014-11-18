<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Requests'=>array('index'),
	$model->name,
);

//$this->menu=array(
//	array('label'=>'List Request', 'url'=>array('index')),
//	array('label'=>'Create Request', 'url'=>array('create')),
//	array('label'=>'Update Request', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Request', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Request', 'url'=>array('admin')),
//);
?>

<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label'=>'Список запросов', 'url'=>array('index')),
        array('label'=>'Новый запрос', 'url'=>array('create')),
        array('label'=>'Обновить запрос', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Удалить запрос', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хоитите удалить данный запрос?')),
        //array('label'=>'Manage Request', 'url'=>array('admin')),
    ),
    'htmlOptions' => array('class'=>'nav nav-pills'),
));

?>

<h1>Запрос #<?php echo $model->id; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'name',
	),
    'htmlOptions'=>array('class'=>'table'),
)); ?>
