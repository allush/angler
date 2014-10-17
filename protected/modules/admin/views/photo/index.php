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

<section>

    <div class="section-header">
<h1>Фото</h1>
    </div>

<div class="section-body">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
</section>