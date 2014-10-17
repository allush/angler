<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Пользователи',
);

$this->menu=array(
);
?>
<section>
    <div class="section-header">
<h1>Пользователи</h1>
    </div>

    <div class="section-body">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
    </div>
</section>
