<?php
/* @var $this PhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Фото',
);

//$this->menu=array(
//    array('label'=>'Новые','url'=>array('/admin/photo/index')),
//array('label'=>'Подтверждённые фото','url'=>array('/admin/photo/confirmed'))
//);
?>

<h1>Фото</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

