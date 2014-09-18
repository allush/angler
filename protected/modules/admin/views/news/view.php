<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->id,
);

//$this->menu=array(
//	array('label'=>'List News', 'url'=>array('index')),
//	array('label'=>'Create News', 'url'=>array('create')),
//	array('label'=>'Update News', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage News', 'url'=>array('admin')),
//);

$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label'=>'Все новости', 'url'=>array('index')),
        array('label'=>'Создать новость', 'url'=>array('create')),
        array('label'=>'Редактирование', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Удаление', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>'Управление новостями', 'url'=>array('admin')),
    ),
    'htmlOptions'=>array(
        'class'=>'nav nav-pills'
    )
));

?>

<h1><?php echo CHtml::encode($model->head);?></h1>

<?php echo date('d.m.Y', $model->date);?>
<br/><br/>

<?php echo ($model->content);?>
<br/><br/>


